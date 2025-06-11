<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12pt;
        }

        h1,
        h4 {
            margin-top: 30px;
            margin-bottom: 10px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        table th,
        table td {
            border: none;
            padding: 8px 10px;
            vertical-align: top;
            text-align: left;
        }

        table th {
            width: 30%;
            font-weight: bold;
            background-color: #f0f0f0;
        }

        table td {
            width: 70%;
        }

        thead th {
            background-color: #d0d0d0;
            text-align: center;
            font-weight: bold;
        }

        @media print {
            body {
                margin: 0;
            }

            h1,
            h4 {
                page-break-after: avoid;
            }

            table {
                page-break-inside: avoid;
            }
        }
         @page {
            size: auto;
            margin: 0;
        }
    </style>

</head>

<body class="p-3">
    <div class="container-fluid">
        <div class="row">
            <div class="col-3">
                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/4/40/Seal_of_the_Ministry_of_Internal_Affairs_of_the_Republic_of_Indonesia_%282020_version%29.svg/1200px-Seal_of_the_Ministry_of_Internal_Affairs_of_the_Republic_of_Indonesia_%282020_version%29.svg.png"
                    alt="" width="100px" class="">
            </div>
            <div class="col-6">
                <h5 class="fw-bold"> REPUBLIK INDONESIA KEMENTRIAN DALAM NEGERI DIREKTORAT JENDERAL PEMBINAAN PEMERINTAH DESA </h5>

            </div>
            <div class="col-3">

                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/90/National_emblem_of_Indonesia_Garuda_Pancasila.svg/1200px-National_emblem_of_Indonesia_Garuda_Pancasila.svg.png"
                    alt="" width="100px" class="">
            </div>

        </div>
    </div>
    <hr>
    <h3 class="mb-4 text-center">Data Pokok Desa/Kelurahan</h3>
    <h3 class="mb-4 text-center">Tahun {{ $laporan->tahun }} </h3>


    <table>
        <tr>
            <th>Kelurahan</th>
            <td> : {{ $laporan->kelurahan->namakelurahan }}</td>
        </tr>
        <tr>
            <th>Tahun</th>
            <td> : {{ $laporan->tahun }}</td>
        </tr>
        <tr>
            <th>Tanggal</th>
            <td> : {{ \Carbon\Carbon::parse($laporan->tanggal)->locale('id')->translatedFormat('d F Y') }}</td>

        </tr>
    </table>

    <h4>Data Umum</h4>
    <table>
        <tr>
            <th>Topologi</th>
            <td> : {{ $laporan->topologi }}</td>
        </tr>
        <tr>
            <th>Klasifikasi</th>
            <td> : {{ $laporan->klasifikasi }}</td>
        </tr>
        <tr>
            <th>Kategori Desa</th>
            <td> : {{ $laporan->kategoridesa }}</td>
        </tr>
        <tr>
            <th>Komoditas (Luas Tanam)</th>
            <td> : {{ $laporan->komoditas_unggulan_berdasarkan_luas_tanam }}</td>
        </tr>
        <tr>
            <th>Komoditas (Nilai Ekonomi)</th>
            <td> : {{ $laporan->komoditas_unggulan_berdasarkan_nilai_ekonomi }}</td>
        </tr>
    </table>

    <h4>Luas Wilayah (ha)</h4>
    <table>
        <tr>
            <th>Total Wilayah</th>
            <td> : {{ $laporan->luas_wilayah }}</td>
        </tr>
        <tr>
            <th>Lahan Sawah</th>
            <td> : {{ $laporan->lahan_sawah }}</td>
        </tr>
        <tr>
            <th>Lahan Ladang</th>
            <td> : {{ $laporan->lahan_ladang }}</td>
        </tr>
        <tr>
            <th>Lahan Perkebunan</th>
            <td> : {{ $laporan->lahan_perkebunan }}</td>
        </tr>
        <tr>
            <th>Lahan Peternakan</th>
            <td> : {{ $laporan->lahan_peternakan }}</td>
        </tr>
        <tr>
            <th>Hutan</th>
            <td> : {{ $laporan->hutan }}</td>
        </tr>
        <tr>
            <th>Waduk</th>
            <td> : {{ $laporan->waduk }}</td>
        </tr>
        <tr>
            <th>Lainnya</th>
            <td> : {{ $laporan->lahan_lainya }}</td>
        </tr>
    </table>

    <h4>Orbitasi (km)</h4>
    <table>
        <tr>
            <th>Ke Kecamatan</th>
            <td> : {{ $laporan->jarak_dari_pusat_kecamatan }}</td>
        </tr>
        <tr>
            <th>Ke Kota</th>
            <td> : {{ $laporan->jarak_dari_pusat_kota }}</td>
        </tr>
        <tr>
            <th>Ke Kabupaten/Kota</th>
            <td> : {{ $laporan->jarak_dari_pusat_kabupaten }}</td>
        </tr>
        <tr>
            <th>Ke Provinsi</th>
            <td> : {{ $laporan->jarak_dari_pusat_ibu_kota_provinsi }}</td>
        </tr>
    </table>

    <h4>Demografi</h4>
    <table>
        <tr>
            <th>Jumlah KK</th>
            <td> : {{ $laporan->jumlah_kepala_keluarga }}</td>
        </tr>
        <tr>
            <th>Keluarga Pra-Sejahtera</th>
            <td> : {{ $laporan->keluarga_pra_sejahtera }}</td>
        </tr>
        <tr>
            <th>Sejahtera 1</th>
            <td> : {{ $laporan->keluarga_sejahtera_1 }}</td>
        </tr>
        <tr>
            <th>Sejahtera 2</th>
            <td> : {{ $laporan->keluarga_sejahtera_2 }}</td>
        </tr>
        <tr>
            <th>Sejahtera 3</th>
            <td> : {{ $laporan->keluarga_sejahtera_3 }}</td>
        </tr>
        <tr>
            <th>Sejahtera 3+</th>
            <td> : {{ $laporan->keluarga_sejahtera_3_plus }}</td>
        </tr>
        <tr>
            <th>Jumlah Penduduk</th>
            <td> : {{ $laporan->jumlah_penduduk }}</td>
        </tr>
        <tr>
            <th>Laki-laki</th>
            <td> : {{ $laporan->laki_laki }}</td>
        </tr>
        <tr>
            <th>Perempuan</th>
            <td> : {{ $laporan->perempuan }}</td>
        </tr>
        <tr>
            <th>Usia 0–17</th>
            <td> : {{ $laporan->usia_0_17 }}</td>
        </tr>
        <tr>
            <th>Usia 18–56</th>
            <td> : {{ $laporan->usia_18_56 }}</td>
        </tr>
        <tr>
            <th>Usia >56</th>
            <td> : {{ $laporan->usia_56_keatas }}</td>
        </tr>
    </table>

    <h4>Pekerjaan</h4>
    <table>
        @foreach ($pekerjaanFields as $field => $label)
            <tr>
                <th>{{ $label }}</th>
                <td> : {{ $laporan->$field }}</td>
            </tr>
        @endforeach
    </table>

    <h4>Pendidikan & Kesehatan</h4>
    <table>
        @foreach ($pendidikanFields as $field => $label)
            <tr>
                <th>{{ $label }}</th>
                <td> : {{ $laporan->$field }}</td>
            </tr>
        @endforeach
        @foreach ($kesehatanFields as $field => $label)
            <tr>
                <th>{{ $label }}</th>
                <td> : {{ $laporan->$field }}</td>
            </tr>
        @endforeach
    </table>

    <h4>Lulusan Pendidikan</h4>
    <table>
        <thead>
            <tr>
                <th>Umum</th>
            </tr>
        </thead>
        @foreach ($lulusanFields as $field => $label)
            <tr>
                <th>{{ $label }}</th>
                <td> : {{ $laporan->$field }}</td>
            </tr>
        @endforeach
        <thead>
            <tr>
                <th>Pendidikan Khusus</th>
            </tr>
        </thead>
        @foreach ($lulusanFields2 as $field => $label)
            <tr>
                <th>{{ $label }}</th>
                <td> : {{ $laporan->$field }}</td>
            </tr>
        @endforeach
        <thead>
            <tr>
                <th>Tidak Lulus/Sekolah</th>
            </tr>
        </thead>
        @foreach ($lulusanFields3 as $field => $label)
            <tr>
                <th>{{ $label }}</th>
                <td> : {{ $laporan->$field }}</td>
            </tr>
        @endforeach
    </table>

    <h4>Keuangan Desa</h4>
    <table>
        <tr>
            <th>Pendapatan Desa</th>
            <td> : {{ $laporan->pendapatan_desa }}</td>
        </tr>
        <tr>
            <th>Pendapatan Asli Desa</th>
            <td> : {{ $laporan->pendapatan_asli_desa }}</td>
        </tr>
        @foreach ($keuanganFields1 as $field => $label)
            <tr>
                <th>{{ $label }}</th>
                <td> : {{ $laporan->$field }}</td>
            </tr>
        @endforeach
        <tr>
            <th>Bantuan Diterima</th>
            <td> : {{ $laporan->bantuan_yang_diterima }}</td>
        </tr>
        @foreach ($keuanganFields2 as $field => $label)
            <tr>
                <th>{{ $label }}</th>
                <td> : {{ $laporan->$field }}</td>
            </tr>
        @endforeach
        @foreach ($keuanganFields3 as $field => $label)
            <tr>
                <th>{{ $label }}</th>
                <td> : {{ $laporan->$field }}</td>
            </tr>
        @endforeach
        @foreach ($keuanganFields4 as $field => $label)
            <tr>
                <th>{{ $label }}</th>
                <td> : {{ $laporan->$field }}</td>
            </tr>
        @endforeach
    </table>

    <script>
        window.onload = function () {
            window.print();
            window.onafterprint = function () {
                // Redirect kembali ke halaman laporan
                window.location.href = "{{ route('laporan.index') }}";
            }
        }
    </script>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO"
        crossorigin="anonymous"></script>
</body>

</html>
