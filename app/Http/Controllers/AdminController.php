<?php

namespace App\Http\Controllers;

use Dompdf\Dompdf;
use Dompdf\Options;
use Illuminate\Http\Request;
use Phpml\Clustering\KMeans;
use App\Models\KategoriModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\Session\Session;

class AdminController extends Controller
{
    public function index()
    {
        // Pengguna yang bukan Admin
        if (session('admin')->level != 'Admin') {
            // Jumlah pengaduan berdasarkan pengguna
            $jumlahPengaduan = DB::table('pengaduan')->where('idpengguna', session('admin')->id)->count();
        } else {
            // Jumlah pengaduan untuk Admin (semua pengaduan)
            $jumlahPengaduan = DB::table('pengaduan')->count();
        }

        // Jumlah user
        $jumlahUser = DB::table('pengguna')->count();

        // Statistik pengaduan per kecamatan
        $pengaduanPerKecamatan = DB::table('pengaduan')
            ->get();

        $pengaduan = DB::table('pengaduan')

            ->get();

        // Statistik pengaduan per kategori
        $pengaduanPerKategori = DB::table('pengaduan')
            ->join('kategori', 'kategori.idkategori', '=', 'pengaduan.idkategori', 'left')
            ->select('kategori.kategori', DB::raw('pengaduan.idkategori, count(*) as jumlah'))
            ->groupBy('pengaduan.idkategori')
            ->orderByDesc('jumlah')
            ->get();

        $dataKecamatan = [];
        foreach ($pengaduanPerKecamatan as $item) {
            $dataKecamatan[] = [
                'kecamatan' => $item->kecamatan,
                'jumlah' => $item->jumlah
            ];
        }

        // Terapkan KMeans

        // Ambil hasil clustering

        return view('admin.dashboard', [
            'jumlahPengaduan' => $jumlahPengaduan,
            'jumlahUser' => $jumlahUser,
            'pengaduanPerKecamatan' => $pengaduanPerKecamatan,
            'pengaduanPerKategori' => $pengaduanPerKategori,
            'datapengaduan' => $pengaduan,
        ]);
    }

    function kMeans($data, $k = 2, $iterations = 100)
    {
        $centroids = [];
        $clusters = [];

        // Inisialisasi centroid secara acak
        for ($i = 0; $i < $k; $i++) {
            $centroids[] = $data[array_rand($data)];
        }

        for ($i = 0; $i < $iterations; $i++) {
            $clusters = array_fill(0, $k, []);

            // Langkah 1: Menetapkan setiap data ke cluster terdekat
            foreach ($data as $point) {
                $distances = [];
                foreach ($centroids as $centroid) {
                    $distances[] = sqrt(pow($point['jumlah'] - $centroid['jumlah'], 2));
                }

                // Temukan cluster terdekat
                $minDistanceIndex = array_search(min($distances), $distances);
                $clusters[$minDistanceIndex][] = $point;
            }

            // Langkah 2: Update centroid dengan menghitung rata-rata dari data dalam cluster
            $newCentroids = [];
            foreach ($clusters as $cluster) {
                if (count($cluster) > 0) {
                    $sum = 0;
                    foreach ($cluster as $point) {
                        $sum += $point['jumlah'];
                    }
                    $newCentroids[] = ['jumlah' => $sum / count($cluster)];
                } else {
                    // Jika cluster kosong, tetapkan centroid acak atau pertahankan centroid lama
                    $newCentroids[] = $centroids[array_rand($centroids)];
                }
            }

            // Jika centroid tidak berubah, keluar dari loop
            if ($centroids == $newCentroids) {
                break;
            }
            $centroids = $newCentroids;
        }

        // Hitung jarak ke centroid untuk setiap data
        foreach ($clusters as &$cluster) {
            foreach ($cluster as &$point) {
                $point['jarak_ke_centroid'] = [];
                foreach ($centroids as $centroid) {
                    $point['jarak_ke_centroid'][] = sqrt(pow($point['jumlah'] - $centroid['jumlah'], 2));
                }
                $point['cluster'] = array_search(min($point['jarak_ke_centroid']), $point['jarak_ke_centroid']) + 1;
            }
        }

        return ['centroids' => $centroids, 'clusters' => $clusters];
    }



    public function pengguna()
    {
        $pengguna = DB::table('pengguna')->where('level', 'User')->get();

        $data = [
            'pengguna' => $pengguna,
        ];

        return view('admin.pengguna', $data);
    }

    public function hapuspengguna($id)
    {
        DB::table('pengguna')->where('id', $id)->delete();
        return back()->with('success', 'Pengguna Berhasil Dihapus');
    }

    public function logout()
    {
        session()->flush();
        return redirect('/')->with('success', 'Anda Telah Logout');
    }


    // User
    // Riwayat Pengaduan
    public function riwayatpengaduan()
    {
        $idpengguna = session('admin')->id;
        $user = session('admin');
        if ($user->level == 'Admin') {
            $data['pengaduan'] = DB::table('pengaduan')
                ->join('pengguna', 'pengaduan.idpengguna', '=', 'pengguna.id')
                ->join('kategori', 'pengaduan.idkategori', '=', 'kategori.idkategori')
                ->orderBy('idpengaduan', 'desc')
                ->get();
        } else {
            $data['pengaduan'] = DB::table('pengaduan')
                ->join('pengguna', 'pengaduan.idpengguna', '=', 'pengguna.id')
                ->join('kategori', 'pengaduan.idkategori', '=', 'kategori.idkategori')
                ->where('pengguna.id', $idpengguna)
                ->orderBy('idpengaduan', 'desc')
                ->get();
        }

        return view('admin.riwayatpengaduan', $data);
    }

    public function tambahpengaduan()
    {
        $data['kategori'] = DB::table('kategori')->get();
        return view('admin.tambahpengaduan', $data);
    }

    public function simpanpengaduan(Request $request)
    {
        $request->validate([
            'kategori' => 'required|string|max:255',
            'judul' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'isilaporan' => 'required|string',
            'tanggal_pengaduan' => 'required|date',
            'file' => 'file|mimes:jpg,jpeg,png,pdf|max:2048', // Validasi file
        ]);

        // Mengunggah file
        $fileName = null;
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $fileName = time() . '_' . $file->getClientOriginalName(); // Nama unik
            $file->move(public_path('uploads/foto_pengaduan'), $fileName); // Pindahkan file
        }

        // Menyiapkan data untuk disimpan
        $data = [
            'idpengguna' => session('admin')->id,
            'idkategori' => $request->input('kategori'),
            'judul' => $request->input('judul'),
            'alamat' => $request->input('alamat'),
            'kecamatan' => $request->input('kecamatan'),
            'latitude' => $request->input('latitude'),
            'longitude' => $request->input('longitude'),
            'isilaporan' => $request->input('isilaporan'),
            'tanggal_pengaduan' => $request->input('tanggal_pengaduan'),
            'file' => $fileName, // Simpan nama file ke database
            'status_pengaduan' => 'Menunggu Konfirmasi Admin',
        ];

        // Insert ke database
        DB::table('pengaduan')->insert($data);

        return redirect('admin/riwayatpengaduan')->with('success', 'Pengaduan berhasil disimpan.');
    }



    public function ubahpengaduan($id)
    {
        $data['pengaduan'] = DB::table('pengaduan')
            ->where('idpengaduan', $id)
            ->first();
        $data['kategori'] = DB::table('kategori')->get();

        return view('admin.ubahpengaduan', $data);
    }

    public function updatepengaduan(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'kategori' => 'required|string|max:255',
            'judul' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'isilaporan' => 'required|string',
            'tanggal_pengaduan' => 'required|date',
        ]);

        // Ambil data pengaduan yang sedang diubah
        $pengaduan = DB::table('pengaduan')->where('idpengaduan', $id)->first();

        // Data pengaduan yang akan diperbarui
        $data = [
            'idpengguna' => session('admin')->id,
            'idkategori' => $request->input('kategori'),
            'judul' => $request->input('judul'),
            'alamat' => $request->input('alamat'),
            'kecamatan' => $request->input('kecamatan'),
            'latitude' => $request->input('latitude'),
            'longitude' => $request->input('longitude'),
            'isilaporan' => $request->input('isilaporan'),
            'tanggal_pengaduan' => $request->input('tanggal_pengaduan'),
            'status_pengaduan' => 'Menunggu Konfirmasi Admin',
        ];

        // Menangani file upload jika ada
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/foto_pengaduan'), $fileName);
            $data['file'] = $fileName; // Simpan nama file ke database
        } else {
            // Jika tidak ada file baru, tetap simpan file lama
            if ($pengaduan && $pengaduan->file) {
                $data['file'] = $pengaduan->file;
            }
        }

        // Update data pengaduan di database
        DB::table('pengaduan')
            ->where('idpengaduan', $id)
            ->update($data);

        // Redirect ke halaman riwayat pengaduan dengan pesan sukses
        return redirect('admin/riwayatpengaduan')->with('success', 'Pengaduan berhasil diubah.');
    }


    public function hapuspengaduan($id)
    {
        $pengaduan = DB::table('pengaduan')->where('idpengaduan', $id)->first();
        if ($pengaduan->file) {
            $filePath = 'uploads/foto_pengaduan/' . $pengaduan->file;
            if (file_exists(public_path($filePath))) {
                unlink(public_path($filePath));
            }
        }
        DB::table('pengaduan')->where('idpengaduan', $id)->delete();
        return redirect('admin/riwayatpengaduan')->with('success', 'Pengaduan berhasil dihapus.');
    }

    public function detailpengaduan($id)
    {
        $data['pengaduan'] = DB::table('pengaduan')
            ->join('pengguna', 'pengguna.id', '=', 'pengaduan.idpengguna')
            ->join('kategori', 'kategori.idkategori', '=', 'pengaduan.idkategori')
            ->where('idpengaduan', $id)
            ->first();
        return view('admin.detailpengaduan', $data);
    }

    public function updatestatuspengaduan(Request $request, $id)
    {
        DB::table('pengaduan')
            ->where('idpengaduan', $id)
            ->update([
                'status_pengaduan' => $request->input('status'),
                'catatan' => $request->input('catatan'),
            ]);
        return redirect('admin/riwayatpengaduan')->with('success', 'Status pengaduan berhasil diubah.');
    }

    public function kategori()
    {
        $data['kategori'] = DB::table('kategori')->get();
        return view('admin.kategori', $data);
    }

    public function tambahkategori()
    {
        return view('admin.tambahkategori');
    }

    public function simpankategori(Request $request)
    {
        DB::table('kategori')->insert([
            'kategori' => $request->input('kategori'),
        ]);
        return redirect('admin/kategori')->with('success', 'Kategori berhasil disimpan.');
    }

    public function ubahkategori($id)
    {
        $data['kategori'] = DB::table('kategori')->where('idkategori', $id)->first();
        return view('admin.ubahkategori', $data);
    }

    public function updatekategori(Request $request, $id)
    {
        DB::table('kategori')
            ->where('idkategori', $id)
            ->update([
                'kategori' => $request->input('kategori'),
            ]);
        return redirect('admin/kategori')->with('success', 'Kategori berhasil diubah.');
    }

    public function hapuskategori($id)
    {
        DB::table('kategori')->where('idkategori', $id)->delete();
        return redirect('admin/kategori')->with('success', 'Kategori berhasil dihapus.');
    }
}
