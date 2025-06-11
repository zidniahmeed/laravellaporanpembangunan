<?php

namespace App\Http\Controllers;

use App\Models\Kelurahan;
use App\Models\Laporan;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(session('admin')->level == 'Admin Kelurahan'){
            $laporan = Laporan::with('kelurahan')->where('idadmin',session('admin')->id )->get();
        }else{
            $laporan = Laporan::with('kelurahan')->get();
        }
        return view('laporan.index', compact('laporan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kelurahanList = Kelurahan::get();
        return view('laporan.create', compact('kelurahanList'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request->all();
        $request->validate([
            'idkelurahan' => 'required',
            'tahun' => 'required|digits:4|integer|min:2000|max:' . date('Y'),
        ]);
        $cek = Laporan::where('idkelurahan', $request->idkelurahan)
            ->where('tahun', $request->tahun)
            ->count();

        if ($cek) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Laporan untuk kelurahan ini di '.$request->tahun.'  sudah diinput.');
        }
        $data = [
            'idadmin' => session('admin')->id,
            'idkelurahan' => $request->idkelurahan,
            'status' => 'Menunggu Konfirmasi Lurah',
            'tanggal' => $request->tanggal,
            'tahun' => $request->tahun,
            'topologi' => $request->topologi,
            'klasifikasi' => $request->klasifikasi,
            'kategoridesa' => $request->kategoridesa,
            'komoditas_unggulan_berdasarkan_luas_tanam' => $request->komoditas_unggulan_berdasarkan_luas_tanam,
            'komoditas_unggulan_berdasarkan_nilai_ekonomi' => $request->komoditas_unggulan_berdasarkan_nilai_ekonomi,
            'luas_wilayah' => $request->luas_wilayah,
            'lahan_sawah' => $request->lahan_sawah,
            'lahan_ladang' => $request->lahan_ladang,
            'lahan_perkebunan' => $request->lahan_perkebunan,
            'lahan_peternakan' => $request->lahan_peternakan,
            'hutan' => $request->hutan,
            'waduk' => $request->waduk,
            'lahan_lainya' => $request->lahan_lainya,
            'jumlah_sertifikat' => $request->jumlah_sertifikat,
            'luas_tanah_sertifikat' => $request->luas_tanah_sertifikat,
            'luas_tanah_kas' => $request->luas_tanah_kas,
            'jarak_dari_pusat_kecamatan' => $request->jarak_dari_pusat_kecamatan,
            'jarak_dari_pusat_kota' => $request->jarak_dari_pusat_kota,
            'jarak_dari_pusat_kabupaten' => $request->jarak_dari_pusat_kabupaten,
            'jarak_dari_pusat_ibu_kota_provinsi' => $request->jarak_dari_pusat_ibu_kota_provinsi,
            'jumlah_kepala_keluarga' => $request->jumlah_kepala_keluarga,
            'keluarga_pra_sejahtera' => $request->keluarga_pra_sejahtera,
            'keluarga_sejahtera_1' => $request->keluarga_sejahtera_1,
            'keluarga_sejahtera_2' => $request->keluarga_sejahtera_2,
            'keluarga_sejahtera_3' => $request->keluarga_sejahtera_3,
            'keluarga_sejahtera_3_plus' => $request->keluarga_sejahtera_3_plus,
            'jumlah_penduduk' => $request->jumlah_penduduk,
            'laki_laki' => $request->laki_laki,
            'perempuan' => $request->perempuan,
            'usia_0_17' => $request->usia_0_17,
            'usia_18_56' => $request->usia_18_56,
            'usia_56_keatas' => $request->usia_56_keatas,
            'karyawan_pns' => $request->karyawan_pns,
            'karyawan_pol_tni' => $request->karyawan_pol_tni,
            'karyawan_swasta' => $request->karyawan_swasta,
            'wiraswasta' => $request->wiraswasta,
            'petani' => $request->petani,
            'buruh_tani' => $request->buruh_tani,
            'nelayan' => $request->nelayan,
            'peternak' => $request->peternak,
            'jasa' => $request->jasa,
            'pengrajin' => $request->pengrajin,
            'pekerja_seni' => $request->pekerja_seni,
            'pensiunan' => $request->pensiunan,
            'lainya' => $request->lainya,
            'menganggur' => $request->menganggur,
            'tk' => $request->tk,
            'sd' => $request->sd,
            'sltp' => $request->sltp,
            'slta' => $request->slta,
            'akademi' => $request->akademi,
            'sarjana' => $request->sarjana,
            'pasca_sarjana' => $request->pasca_sarjana,
            'dokter_umum' => $request->dokter_umum,
            'dokter_spesialis' => $request->dokter_spesialis,
            'bidan' => $request->bidan,
            'mantri_kesehatan' => $request->mantri_kesehatan,
            'perawat' => $request->perawat,
            'lulusan_tk' => $request->lulusan_tk,
            'lulusan_sd' => $request->lulusan_sd,
            'lulusan_sltp' => $request->lulusan_sltp,
            'lulusan_slta' => $request->lulusan_slta,
            'lulusan_akademi' => $request->lulusan_akademi,
            'lulusan_s1' => $request->lulusan_s1,
            'lulusan_s2' => $request->lulusan_s2,
            'lulusan_s3' => $request->lulusan_s3,
            'lulusan_ponpes' => $request->lulusan_ponpes,
            'lulusan_pendidikan_keagamaan' => $request->lulusan_pendidikan_keagamaan,
            'lulusan_slb' => $request->lulusan_slb,
            'lulusan_kursus' => $request->lulusan_kursus,
            'tidak_lulus_sekolah' => $request->tidak_lulus_sekolah,
            'tidak_sekolah' => $request->tidak_sekolah,
            'pendapatan_desa' => $request->pendapatan_desa,
            'pendapatan_asli_desa' => $request->pendapatan_asli_desa,
            'pungutan' => $request->pungutan,
            'hasil_bumdes' => $request->hasil_bumdes,
            'hibah' => $request->hibah,
            'pendapatan_lainya' => $request->pendapatan_lainya,
            'bantuan_pemerintah' => $request->bantuan_pemerintah,
            'bantuan_provinsi' => $request->bantuan_provinsi,
            'bantuan_kota' => $request->bantuan_kota,
            'bantuan_lain_tidak_mengikat' => $request->bantuan_lain_tidak_mengikat,
            'silpa' => $request->silpa,
            'dana_cadangan' => $request->dana_cadangan,
            'belanja_rutin' => $request->belanja_rutin,
            'belanja_tidak_rutin' => $request->belanja_tidak_rutin,
            'bantuan_yang_diterima' => $request->bantuan_yang_diterima
        ];
        Laporan::create($data);
        return redirect()->route('laporan.index')->with('success', 'Data berhasil ditambahkan');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Laporan $laporan)
    {
        $kelurahanList = Kelurahan::get();
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
        return view('laporan.show', compact(
        'laporan',
        'pekerjaanFields',
        'pendidikanFields',
        'kesehatanFields',
        'lulusanFields',
        'lulusanFields2',
        'lulusanFields3',
        'keuanganFields1',
        'keuanganFields2',
        'keuanganFields3',
        'keuanganFields4',
    ));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Laporan $laporan)
    {
        $kelurahanList = Kelurahan::get();

        return view('laporan.edit', compact('laporan', 'kelurahanList'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {


        $data = [
            'status' => $request->status,
            'tanggal' => $request->tanggal,
            'tahun' => $request->tahun,
            'topologi' => $request->topologi,
            'klasifikasi' => $request->klasifikasi,
            'kategoridesa' => $request->kategoridesa,
            'komoditas_unggulan_berdasarkan_luas_tanam' => $request->komoditas_unggulan_berdasarkan_luas_tanam,
            'komoditas_unggulan_berdasarkan_nilai_ekonomi' => $request->komoditas_unggulan_berdasarkan_nilai_ekonomi,
            'luas_wilayah' => $request->luas_wilayah,
            'lahan_sawah' => $request->lahan_sawah,
            'lahan_ladang' => $request->lahan_ladang,
            'lahan_perkebunan' => $request->lahan_perkebunan,
            'lahan_peternakan' => $request->lahan_peternakan,
            'hutan' => $request->hutan,
            'waduk' => $request->waduk,
            'lahan_lainya' => $request->lahan_lainya,
            'jumlah_sertifikat' => $request->jumlah_sertifikat,
            'luas_tanah_sertifikat' => $request->luas_tanah_sertifikat,
            'luas_tanah_kas' => $request->luas_tanah_kas,
            'jarak_dari_pusat_kecamatan' => $request->jarak_dari_pusat_kecamatan,
            'jarak_dari_pusat_kota' => $request->jarak_dari_pusat_kota,
            'jarak_dari_pusat_kabupaten' => $request->jarak_dari_pusat_kabupaten,
            'jarak_dari_pusat_ibu_kota_provinsi' => $request->jarak_dari_pusat_ibu_kota_provinsi,
            'jumlah_kepala_keluarga' => $request->jumlah_kepala_keluarga,
            'keluarga_pra_sejahtera' => $request->keluarga_pra_sejahtera,
            'keluarga_sejahtera_1' => $request->keluarga_sejahtera_1,
            'keluarga_sejahtera_2' => $request->keluarga_sejahtera_2,
            'keluarga_sejahtera_3' => $request->keluarga_sejahtera_3,
            'keluarga_sejahtera_3_plus' => $request->keluarga_sejahtera_3_plus,
            'jumlah_penduduk' => $request->jumlah_penduduk,
            'laki_laki' => $request->laki_laki,
            'perempuan' => $request->perempuan,
            'usia_0_17' => $request->usia_0_17,
            'usia_18_56' => $request->usia_18_56,
            'usia_56_keatas' => $request->usia_56_keatas,
            'karyawan_pns' => $request->karyawan_pns,
            'karyawan_pol_tni' => $request->karyawan_pol_tni,
            'karyawan_swasta' => $request->karyawan_swasta,
            'wiraswasta' => $request->wiraswasta,
            'petani' => $request->petani,
            'buruh_tani' => $request->buruh_tani,
            'nelayan' => $request->nelayan,
            'peternak' => $request->peternak,
            'jasa' => $request->jasa,
            'pengrajin' => $request->pengrajin,
            'pekerja_seni' => $request->pekerja_seni,
            'pensiunan' => $request->pensiunan,
            'lainya' => $request->lainya,
            'menganggur' => $request->menganggur,
            'tk' => $request->tk,
            'sd' => $request->sd,
            'sltp' => $request->sltp,
            'slta' => $request->slta,
            'akademi' => $request->akademi,
            'sarjana' => $request->sarjana,
            'pasca_sarjana' => $request->pasca_sarjana,
            'dokter_umum' => $request->dokter_umum,
            'dokter_spesialis' => $request->dokter_spesialis,
            'bidan' => $request->bidan,
            'mantri_kesehatan' => $request->mantri_kesehatan,
            'perawat' => $request->perawat,
            'lulusan_tk' => $request->lulusan_tk,
            'lulusan_sd' => $request->lulusan_sd,
            'lulusan_sltp' => $request->lulusan_sltp,
            'lulusan_slta' => $request->lulusan_slta,
            'lulusan_akademi' => $request->lulusan_akademi,
            'lulusan_s1' => $request->lulusan_s1,
            'lulusan_s2' => $request->lulusan_s2,
            'lulusan_s3' => $request->lulusan_s3,
            'lulusan_ponpes' => $request->lulusan_ponpes,
            'lulusan_pendidikan_keagamaan' => $request->lulusan_pendidikan_keagamaan,
            'lulusan_slb' => $request->lulusan_slb,
            'lulusan_kursus' => $request->lulusan_kursus,
            'tidak_lulus_sekolah' => $request->tidak_lulus_sekolah,
            'tidak_sekolah' => $request->tidak_sekolah,
            'pendapatan_desa' => $request->pendapatan_desa,
            'pendapatan_asli_desa' => $request->pendapatan_asli_desa,
            'pungutan' => $request->pungutan,
            'hasil_bumdes' => $request->hasil_bumdes,
            'hibah' => $request->hibah,
            'pendapatan_lainya' => $request->pendapatan_lainya,
            'bantuan_pemerintah' => $request->bantuan_pemerintah,
            'bantuan_provinsi' => $request->bantuan_provinsi,
            'bantuan_kota' => $request->bantuan_kota,
            'bantuan_lain_tidak_mengikat' => $request->bantuan_lain_tidak_mengikat,
            'silpa' => $request->silpa,
            'dana_cadangan' => $request->dana_cadangan,
            'belanja_rutin' => $request->belanja_rutin,
            'belanja_tidak_rutin' => $request->belanja_tidak_rutin,
        ];
        Laporan::where('idlaporan', $id)->update($data);
        return redirect()->route('laporan.index')->with('success', 'Data berhasil ditambahkan');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Laporan $laporan)
    {
        $laporan->delete();
        return redirect()->route('laporan.index')->with('success', 'Data berhasil dihapus');
    }
}
