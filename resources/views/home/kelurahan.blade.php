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
        .card:hover {
    transform: translateY(-5px);
    transition: 0.3s ease;
    box-shadow: 0 10px 20px rgba(0,0,0,0.1);
}
.card-title {
    font-weight: 600;
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
    @foreach($kelurahan as $item)
        <div class="col-md-6 col-lg-4 mb-4">
            <div class="card h-100 shadow-lg border-0 rounded-4 overflow-hidden">
                <img src="{{ asset( $item->fotokelurahan) }}"
                     class="card-img-top" alt="Foto {{ $item->namakelurahan }}"
                     style="height: 200px; object-fit: cover;">
                <div class="card-body">
                    <h5 class="card-title text-primary">{{ $item->namakelurahan }}</h5>
                    <p class="card-text mb-1">
                        📍 <strong>Kecamatan:</strong> {{ $item->kecamatan }}
                    </p>
                    <p class="card-text mb-1">
                        🏙️ <strong>Kabupaten:</strong> {{ $item->kabupaten }}
                    </p>
                    <p class="card-text mb-1">
                        🌍 <strong>Provinsi:</strong> {{ $item->provinsi }}
                    </p>
                    <p class="card-text">
                        📞 <strong>No HP:</strong> {{ $item->nohpkelurahan }}
                    </p>
                    <a href="/detail-kelurahan/{{ $item->idkelurahan }}"
                       class="btn btn-outline-warning btn-sm mt-2">Lihat Detail</a>
                </div>
            </div>
        </div>
    @endforeach
</div>

        </div>
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

</body>

</html>
