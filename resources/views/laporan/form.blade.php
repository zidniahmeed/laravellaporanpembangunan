<!-- Kelurahan -->
<div class="mb-3">
    <label for="idkelurahan" class="form-label">Kelurahan</label>
    <select name="idkelurahan" id="idkelurahan" class="form-control" required>
        <option value="">-- Pilih Kelurahan --</option>
        @foreach($kelurahanList as $k)
            <option value="{{ $k->idkelurahan }}" @selected(old('idkelurahan', $laporan->idkelurahan ?? '') == $k->idkelurahan)>
                {{ $k->namakelurahan }}
            </option>

        @endforeach

    </select>
</div>



<div class="mb-3">
    <label for="tahun" class="form-label">Tahun</label>
    <select name="tahun" id="tahun" class="form-control" required>
        <option value="">-- Pilih Tahun --</option>
        @php
            $currentYear = date('Y');
            $startYear = $currentYear - 10;
            $endYear = $currentYear + 10;
            $selectedYear = old('tahun') ?? ($laporan->tahun ?? null ? date('Y', strtotime($laporan->tahun)) : null);
        @endphp

        @for ($year = $startYear; $year <= $endYear; $year++)
            <option value="{{ $year }}" {{ $selectedYear == $year ? 'selected' : '' }}>{{ $year }}</option>
        @endfor
    </select>
</div>



<!-- Tanggal -->
<div class="mb-3">
    <label for="tanggal" class="form-label">Tanggal</label>
    <input type="date" name="tanggal" class="form-control"
        value="{{ old('tanggal', isset($laporan->tanggal) ? $laporan->tanggal : '') }}">
</div>
<h3 class="mb-3 mt-3">Data Umum</h3>
<!-- Topologi -->
<div class="mb-3">
    <label for="topologi" class="form-label">1. Topologi</label>
    <input type="text" name="topologi" class="form-control" value="{{ old('topologi', $laporan->topologi ?? '') }}">
</div>

<!-- Klasifikasi -->
<div class="mb-3">
    <label for="klasifikasi" class="form-label">2. Klasifikasi</label>
    <input type="text" name="klasifikasi" class="form-control"
        value="{{ old('klasifikasi', $laporan->klasifikasi ?? '') }}">
</div>

<!-- Kategori Desa -->
<div class="mb-3">
    <label for="kategoridesa" class="form-label">3. Kategori Desa</label>
    <input type="text" name="kategoridesa" class="form-control"
        value="{{ old('kategoridesa', $laporan->kategoridesa ?? '') }}">
</div>

<!-- Komoditas Unggulan -->
<div class="mb-3">
    <label class="form-label">4. Komoditas Berdasarkan Luas Tanam</label>
    <input type="text" name="komoditas_unggulan_berdasarkan_luas_tanam" class="form-control"
        value="{{ old('komoditas_unggulan_berdasarkan_luas_tanam', $laporan->komoditas_unggulan_berdasarkan_luas_tanam ?? '') }}">
</div>

<div class="mb-3">
    <label class="form-label">5. Komoditas Berdasarkan Nilai Ekonomi</label>
    <input type="text" name="komoditas_unggulan_berdasarkan_nilai_ekonomi" class="form-control"
        value="{{ old('komoditas_unggulan_berdasarkan_nilai_ekonomi', $laporan->komoditas_unggulan_berdasarkan_nilai_ekonomi ?? '') }}">
</div>

<!-- Luasan -->
@php
    $fieldsDecimal1 = [
        'lahan_sawah' => 'a. Lahan Sawah (ha)',
        'lahan_ladang' => 'b. Lahan Ladang (ha)',
        'lahan_perkebunan' => 'c. Lahan Perkebunan (ha)',
        'lahan_peternakan' => 'd. Lahan Peternakan (ha)',
        'hutan' => 'e. Hutan (ha)',
        'waduk' => 'f. Waduk (ha)',
        'lahan_lainya' => 'g. Lahan Lainnya (ha)',

    ];
    $fieldsDecimal3 = [
        'jarak_dari_pusat_kecamatan' => 'a. Jarak ke Kecamatan (km)',
        'jarak_dari_pusat_kota' => 'b. Jarak ke Kota (km)',
        'jarak_dari_pusat_kabupaten' => 'c. Jarak ke Kabupaten (km)',
        'jarak_dari_pusat_ibu_kota_provinsi' => 'd. Jarak ke Ibu Kota Provinsi (km)'
    ];
@endphp

<div class="mb-3">
    <label for="luas_wilayah" class="form-label">6.Luas Wilayah (ha)</label>
    <input type="number" step="0.01" name="luas_wilayah" class="form-control"
        value="{{ old('luas_wilayah', $laporan->luas_wilayah ?? 'luas_wilayah') }}">
</div>
@foreach($fieldsDecimal1 as $name => $label)
    <div class="ml-5 mb-3">
        <label for="{{ $name }}" class="form-label">{{ $label }}</label>
        <input type="number" step="0.01" name="{{ $name }}" class="form-control"
            value="{{ old($name, $laporan->$name ?? '') }}">
    </div>
@endforeach

<div class="mb-3 row">
    <div class="col-6 mb-3">
        <label for="luas_tanah_sertifikat" class="form-label">7. Luas Sertifat Tanah (ha)</label>
        <input type="number" name="luas_tanah_sertifikat" class="form-control"
            value="{{ old('luas_tanah_sertifikat', $laporan->luas_tanah_sertifikat ?? '') }}">
    </div>
    <div class="col-6 mb-3">
        <label for="jumlah_sertifikat" class="form-label">Jumlah Sertifikat</label>
        <input type="number" name="jumlah_sertifikat" class="form-control"
            value="{{ old('jumlah_sertifikat', $laporan->jumlah_sertifikat ?? '') }}">
    </div>


</div>
<div class="mb-3">
    <label for="luas_tanah_kas" class="form-label">8. Luas Tanah Kas (ha)</label>
    <input type="number" name="luas_tanah_kas" class="form-control"
        value="{{ old('luas_tanah_kas', $laporan->luas_tanah_kas ?? '') }}">
</div>

9. Orbitasi (Jarak Dari Pusat Pemerintahan)
@foreach($fieldsDecimal3 as $name => $label)
    <div class="ml-5 mb-3 mt-2">
        <label for="{{ $name }}" class="form-label">{{ $label }}</label>
        <input type="number" step="0.1" name="{{ $name }}" class="form-control"
            value="{{ old($name, $laporan->$name ?? '') }}">
    </div>
@endforeach

<!-- Jumlah Sertifikat -->



<!-- Demografi -->
@php
    $demografiFields = [
        'keluarga_pra_sejahtera' => 'a. Keluarga Pra-Sejahtera',
        'keluarga_sejahtera_1' => 'b. Keluarga Sejahtera 1',
        'keluarga_sejahtera_2' => 'c. Keluarga Sejahtera 2',
        'keluarga_sejahtera_3' => 'd. Keluarga Sejahtera 3',
        'keluarga_sejahtera_3_plus' => 'e. Keluarga Sejahtera 3+',

    ];
    $demografiFields2 = [
        'laki_laki' => 'Penduduk Laki-laki',
        'perempuan' => 'Penduduk Perempuan',
        'usia_0_17' => 'Penduduk Usia 0-17',
        'usia_18_56' => 'Penduduk Usia 18-56',
        'usia_56_keatas' => 'Penduduk Usia >56',
    ];
@endphp

<div class="mb-3">
    <label for="jumlah_kepala_keluarga" class="form-label">10. Jumlah Kepala Keluarga (kk)</label>
    <input type="number" name="jumlah_kepala_keluarga" class="form-control"
        value="{{ old('jumlah_kepala_keluarga', $laporan->jumlah_kepala_keluarga ?? '') }}">
</div>
@foreach ($demografiFields as $field => $label)
    <div class="ml-5 mb-3">
        <label for="{{ $field }}" class="form-label">{{ $label }} (kk)</label>
        <input type="number" name="{{ $field }}" class="form-control" value="{{ old($field, $laporan->$field ?? '') }}">
    </div>
@endforeach


<div class="mb-3">
    <label for="jumlah_penduduk" class="form-label">11. Jumlah Penduduk (jiwa)</label>
    <input type="number" name="jumlah_penduduk" class="form-control"
        value="{{ old('jumlah_penduduk', $laporan->jumlah_penduduk ?? '') }}">
</div>

@foreach ($demografiFields2 as $field => $label)
    <div class="ml-5 mb-3">
        <label for="{{ $field }}" class="form-label">{{ $label }} (jiwa)</label>
        <input type="number" name="{{ $field }}" class="form-control" value="{{ old($field, $laporan->$field ?? '') }}">
    </div>
@endforeach

<!-- ===== PEKERJAAN ===== -->
@php
    $pekerjaanFields = [
        'karyawan_pns' => 'Karyawan PNS',
        'karyawan_pol_tni' => 'Karyawan POLRI/TNI',
        'karyawan_swasta' => 'Karyawan Swasta',
        'wiraswasta' => 'Wiraswasta',
        'petani' => 'Petani',
        'buruh_tani' => 'Buruh Tani',
        'nelayan' => 'Nelayan',
        'peternak' => 'Peternak',
        'jasa' => 'Pekerja Jasa',
        'pengrajin' => 'Pengrajin',
        'pekerja_seni' => 'Pekerja Seni',
        'pensiunan' => 'Pensiunan',
        'lainya' => 'Lainnya',
        'menganggur' => 'Menganggur',
    ];
@endphp

12. Pekerjaan/Mata Pencaharian

@foreach ($pekerjaanFields as $field => $label)
    <div class="ml-5 mb-3">
        <label for="{{ $field }}" class="form-label">{{ $label }} (Orang)</label>
        <input type="number" name="{{ $field }}" class="form-control" value="{{ old($field, $laporan->$field ?? '') }}">
    </div>
@endforeach

<!-- ===== PENDIDIKAN ===== -->
@php
    $pendidikanFields = [
        'tk' => 'Tingkat TK',
        'sd' => 'Tingkat SD',
        'sltp' => 'Tingkat SLTP',
        'slta' => 'Tingkat SLTA',
        'akademi' => 'Akademi/Diploma',
        'sarjana' => 'Sarjana',
        'pasca_sarjana' => 'Pasca Sarjana',
    ];
@endphp

12. Rasio Pendidikan dan Kesehatan
<div class="ml-5 mb-3">
    a. Rasio Murid dan Guru
</div>
@foreach ($pendidikanFields as $field => $label)
    <div class="ml-5 mb-3">
        <label for="{{ $field }}" class="form-label">- {{ $label }} (Orang)</label>
        <input type="number" name="{{ $field }}" class="form-control" value="{{ old($field, $laporan->$field ?? '') }}">
    </div>
@endforeach

<!-- ===== TENAGA KESEHATAN ===== -->
<div class="ml-5 mb-3">
    a. Rasio Penduduk dan Tenaga Kesehatan
</div>
@php
    $kesehatanFields = [
        'dokter_umum' => 'Dokter Umum',
        'dokter_spesialis' => 'Dokter Spesialis',
        'bidan' => 'Bidan',
        'mantri_kesehatan' => 'Mantri Kesehatan',
        'perawat' => 'Perawat'
    ];
@endphp


@foreach ($kesehatanFields as $field => $label)
    <div class="ml-5 mb-3">
        <label for="{{ $field }}" class="form-label">{{ $label }} (Orang)</label>
        <input type="number" name="{{ $field }}" class="form-control" value="{{ old($field, $laporan->$field ?? '') }}">
    </div>
@endforeach

@php
    $lulusanFields = [
        'lulusan_tk' => 'Lulusan TK',
        'lulusan_sd' => 'Lulusan SD',
        'lulusan_sltp' => 'Lulusan SLTP',
        'lulusan_slta' => 'Lulusan SLTA',
        'lulusan_akademi' => 'Lulusan Akademi/Diploma',
        'lulusan_s1' => 'Lulusan S1',
        'lulusan_s2' => 'Lulusan S2',
        'lulusan_s3' => 'Lulusan S3',


    ];
    $lulusanFields2 = [
        'lulusan_ponpes' => 'Lulusan Pondok Pesantren',
        'lulusan_pendidikan_keagamaan' => 'Lulusan Pendidikan Keagamaan Non-Formal',
        'lulusan_slb' => 'Lulusan SLB',
        'lulusan_kursus' => 'Lulusan Kursus / Pelatihan',
    ];

    $lulusanFields3 = [
        'tidak_lulus_sekolah' => 'Tidak Lulus Sekolah',
        'tidak_sekolah' => 'Tidak Pernah Sekolah',
    ]
@endphp

14. Tingkat Pendidikan Masyarakat
<div class="ml-5 mb-3">
    c. Lulusan Pendidikan Umum
</div>
@foreach ($lulusanFields as $field => $label)
    <div class="ml-5 mb-3">
        <label for="{{ $field }}" class="form-label">- {{ $label }}</label>
        <input type="number" name="{{ $field }}" class="form-control" value="{{ old($field, $laporan->$field ?? '') }}">
    </div>
@endforeach
<div class="ml-5 mb-3">
    d. Lulusan Pendidikan Khusus
</div>
@foreach ($lulusanFields2 as $field => $label)
    <div class="ml-5 mb-3">
        <label for="{{ $field }}" class="form-label">- {{ $label }}</label>
        <input type="number" name="{{ $field }}" class="form-control" value="{{ old($field, $laporan->$field ?? '') }}">
    </div>
@endforeach

<div class="ml-5 mb-3">
    e. Tidak Lulus dan Tidak Sekolah
</div>
@foreach ($lulusanFields3 as $field => $label)
    <div class="ml-5 mb-3">
        <label for="{{ $field }}" class="form-label">- {{ $label }}</label>
        <input type="number" name="{{ $field }}" class="form-control" value="{{ old($field, $laporan->$field ?? '') }}">
    </div>
@endforeach
@php
    $keuanganFields3 = [
        'bantuan_lain_tidak_mengikat' => 'c. Bantuan Lain (Tidak Mengikat)',
        'silpa' => 'd. SILPA (Sisa Lebih Perhitungan Anggaran)',
        'dana_cadangan' => 'e. Dana Cadangan',
    ];
    $keuanganFields1 = [
        'pungutan' => 'Pungutan',
        'hasil_bumdes' => 'Hasil BUMDes',
        'hibah' => 'Hibah',
        'pendapatan_lainya' => 'Pendapatan Lainnya',
    ];
    $keuanganFields2 = [
        'bantuan_pemerintah' => 'Bantuan Pemerintah Pusat',
        'bantuan_provinsi' => 'Bantuan Pemerintah Provinsi',
        'bantuan_kota' => 'Bantuan Pemerintah Kabupaten/Kota',
    ];
    $keuanganFields4 = [
        'belanja_rutin' => 'a. Belanja Rutin',
        'belanja_tidak_rutin' => 'b. Belanja Tidak Rutin',
    ]


@endphp

<h3 class="mt-3 mb-3 ">Keuangan Desa</h3>
<div class="mb-3">
    <label for="pendapatan_desa" class="form-label">1. Pendapatan Desa</label>
    <input type="number" step="0.01" name="pendapatan_desa" class="form-control"
        value="{{ old('pendapatan_desa', $laporan->pendapatan_desa ?? '') }}">
</div>
<div class="ml-5 mb-3">
    <label for="pendapatan_asli_desa" class="form-label">a. Pendapatan Asli Desa</label>
    <input type="number" step="0.01" name="pendapatan_asli_desa" class="form-control"
        value="{{ old('pendapatan_asli_desa', $laporan->pendapatan_asli_desa ?? '') }}">
</div>
<div class="ml-5">
    @foreach ($keuanganFields1 as $field => $label)
        <div class="ml-5 mb-3">
            <label for="{{ $field }}" class="form-label">- {{ $label }}</label>
            <input type="number" step="0.01" name="{{ $field }}" class="form-control"
                value="{{ old($field, $laporan->$field ?? '') }}">
        </div>
    @endforeach
</div>
<div class="ml-5 mb-3">
    <label for="bantuan_yang_diterima" class="form-label">b. Bantuan Yang Diterima</label>
    <input type="number" step="0.01" name="bantuan_yang_diterima" class="form-control"
        value="{{ old('bantuan_yang_diterima', $laporan->bantuan_yang_diterima ?? '') }}">
</div>
<div class="ml-5">
    @foreach ($keuanganFields2 as $field => $label)
        <div class="ml-5 mb-3">
            <label for="{{ $field }}" class="form-label">- {{ $label }}</label>
            <input type="number" step="0.01" name="{{ $field }}" class="form-control"
                value="{{ old($field, $laporan->$field ?? '') }}">
        </div>
    @endforeach
</div>
@foreach ($keuanganFields3 as $field => $label)
    <div class="ml-5 mb-3">
        <label for="{{ $field }}" class="form-label">{{ $label }}</label>
        <input type="number" step="0.01" name="{{ $field }}" class="form-control"
            value="{{ old($field, $laporan->$field ?? '') }}">
    </div>
@endforeach
    <label for="pendapatan_desa" class="form-label">2. Belanja Desa/kelurahan</label>
@foreach ($keuanganFields4 as $field => $label)
    <div class="ml-5 mb-3">
        <label for="{{ $field }}" class="form-label">{{ $label }}</label>
        <input type="number" step="0.01" name="{{ $field }}" class="form-control"
            value="{{ old($field, $laporan->$field ?? '') }}">
    </div>
@endforeach
