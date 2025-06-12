<?php
namespace App\Http\Controllers;

use App\Models\Kelurahan;
use App\Models\Laporan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class KelurahanController extends Controller
{
    private $apiKey = '7d0b4eeaf6bcd262bc67cd532a17055d'; // ganti dengan API key-mu

    public function index()
    {
        $kelurahan = Kelurahan::all();
        return view('kelurahan.index', compact('kelurahan'));
    }

    public function create()
    {
        $provinces = $this->getProvinces();
        return view('kelurahan.create', compact('provinces'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'namakelurahan' => 'required',
            'kecamatan' => 'required',
            'kabupaten' => 'required',
            'provinsi' => 'required',
            'alamatkelurahan' => 'nullable',
            'nohpkelurahan' => 'nullable',
            'fotokelurahan' => 'nullable|file|image',
            'latitude' => 'nullable',
            'longitude' => 'nullable',
        ]);

        if ($request->hasFile('fotokelurahan')) {
            $file = $request->file('fotokelurahan');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('foto_kelurahan'), $filename);
            $data['fotokelurahan'] = 'foto_kelurahan/' . $filename;
        }



        Kelurahan::create($data);
        return redirect()->route('kelurahan.index')->with('success', 'Data berhasil ditambahkan');
    }

    public function edit(Kelurahan $kelurahan)
    {
        $provinces = $this->getProvinces();
        return view('kelurahan.edit', compact('kelurahan', 'provinces'));
    }

    public function update(Request $request, Kelurahan $kelurahan)
    {
        $data = $request->validate([
            'namakelurahan' => 'required',
            'kecamatan' => 'required',
            'kabupaten' => 'required',
            'provinsi' => 'required',
            'alamatkelurahan' => 'nullable',
            'nohpkelurahan' => 'nullable',
            'fotokelurahan' => 'nullable|file|image',
            'latitude' => 'nullable',
            'longitude' => 'nullable',
        ]);

        if ($request->hasFile('fotokelurahan')) {
            // Hapus foto lama jika ada
            if ($kelurahan->fotokelurahan && file_exists(public_path($kelurahan->fotokelurahan))) {
                unlink(public_path($kelurahan->fotokelurahan));
            }

            // Simpan foto baru
            $file = $request->file('fotokelurahan');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('foto_kelurahan'), $filename);
            $data['fotokelurahan'] = 'foto_kelurahan/' . $filename;
        }

        $kelurahan->update($data);
        return redirect()->route('kelurahan.index')->with('success', 'Data berhasil diupdate');
    }


    public function destroy(Kelurahan $kelurahan)
    {
        // Hapus foto jika ada
        if ($kelurahan->fotokelurahan && file_exists(public_path($kelurahan->fotokelurahan))) {
            unlink(public_path($kelurahan->fotokelurahan));
        }

        $kelurahan->delete();
        return redirect()->route('kelurahan.index')->with('success', 'Data berhasil dihapus');
    }


    // --- API RajaOngkir ---
    private function getProvinces()
    {
        $response = Http::withHeaders([
            'key' => $this->apiKey
        ])->get('https://api.rajaongkir.com/starter/province');

        return $response['rajaongkir']['results'] ?? [];
    }

    public function getCities(Request $request)
    {
        $provinceId = $request->input('province_id');
        $response = Http::withHeaders([
            'key' => $this->apiKey
        ])->get("https://api.rajaongkir.com/starter/city", [
                    'province' => $provinceId
                ]);

        return response()->json($response['rajaongkir']['results'] ?? []);
    }

    public function kelurahan()
    {
        $kelurahan = Kelurahan::get();
        return view('home.kelurahan', compact('kelurahan'));
    }


    public function detailkelurahan($kelurahan)
    {
$pekerjaanFields = [
        'petani' => 'Petani',
        'buruh_tani' => 'Buruh Tani',
        'pedagang' => 'Pedagang',
        'nelayan' => 'Nelayan',
        'pns' => 'PNS',
        'tni_polri' => 'TNI/POLRI',
        'buruh' => 'Buruh',
        'pensiunan' => 'Pensiunan',
        'wirausaha' => 'Wirausaha',
        'lainnya' => 'Lainnya',
    ];

    $pendidikanFields = [
        'paud' => 'PAUD',
        'tk' => 'TK',
        'sd' => 'SD',
        'smp' => 'SMP',
        'sma' => 'SMA',
        'smk' => 'SMK',
        'diploma' => 'Diploma',
        'sarjana' => 'Sarjana',
    ];

    $kesehatanFields = [
        'posyandu' => 'Posyandu',
        'puskesmas_pembantu' => 'Puskesmas Pembantu',
        'puskesmas' => 'Puskesmas',
        'klinik' => 'Klinik',
        'jumlah_dokter' => 'Jumlah Dokter',
        'jumlah_bidan' => 'Jumlah Bidan',
        'jumlah_perawat' => 'Jumlah Perawat',
    ];

    $lulusanFields = [
        'lulusan_sd' => 'Lulusan SD',
        'lulusan_smp' => 'Lulusan SMP',
        'lulusan_sma' => 'Lulusan SMA',
        'lulusan_perguruan_tinggi' => 'Lulusan Perguruan Tinggi',
    ];

    $lulusanFields2 = [
        'lulusan_diniyah' => 'Lulusan Diniyah',
        'lulusan_pesantren' => 'Lulusan Pesantren',
    ];

    $lulusanFields3 = [
        'tidak_lulus_sd' => 'Tidak Lulus SD',
        'tidak_sekolah' => 'Tidak Pernah Sekolah',
    ];

    $keuanganFields1 = [
        'dana_desa' => 'Dana Desa',
        'add' => 'Alokasi Dana Desa (ADD)',
        'pendapatan_lain' => 'Pendapatan Lain',
    ];

    $keuanganFields2 = [
        'bantuan_pemerintah' => 'Bantuan Pemerintah',
        'bantuan_provinsi' => 'Bantuan Provinsi',
        'bantuan_kabupaten' => 'Bantuan Kabupaten',
    ];

    $keuanganFields3 = [
        'belanja_pemerintahan' => 'Belanja Pemerintahan',
        'belanja_pembangunan' => 'Belanja Pembangunan',
        'belanja_pembinaan' => 'Belanja Pembinaan',
        'belanja_pemberdayaan' => 'Belanja Pemberdayaan',
    ];

    $keuanganFields4 = [
        'sisa_anggaran' => 'Sisa Anggaran',
    ];
        $kelurahan = Kelurahan::find($kelurahan);
        $laporanList = Laporan::where('idkelurahan', $kelurahan->idkelurahan)->get();
       return view('home.detail_kelurahan', [
    'laporanList' => $laporanList,
    'pekerjaanFields' => $pekerjaanFields,
    'pendidikanFields' => $pendidikanFields,
    'kesehatanFields' => $kesehatanFields,
    'lulusanFields' => $lulusanFields,
    'lulusanFields2' => $lulusanFields2,
    'lulusanFields3' => $lulusanFields3,
    'keuanganFields1' => $keuanganFields1,
    'keuanganFields2' => $keuanganFields2,
    'keuanganFields3' => $keuanganFields3,
    'keuanganFields4' => $keuanganFields4,
    'kelurahan' => $kelurahan
]);



    }
}

