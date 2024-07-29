<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Ortographic - Donde las letras se vuelven tu juego.</title>
    <meta content="" name="description">
    <meta content="" name="keywords">



    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

    <!-- Main CSS File -->
    <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet">
    <link rel="shortcut icon" href="assets/img/logoOrtographic.webp" type="image/x-icon">
    <!-- =======================================================
        * Template Name: Nova
        * Template URL: https://bootstrapmade.com/nova-bootstrap-business-template/
        * Updated: Jun 29 2024 with Bootstrap v5.3.3
        * Author: BootstrapMade.com
        * License: https://bootstrapmade.com/license/
        ======================================================== -->
</head>

<body>


    <header id="header" class="header d-flex align-items-center fixed-top">
        <div class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between">

            <a href="" class="logo d-flex align-items-center">
                <!-- Uncomment the line below if you also wish to use an image logo -->
                <!-- <img src="assets/img/logo.png" alt=""> -->
                <h1 class="sitename">Ortographic</h1>
            </a>

            <nav id="navmenu" class="navmenu">
                <ul>
                    @if (Route::has('login'))

                        @auth
                            <li><a href="{{ url('/home') }}">
                                    Empezar a practicar
                                </a></li>
                        @else
                            <li><a href="{{ route('login') }}">
                                    Inciar sesión
                                </a></li>

                            @if (Route::has('register'))
                                <li><a href="{{ route('register') }}">
                                        Registrarse
                                    </a></li>
                            @endif
                        @endauth
                        @if (session('error'))
                            <script>
                                < script >
                                    Swal.fire({
                                        title: "Error",
                                        text: "{{ session('error') }}",
                                        icon: "error"
                                    });
                            </script>
                            </script>
                        @endif

                    @endif
                </ul>
                <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
            </nav>

        </div>
    </header>

    <main class="main">

        <!-- Hero Section -->
        <section id="hero" class="hero section dark-background">

            <img src="{{ asset('assets/img/fondo-hero2.webp') }}" alt="" data-aos="fade-in">

            <div class="container">
                <div class="row">
                    <div class="col-xl-4">
                        <h1 data-aos="fade-up">Ortographic</h1>
                        <h5>Donde las letras se vuelven tu juego</h5>
                        <blockquote data-aos="fade-up" data-aos-delay="100">
                            <p>Ortographic es una plataforma diseñada para ayudarte a mejorar tu ortografía de una
                                manera
                                divertida y
                                educativa. Nos comprometemos a ofrecerte una experiencia interactiva que haga que
                                aprender
                                ortografía sea
                                más fácil y entretenido que nunca.
                            </p>
                        </blockquote>
                        <div class="d-flex" data-aos="fade-up" data-aos-delay="200">
                            <a href="{{ route('login') }}" class="btn-get-started">Empezar a practicar</a>
                        </div>
                    </div>
                </div>
            </div>

        </section><!-- /Hero Section -->
    </main>

    <footer id="footer" class="footer light-background">

        <div class="footer-top">
            <div class="container">
                <div class="row gy-4">
                    <div class="col-lg-5 col-md-12 footer-about">
                        <a href="" class="logo d-flex align-items-center">
                            <span class="sitename">Ortographic</span>
                        </a>
                        <p>© 2024 Copyright DGETI - CBTis No. 150.</p>
                        <div class="social-links d-flex mt-4">
                            <a href=""><i class="bi bi-facebook"></i></a>
                            <a href=""><i class="bi bi-instagram"></i></a>
                        </div>
                    </div>

                    <div class="col-6 footer-links">
                        {{-- <h4>Useful Links</h4> --}}
                        <ul>
                            <p>Proyecto presentado como prototipo didáctico para la DEGETI.</p>
                            <p>CBTis No 150.</p>
                            <p>Ocotlán de Morelos, Oaxaca, México.</p>
                        </ul>
                    </div>

                </div>
            </div>
        </div>

        <div class="container copyright text-center">
            {{-- <p>© <span>Copyright</span> <strong class="px-1 sitename">Nova</strong> <span>All Rights Reserved</span></p>
            <div class="credits"> --}}
            <!-- All the links in the footer should remain intact. -->
            <!-- You can delete the links only if you've purchased the pro version. -->
            <!-- Licensing information: https://bootstrapmade.com/license/ -->
            <!-- Purchase the pro version with working PHP/AJAX contact form: [buy-url] -->
            Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
        </div>
        </div>

    </footer>

    <!-- Scroll Top -->
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Preloader -->
    <div id="preloader"></div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Vendor JS Files -->
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>
    <script src="{{ asset('assets/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/imagesloaded/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>

    <!-- Main JS File -->
    <script src="{{ asset('assets/js/main.js') }}"></script>

</body>

</html>
