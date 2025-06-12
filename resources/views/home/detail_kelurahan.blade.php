<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    <title>Si Kelur</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('depan/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">


    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="{{ asset('depan/assets/css/fontawesome.css')}}">
    <link rel="stylesheet" href="{{ asset('depan/assets/css/templatemo-villa-agency.css')}}">
    <link rel="stylesheet" href="{{ asset('depan/assets/css/owl.css')}}">
    <link rel="stylesheet" href="{{ asset('depan/assets/css/animate.css')}}">
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css')}}" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />


    <style>
        .main-banner .item-1 {
            background-image: url(foto/bg.gif);
        }

        .main-banner .item-2 {
            background-image: url(foto/bg.gif);
        }

        .main-banner .item-3 {
            background-image: url(foto/bg.gif);
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
    </style>
</head>

<body>

    <!-- ***** Preloader Start ***** -->
    <div id="js-preloader" class="js-preloader">
        <div class="preloader-inner">
            <span class="dot"></span>
            <div class="dots">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
    </div>
    <header class="header-area header-sticky bg-dark">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <a href="/" class="logo">
                            <h1> <img src="{{ asset('foto/logos.png') }}" style="width: 50px !important">
                            </h1>
                        </a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li><a href="{{ url('home/kelurahan') }}" class="text-white"> Data Kelurahan</a></li>
                            <li><a href="{{ url('home/login') }}"><i class="fa fa-sign-in"></i> Login</a></li>
                        </ul>
                        <a class='menu-trigger'>
                            <span>Menu</span>
                        </a>
                        <!-- ***** Menu End ***** -->
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ***** Header Area End ***** -->



    <div class="featured section">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mb-4">
                    <div class="card shadow mb-4">
                        <div
                            class="card-header py-3 d-flex flex-row align-items-center justify-content-between bg-danger">
                            <h6 class="m-0 font-weight-bold text-white">Detail Kelurahan</h6>
                        </div>
                        <div class="card shadow-sm rounded-4 border-0 mb-4">
                            <div class="card-body">
                                <h4 class="card-title fw-bold text-primary mb-4">
                                    Detail Kelurahan: {{ $kelurahan->namakelurahan }}
                                </h4>

                                <div class="row">
                                    <div class="col-md-7">
                                        <table class="table table-borderless mb-0">
                                            <tbody>
                                                <tr>
                                                    <th style="width: 150px;">📍 Alamat</th>
                                                    <td>{{ $kelurahan->alamatkelurahan }}</td>
                                                </tr>
                                                <tr>
                                                    <th>📞 No. HP</th>
                                                    <td>{{ $kelurahan->nohpkelurahan }}</td>
                                                </tr>
                                                <tr>
                                                    <th>🏘️ Kecamatan</th>
                                                    <td>{{ $kelurahan->kecamatan }}</td>
                                                </tr>
                                                <tr>
                                                    <th>🏙️ Kabupaten</th>
                                                    <td>{{ $kelurahan->kabupaten }}</td>
                                                </tr>
                                                <tr>
                                                    <th>🌍 Provinsi</th>
                                                    <td>{{ $kelurahan->provinsi }}</td>
                                                </tr>
                                                <tr>
                                                    <th>🧭 Latitude</th>
                                                    <td>{{ $kelurahan->latitude ?? '-' }}</td>
                                                </tr>
                                                <tr>
                                                    <th>🧭 Longitude</th>
                                                    <td>{{ $kelurahan->longitude ?? '-' }}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                    <div class="col-md-5">
                                        <div class="text-center">
                                            <strong>🖼️ Foto Kelurahan</strong><br>
                                            @if ($kelurahan->fotokelurahan)
                                                <img src="{{ asset($kelurahan->fotokelurahan) }}" alt="Foto Kelurahan"
                                                    class="img-fluid rounded shadow mt-2" style="max-height: 250px;">
                                            @else
                                                <p class="text-muted mt-2"><em>Tidak ada foto</em></p>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                {{-- Peta --}}
                                <div class="mt-4">
                                    <strong>🗺️ Lokasi pada Peta:</strong>
                                    <div id="map" style="height: 300px;" class="rounded shadow-sm mt-2"></div>
                                </div>

                                <div class="mt-4">
                                    <a href="{{ url()->previous() }}" class="btn btn-secondary">
                                        ← Kembali
                                    </a>
                                </div>
                            </div>
                        </div>



                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
    <h2>Daftar Laporan Kelurahan {{ $kelurahan->namakelurahan }}</h2>

    @foreach ($laporanList as $laporan)
        <div class="card mb-4">
            <div class="card-header">
                <h4>Tahun: {{ $laporan->tahun }}</h4>
            </div>
            <div class="card-body">
                {{-- PEKERJAAN --}}
                <h5>Pekerjaan</h5>
                <table class="table table-bordered">
                    @foreach ($pekerjaanFields as $field => $label)
                        <tr>
                            <th>{{ $label }}</th>
                            <td>{{ $laporan->$field ?? '-' }}</td>
                        </tr>
                    @endforeach
                </table>

                {{-- PENDIDIKAN --}}
                <h5>Pendidikan</h5>
                <table class="table table-bordered">
                    @foreach ($pendidikanFields as $field => $label)
                        <tr>
                            <th>{{ $label }}</th>
                            <td>{{ $laporan->$field ?? '-' }}</td>
                        </tr>
                    @endforeach
                </table>

                {{-- LULUSAN FORMAL --}}
                <h5>Lulusan Pendidikan Formal</h5>
                <table class="table table-bordered">
                    @foreach ($lulusanFields as $field => $label)
                        <tr>
                            <th>{{ $label }}</th>
                            <td>{{ $laporan->$field ?? '-' }}</td>
                        </tr>
                    @endforeach
                </table>

                {{-- LULUSAN NON-FORMAL --}}
                <h5>Lulusan Pendidikan Non-Formal</h5>
                <table class="table table-bordered">
                    @foreach ($lulusanFields2 as $field => $label)
                        <tr>
                            <th>{{ $label }}</th>
                            <td>{{ $laporan->$field ?? '-' }}</td>
                        </tr>
                    @endforeach
                </table>

                {{-- TIDAK SEKOLAH --}}
                <h5>Tidak Bersekolah</h5>
                <table class="table table-bordered">
                    @foreach ($lulusanFields3 as $field => $label)
                        <tr>
                            <th>{{ $label }}</th>
                            <td>{{ $laporan->$field ?? '-' }}</td>
                        </tr>
                    @endforeach
                </table>

                {{-- FASILITAS KESEHATAN --}}
                <h5>Kesehatan</h5>
                <table class="table table-bordered">
                    @foreach ($kesehatanFields as $field => $label)
                        <tr>
                            <th>{{ $label }}</th>
                            <td>{{ $laporan->$field ?? '-' }}</td>
                        </tr>
                    @endforeach
                </table>

                {{-- KEUANGAN - PENDAPATAN --}}
                <h5>Keuangan - Pendapatan</h5>
                <table class="table table-bordered">
                    @foreach ($keuanganFields1 as $field => $label)
                        <tr>
                            <th>{{ $label }}</th>
                            <td>Rp {{ number_format($laporan->$field ?? 0, 0, ',', '.') }}</td>
                        </tr>
                    @endforeach
                </table>

                {{-- KEUANGAN - BANTUAN --}}
                <h5>Keuangan - Bantuan</h5>
                <table class="table table-bordered">
                    @foreach ($keuanganFields2 as $field => $label)
                        <tr>
                            <th>{{ $label }}</th>
                            <td>Rp {{ number_format($laporan->$field ?? 0, 0, ',', '.') }}</td>
                        </tr>
                    @endforeach
                </table>

                {{-- KEUANGAN - BELANJA --}}
                <h5>Keuangan - Belanja</h5>
                <table class="table table-bordered">
                    @foreach ($keuanganFields3 as $field => $label)
                        <tr>
                            <th>{{ $label }}</th>
                            <td>Rp {{ number_format($laporan->$field ?? 0, 0, ',', '.') }}</td>
                        </tr>
                    @endforeach
                </table>

                {{-- KEUANGAN - SISA --}}
                <h5>Keuangan - Sisa Anggaran</h5>
                <table class="table table-bordered">
                    @foreach ($keuanganFields4 as $field => $label)
                        <tr>
                            <th>{{ $label }}</th>
                            <td>Rp {{ number_format($laporan->$field ?? 0, 0, ',', '.') }}</td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    @endforeach
</div>

    <div class="contact section">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 offset-lg-4">
                    <div class="section-heading text-center">
                        <h6>| Kontak Kami</h6>
                        <h2>Silahkan hubungi kontak ini</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="contact-content">
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    <div id="map">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3981.9464445978183!2d98.68108407497319!3d3.5997439963743876!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x303131bf03990edb%3A0xa119aa5ee28baff9!2sPolrestabes%20Medan!5e0!3m2!1sid!2sid!4v1735962538273!5m2!1sid!2sid"
                            width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="col-lg-12 mt-5 mb-5">
                        <div class="item email">
                            <img src="{{ asset('depan/assets/images/phone-icon.png') }}" alt=""
                                style="max-width: 52px;">
                            <h6>061 4556732<br><span>No. HP</span></h6>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="item email">
                            <img src="{{ asset('depan/assets/images/email-icon.png') }}" alt=""
                                style="max-width: 52px;">
                            <h6>admin@polri.go.id<br><span>Email</span></h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer>
        <div class="container">
            <div class="col-lg-8">
                <p>
                    Dibuat Oleh :
                </p>
            </div>
        </div>
    </footer>

    <!-- Scripts -->
    <!-- Bootstrap core JavaScript -->
    <script src="{{ asset('depan/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('depan/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('depan/assets/js/isotope.min.js')}}"></script>
    <script src="{{ asset('depan/assets/js/owl-carousel.js')}}"></script>
    <script src="{{ asset('depan/assets/js/counter.js')}}"></script>
    <script src="{{ asset('depan/assets/js/custom.js')}}"></script>


    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>


    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const lat = {{ $kelurahan->latitude ?? 0 }};
            const lng = {{ $kelurahan->longitude ?? 0 }};

            const map = L.map('map').setView([lat, lng], 14);

            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 19,
                attribution: '&copy; OpenStreetMap'
            }).addTo(map);

            L.marker([lat, lng]).addTo(map)
                .bindPopup("{{ $kelurahan->namakelurahan }}")
                .openPopup();
        });
    </script>

</body>

</html>
