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



    public function pengguna($level)
    {
        if($level == 'all'){
            $pengguna = DB::table('pengguna')->get();

        }else{
            $pengguna = DB::table('pengguna')->where('level', $level)->get();

        }


        $data = [
            'pengguna' => $pengguna,
            'level'    => $level
        ];

        return view('admin.pengguna', $data);
    }

    public function hapuspengguna($id)
    {
        DB::table('pengguna')->where('id', $id)->delete();
        return back()->with('success', 'Pengguna Berhasil Dihapus');
    }

    public function tambahpengguna($level)
    {
        return view('admin/tambahpenguna',compact('level'));
    }

    public function simpanpengguna(Request $request)
    {
        // Validasi input
        $request->validate(
            [
                'nama' => 'required|string|max:255',
                'email' => 'required|email|unique:pengguna,email',
                'password' => 'required|confirmed',
                'telepon' => 'required|numeric',
                'alamat' => 'required|string',
            ],
            [
                'email.unique' => 'Email sudah terdaftar',
                'password.confirmed' => 'Konfirmasi password tidak sesuai',
                'password.required' => 'Password harus diisi',
                'email.required' => 'Email harus diisi',
                'nama.required' => 'Nama harus diisi',
                'telepon.required' => 'Telepon harus diisi',
                'alamat.required' => 'Alamat harus diisi',
                'telepon.numeric' => 'Telepon harus berupa angka',
            ]
        );

        // Ambil data input
        $nama = $request->input('nama');
        $email = $request->input('email');
        $telepon = $request->input('telepon');
        $alamat = $request->input('alamat');
        $password = $request->input('password');
        $level = $request->input('level');

        // Simpan data ke tabel pengguna
        DB::table('pengguna')->insert([
            'nama' => $nama,
            'email' => $email,
            'password' => $password,
            'telepon' => $telepon,
            'alamat' => $alamat,
            'level' => $level
        ]);

        // Redirect dengan pesan sukses
        return redirect('admin/pengguna')->with('success', 'Pendaftaran Berhasil Silahkan Login');
    }

    public function logout()
    {
        session()->flush();
        return redirect('/')->with('success', 'Anda Telah Logout');
    }


}
