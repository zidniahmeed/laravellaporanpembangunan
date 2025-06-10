<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    <title>Pengaduan Polsek Medan</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('depan/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">


    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="{{ asset('depan/assets/css/fontawesome.css')}}">
    <link rel="stylesheet" href="{{ asset('depan/assets/css/templatemo-villa-agency.css')}}">
    <link rel="stylesheet" href="{{ asset('depan/assets/css/owl.css')}}">
    <link rel="stylesheet" href="{{ asset('depan/assets/css/animate.css')}}">
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css')}}" />
    <!--

TemplateMo 591 villa agency

https://templatemo.com/tm-591-villa-agency

-->
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
                            <h1> <img src="{{ asset('foto/logo.jpg') }}" style="width: 50px !important">
                            </h1>
                        </a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li><a href="#kontak" class="text-white">Kontak</a></li>
                            <li><a href="{{ url('home/daftar') }}" class="text-white">Daftar</a></li>
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

    <div class="main-banner">
        <div class="owl-carousel owl-banner">
            <div class="item item-1">
                <div class="header-text">
                    <span class="category">Selamat <em>Datang</em></span>
                    <h2>Di Website Pengaduan Polsek Medan</h2>
                </div>
            </div>
            <div class="item item-2">
                <div class="header-text">
                    <span class="category">Selamat <em>Datang</em></span>
                    <h2>Di Website Pengaduan Polsek Medan</h2>
                </div>
            </div>
            <div class="item item-3">
                <div class="header-text">
                    <span class="category">Selamat <em>Datang</em></span>
                    <h2>Di Website Pengaduan Polsek Medan</h2>
                </div>
            </div>
        </div>
    </div>

    <div class="featured section">
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <div class="left-image">
                        <img src="{{ asset('foto/kantor2.jpg') }}" alt="">
                        <a href="/"><img src="{{ asset('foto/logo.jpg') }}" alt=""
                                style="max-width: 60px; padding: 0px;"></a>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="section-heading">
                        <h6>| Tentang Website</h6>
                        <p class="text-justify">
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has
                            been the industry's standard dummy text ever since the 1500s, when an unknown printer took a
                            galley of type and scrambled it to make a type specimen book. It has survived not only five
                            centuries, but also the leap into electronic typesetting, remaining essentially unchanged.
                            It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum
                            passages, and more recently with desktop publishing software like Aldus PageMaker including
                            versions of Lorem Ipsum.
                        </p>
                    </div>
                </div>
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
                      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3981.9464445978183!2d98.68108407497319!3d3.5997439963743876!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x303131bf03990edb%3A0xa119aa5ee28baff9!2sPolrestabes%20Medan!5e0!3m2!1sid!2sid!4v1735962538273!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
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