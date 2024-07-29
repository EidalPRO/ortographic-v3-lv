<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

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
        href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Jost:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

    <!-- Main CSS File -->
    <link href="{{ asset('assets/css/home.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/miPerfil.css">
    <link rel="stylesheet" href="assets/css/modal.css">
    <link rel="shortcut icon" href="assets/img/logoOrtographic.webp" type="image/x-icon">
    <!-- Cropper.js CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.css" rel="stylesheet" />

    <!-- Cropper.js JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.js"></script>


    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body class="index-page">

    <header id="header" class="header d-flex align-items-center fixed-top">
        <div class="container-fluid container-xl position-relative d-flex align-items-center">

            <a href="" class="logo d-flex align-items-center me-auto">
                <!-- Uncomment the line below if you also wish to use an image logo -->
                <!-- <img src="assets/img/logo.png" alt=""> -->
                <h1 class="sitename">Ortographic</h1>
            </a>

            <nav id="navmenu" class="navmenu">
                <ul>
                    <li><a href="#" class="">Inicio</a></li>
                    <li><a href="#acerca">Acerca de</a></li>
                    <li><a href="#manual">Manuales</a></li>
                    <li><a href="#galeria">Galeria de imagenes</a></li>
                    <li><a href="#team">Equipo</a></li>
                    <li class="dropdown"><a href="{{ route('miPerfil') }}"><span>{{ Auth::user()->name }}</span> <i
                                class="bi bi-chevron-down toggle-dropdown"></i></a>
                        <ul>
                            <li>
                                <a href="{{ route('miPerfil') }}" style="color: black"> Mi Perfil</a>
                                <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"
                                    style="color: black">
                                    {{ __('Cerrar sesión') }}
                                </a>
                            </li>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </ul>
                    </li>
                    <li><a href="#creditos">Creditos</a></li>
                    {{-- @guest --}}
                    {{-- @endguest --}}
                </ul>
                <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
            </nav>
        </div>
    </header>

    <main class="main">

        <!-- Hero Section -->
        <section id="hero" class="hero section dark-background">

            <div class="container">
                <div class="row gy-4">
                    <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center"
                        data-aos="zoom-out">
                        <h1 class="">Ortographic</h1>
                        <p class="">Donde las letras se vuelven tu juego.</p>
                        <div class="d-flex">
                            <a href="#practicar" class="btn-get-started">Empezar a practicar</a>
                        </div>
                    </div>
                    <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-out" data-aos-delay="200">
                        <img src="assets/img/hero-ort.webp" class="img-fluid animated" alt="Ortographic Lander">
                    </div>
                </div>
            </div>

        </section><!-- /Hero Section -->

        <!-- Clients Section -->
        <section id="clients" class="clients section light-background">

            <div class="container" data-aos="zoom-in">

                <div class="swiper init-swiper">
                    <script type="application/json" class="swiper-config">
            {
              "loop": true,
              "speed": 600,
              "autoplay": {
                "delay": 5000
              },
              "slidesPerView": "auto",
              "pagination": {
                "el": ".swiper-pagination",
                "type": "bullets",
                "clickable": true
              },
              "breakpoints": {
                "320": {
                  "slidesPerView": 2,
                  "spaceBetween": 40
                },
                "480": {
                  "slidesPerView": 3,
                  "spaceBetween": 60
                },
                "640": {
                  "slidesPerView": 4,
                  "spaceBetween": 80
                },
                "992": {
                  "slidesPerView": 5,
                  "spaceBetween": 120
                },
                "1200": {
                  "slidesPerView": 6,
                  "spaceBetween": 120
                }
              }
            }
          </script>
                    <div class="swiper-wrapper align-items-center">
                        <div class="swiper-slide"><img src="assets/img/clients/client-1.png" class="img-fluid"
                                alt=""></div>
                        <div class="swiper-slide"><img src="assets/img/clients/client-2.png" class="img-fluid"
                                alt=""></div>
                        <div class="swiper-slide"><img src="assets/img/clients/client-3.png" class="img-fluid"
                                alt=""></div>
                        <div class="swiper-slide"><img src="assets/img/clients/client-4.png" class="img-fluid"
                                alt=""></div>
                        <div class="swiper-slide"><img src="assets/img/clients/client-5.png" class="img-fluid"
                                alt=""></div>
                        <div class="swiper-slide"><img src="assets/img/clients/client-6.png" class="img-fluid"
                                alt=""></div>
                        <div class="swiper-slide"><img src="assets/img/clients/client-7.png" class="img-fluid"
                                alt=""></div>
                        <div class="swiper-slide"><img src="assets/img/clients/client-8.png" class="img-fluid"
                                alt=""></div>
                    </div>
                </div>

            </div>

        </section><!-- /Clients Section -->

        <!-- About Section -->
        <section id="acerca" class="about section">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2 class="">Acerca de Ortographic</h2>
            </div><!-- End Section Title -->

            <div class="container">

                <div class="row gy-4">

                    <div class="col-lg-6 content" data-aos="fade-up" data-aos-delay="100">
                        <p>
                            En la última actialización se agrego.
                        </p>
                        <ul>
                            <li><i class="bi bi-check2-circle"></i> <span>Mas de 150 reactivos para practicar.</span>
                            </li>
                            <li><i class="bi bi-check2-circle"></i> <span>Tres diferentes dificultades.</span></li>
                            <li><i class="bi bi-check2-circle"></i> <span>Sala global y salas privadas.</span></li>
                        </ul>
                    </div>

                    <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
                        <p>Ortographic es una plataforma diseñada para ayudarte a mejorar tu ortografía de una manera
                            divertida y
                            educativa. Nos comprometemos a ofrecerte una experiencia interactiva que haga que aprender
                            ortografía sea
                            más fácil y entretenido que nunca. </p>
                    </div>

                </div>

            </div>

        </section><!-- /About Section -->

        <!-- Pricing Section -->
        <section id="practicar" class="pricing section">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>Empieza a practicar</h2>
                <p>Únete a la diversión en nuestra sala global o crea tu propia sala privada para disfrutar con tus
                    amigos.</p>
            </div><!-- End Section Title -->

            <div class="container ">

                <div class="row gy-4">

                    <div class="col-lg-2"></div>
                    <div class="col-lg-4" data-aos="zoom-in" data-aos-delay="100">
                        <div class="pricing-item">
                            <h2>Sala global</h2>
                            <ul>
                                <li><i class="bi bi-check"></i> <span>Está disponible para todos los usuarios.</span>
                                </li>
                                <li><i class="bi bi-check"></i> <span>Interactúa y compite con jugadores de todo el
                                        mundo.</span></li>
                                <li><i class="bi bi-check"></i> <span>Encuentra una amplia gama de jugadores con
                                        diferente nivel.</span>
                                </li>
                                <li><i class="bi bi-check"></i> <span> Compite en clasificaciones globales para ver
                                        cómo te
                                        comparas con otros jugadores.</span></li>
                                <li><i class="bi bi-check"></i> <span>Sistema de logros disponibles.</span>
                            </ul>
                            <a class="buy-btn" id="boton_practicar" href="{{ route('sala.global') }}">Entrar</a>
                        </div>
                    </div><!-- End Pricing Item -->

                    <div class="col-lg-4" data-aos="zoom-in" data-aos-delay="100">
                        <div class="pricing-item">
                            <h2>Salas privadas</h2>
                            <ul>
                                <li><i class="bi bi-check"></i> <span>Requiere código de sala.</span></li>
                                <li><i class="bi bi-check"></i> <span>Crea un espacio exclusivo para ti y tus amigos,
                                        sin interferencias
                                        externas.</span></li>
                                <li><i class="bi bi-check"></i> <span>Controla quién puede unirse a tu sala mediante un
                                        código de acceso
                                        único.</span></li>
                                <li><i class="bi bi-check"></i> <span>Disfruta de un ambiente relajado y divertido para
                                        jugar y aprender
                                        con amigos cercanos.</span></li>
                                <li class="na"><i class="bi bi-x"></i> <span>Sistema de logros no
                                        disponible.</span>
                            </ul>
                            <a data-bs-toggle="modal" data-bs-target="#salasModal" id="boton_privado"
                                class="buy-btn" style="cursor: pointer">Entrar</a>
                        </div>
                    </div><!-- End Pricing Item -->
                    <div class="col-lg-2"></div>

                </div>

            </div>

        </section><!-- /Pricing Section -->

        <section id="manual" class="services section">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>Descarga nuestros manuales</h2>
                <p>Puedes dercargar cualquiera de nuestros dos manuales en cualquier momento.</p>
            </div><!-- End Section Title -->

            <div class="container">

                <div class="row gy-4">

                    <div class="col-xl-6 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="100">
                        <div class="service-item position-relative">
                            <div class="icon"> <i class="bi bi-journal-arrow-down"></i></div>
                            <h4><a class="stretched-link" id="m1"
                                    href="{{ asset('assets/pdf/manual_instalacion_ort.pdf') }}"
                                    target="_blank">Manual
                                    de
                                    instalación.</a></h4>
                            <p>Descarga nuestra guía de instalación para configurar rápidamente Ortographic en tu
                                dispositivo.</p>
                        </div>
                    </div><!-- End Service Item -->

                    <div class="col-xl-6 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="200">
                        <div class="service-item position-relative">
                            <div class="icon"> <i class="bi bi-journal-arrow-down"></i></div>
                            <h4><a class="stretched-link" id="m2"
                                    href="{{ asset('assets/pdf/Manual_usuario_ort.pdf') }}" target="_blank">Manual de
                                    usuario.</a></h4>
                            <p>Obtén consejos y trucos útiles en nuestra guía del usuario para aprovechar al máximo
                                Ortographic.</p>
                        </div>
                    </div><!-- End Service Item -->

                </div>

            </div>

        </section><!-- /Services Section -->

        <!-- Call To Action Section -->
        <section id="call-to-action" class="call-to-action section dark-background">

            <img src="assets/img/importancia.webp" alt="FOndo">

            <div class="container">

                <div class="row" data-aos="zoom-in" data-aos-delay="100">
                    <div class="col-xl-9 text-center text-xl-start">
                        <h3>Importancia de la buena ortografía.</h3>
                        <p style="text-align: justify">La ortografía correcta es una habilidad fundamental en la
                            comunicación escrita. No se trata
                            simplemente
                            de seguir reglas gramaticales, sino de transmitir tus ideas de manera clara y efectiva. Una
                            buena
                            ortografía no solo facilita la comprensión de tu mensaje, sino que también demuestra tu
                            atención al
                            detalle y tu respeto por el lector. En entornos profesionales, académicos y personales, la
                            ortografía
                            adecuada puede marcar la diferencia entre una comunicación exitosa y una que caiga en el
                            olvido. Es una
                            herramienta poderosa que puede aumentar tu credibilidad, mejorar tu imagen y abrir puertas
                            hacia nuevas
                            oportunidades. Por lo tanto, dedicar tiempo y esfuerzo a mejorar tus habilidades
                            ortográficas no solo es
                            una inversión en ti mismo, sino también en tu capacidad para comunicarte con eficacia en el
                            mundo que te
                            rodea.</p>
                    </div>
                </div>
            </div>

        </section><!-- /Call To Action Section -->


        <!-- Portfolio Section -->
        <section id="galeria" class="portfolio section">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>Galeria de imagenes</h2>
                <!-- <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p> -->
            </div><!-- End Section Title -->

            <div class="container">

                <div class="isotope-layout" data-default-filter="*" data-layout="masonry"
                    data-sort="original-order">

                    <div class="row gy-4 isotope-container" data-aos="fade-up" data-aos-delay="200">

                        <div class="col-12 text-center portfolio-item isotope-item filter-app">
                            <div class="spinner-grow text-warning" role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                            <h4>Sección en construcción.</h4>
                        </div>

                        <!-- <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-app">
              <img src="assets/img/masonry-portfolio/masonry-portfolio-1.jpg" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>App 1</h4>
                <p>Lorem ipsum, dolor sit</p>
                <a href="assets/img/masonry-portfolio/masonry-portfolio-1.jpg" title="App 1" data-gallery="portfolio-gallery-app" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
              </div>
            </div> -->
                        <!--
            <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-product">
              <img src="assets/img/masonry-portfolio/masonry-portfolio-2.jpg" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>Product 1</h4>
                <p>Lorem ipsum, dolor sit</p>
                <a href="assets/img/masonry-portfolio/masonry-portfolio-2.jpg" title="Product 1" data-gallery="portfolio-gallery-product" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
              </div>
            </div>

            <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-branding">
              <img src="assets/img/masonry-portfolio/masonry-portfolio-3.jpg" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>Branding 1</h4>
                <p>Lorem ipsum, dolor sit</p>
                <a href="assets/img/masonry-portfolio/masonry-portfolio-3.jpg" title="Branding 1" data-gallery="portfolio-gallery-branding" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
              </div>
            </div> -->



                    </div>

                </div><!-- End Portfolio Container -->

            </div>

            </div>

        </section><!-- /Portfolio Section -->


        <!-- Team Section -->
        <section id="team" class="team section">

            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>Equipo de trabajo</h2>
                <p>Este es nuetro gran equipo de trabajo.</p>
            </div><!-- End Section Title -->

            <div class="container">

                <div class="row gy-4">

                    <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                        <div class="team-member d-flex align-items-start">
                            <div class="pic"><img src="assets/img/team/eidal.webp" class="img-fluid"
                                    alt="Eidal"></div>
                            <div class="member-info">
                                <h4>Eidal Marquez Ambrosio</h4>
                                <span>Autor 1.</span>
                                <!-- <p>Explicabo voluptatem mollitia et repellat qui dolorum quasi</p> -->
                                <div class="social">
                                    <a href=""><i class="bi bi-facebook"></i></a>
                                    <a href=""><i class="bi bi-instagram"></i></a>
                                </div>
                            </div>
                        </div>
                    </div><!-- End Team Member -->

                    <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
                        <div class="team-member d-flex align-items-start">
                            <div class="pic"><img src="assets/img/team/maya.webp" class="img-fluid"
                                    alt="Maia"></div>
                            <div class="member-info">
                                <h4>Maia Michelle Morales Ramíres.</h4>
                                <span>Autor 2.</span>
                                <!-- <p>Aut maiores voluptates amet et quis praesentium qui senda para</p> -->
                                <div class="social">
                                    <a href=""><i class="bi bi-facebook"></i></a>
                                    <a href=""><i class="bi bi-instagram"></i></a>
                                </div>
                            </div>
                        </div>
                    </div><!-- End Team Member -->

                    <div class="col-lg-6" data-aos="fade-up" data-aos-delay="300">
                        <div class="team-member d-flex align-items-start">
                            <div class="pic"><img src="assets/img/team/team-3.jpg" class="img-fluid"
                                    alt=""></div>
                            <div class="member-info">
                                <h4>Roberto Ruiz Mendoza.</h4>
                                <span>Asesor técnico.</span>
                                <!-- <p>Quisquam facilis cum velit laborum corrupti fuga rerum quia</p> -->
                                <div class="social">
                                    <a href=""><i class="bi bi-facebook"></i></a>
                                    <a href=""><i class="bi bi-instagram"></i></a>
                                </div>
                            </div>
                        </div>
                    </div><!-- End Team Member -->

                    <div class="col-lg-6" data-aos="fade-up" data-aos-delay="400">
                        <div class="team-member d-flex align-items-start">
                            <div class="pic"><img src="assets/img/team/team-4.jpg" class="img-fluid"
                                    alt=""></div>
                            <div class="member-info">
                                <h4>Elva Yuridia Morales Luis.</h4>
                                <span>Asesor metodológico</span>
                                <!-- <p>Dolorum tempora officiis odit laborum officiis et et accusamus</p> -->
                                <div class="social">
                                    <a href=""><i class="bi bi-facebook"></i></a>
                                    <a href=""><i class="bi bi-instagram"></i></a>
                                </div>
                            </div>
                        </div>
                    </div><!-- End Team Member -->

                </div>

            </div>

        </section><!-- /Team Section -->

        <!-- Modal -->
        <div class="modal fade salasModal" id="salasModal" data-bs-backdrop="static" data-bs-keyboard="false"
            tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <div class="tools">
                            <div class="circle">
                                <span class="red box"></span>
                            </div>
                            <div class="circle">
                                <span class="yellow box"></span>
                            </div>
                            <div class="circle">
                                <span class="green box"></span>
                            </div>
                        </div>
                        <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
                    </div>
                    <div class="modal-body">
                        <div class="container">
                            <div class="row">
                                <h3 class="modal-title fs-5" id="staticBackdropLabel">Salas privadas</h3>
                                <h5 class="mb-3">Disfruta jugando en una sala privada con tus amigos, puedes crear
                                    una sala privada o unirte a una utilizando su id.</h5>
                                <br>
                                <div class="col-12 d-flex text-center salas-lista">
                                    <div id="listaSalas">
                                        <ul class="list-group" id="listaSalasPrivadas"></ul>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="cir d-flex flex-wrap align-items-center justify-content-center">
                                        <a type="button" data-bs-toggle="modal" data-bs-target="#salasModal2"
                                            id="ing" href="">
                                            <i class="bi bi-cloud-plus"></i>
                                        </a>
                                    </div>
                                    <p>Crear una sala</p>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="col-12 col-lg-6">
                                        <div class="cir d-flex flex-wrap align-items-center justify-content-center">
                                            <a type="button" data-bs-toggle="modal" data-bs-target="#salasModal3"
                                                id="exis" href="">
                                                <i class="bi bi-cloud-arrow-up"></i>
                                            </a>
                                        </div>
                                        <p>Agregar una sala existente</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Fin Modal de Salas Privadas -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                            <span class="circle1"></span>
                            <span class="circle2"></span>
                            <span class="circle3"></span>
                            <span class="circle4"></span>
                            <span class="circle5"></span>
                            <span class="text">Regresar</span>
                        </button>
                        <!-- <button type="button" class="btn btn-primary">Understood</button> -->
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade salasModal" id="salasModal2" data-bs-backdrop="static" data-bs-keyboard="false"
            tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <div class="tools">
                            <div class="circle">
                                <span class="red box"></span>
                            </div>
                            <div class="circle">
                                <span class="yellow box"></span>
                            </div>
                            <div class="circle">
                                <span class="green box"></span>
                            </div>
                        </div>
                        <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
                    </div>
                    <div class="modal-body">
                        <h3 class="modal-title fs-5" id="staticBackdropLabel">Sala nueva</h3>

                        <h4 class="mt-3" id="id-sala">Código de la nueva sala: </h4>
                        <span>El código se vuelve único en el momento de la creación de la sala.</span>

                        <form action="{{ route('salas.crear') }}" method="post" enctype="multipart/form-data"
                            class="mt-5" id="formulario">
                            @csrf
                            <div class="mb-3">
                                <label for="nombre_sala" class="form-label">Nombre de la sala:</label>
                                <input type="text" class="form-control" id="nombre_sala" name="nombre_sala"
                                    required>
                            </div>

                            <div class="mb-3">
                                <label>Selecciona las dificultades para esta sala (opcional):</label><br>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="facil"
                                        id="dificultad_facil" name="dificultades[]">
                                    <label class="form-check-label" for="dificultad_facil">
                                        Fácil
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="medio"
                                        id="dificultad_medio" name="dificultades[]">
                                    <label class="form-check-label" for="dificultad_medio">
                                        Medio
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="dificil"
                                        id="dificultad_dificil" name="dificultades[]">
                                    <label class="form-check-label" for="dificultad_dificil">
                                        Difícil
                                    </label>
                                </div>
                            </div>


                            <div class="mb-3">
                                <label>Selecciona los temas para esta sala (opcional):</label><br>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="acentuacion"
                                        id="tema_acentuacion" name="temas[]">
                                    <label class="form-check-label" for="tema_acentuacion">
                                        Acentuación
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="letras" id="tema_letras"
                                        name="temas[]">
                                    <label class="form-check-label" for="tema_letras">
                                        Uso de letras
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="concordancia"
                                        id="tema_concordancia" name="temas[]">
                                    <label class="form-check-label" for="tema_concordancia">
                                        Concordancia
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="gramaticaGeneral"
                                        id="tema_gramatica" name="temas[]">
                                    <label class="form-check-label" for="tema_gramatica">
                                        Gramática General
                                    </label>
                                </div>
                            </div>
                            @if ($errors->any())
                                <script>
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Error de validación',
                                        html: '@foreach ($errors->all() as $error){{ $error }}<br>@endforeach',
                                    });
                                </script>
                            @endif
                            <input type="hidden" name="accion" value="nuevo">
                            <input type="hidden" name="codigo" value="" id="codigo_sala">

                            <button class="btn btn-primary" id="btn_crear" type="submit">
                                <span class="circle1"></span>
                                <span class="circle2"></span>
                                <span class="circle3"></span>
                                <span class="circle4"></span>
                                <span class="circle5"></span>
                                <span class="text">Crear Sala</span>
                            </button>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-toggle="modal"
                            data-bs-target="#salasModal">
                            <span class="circle1"></span>
                            <span class="circle2"></span>
                            <span class="circle3"></span>
                            <span class="circle4"></span>
                            <span class="circle5"></span>
                            <span class="text">Cancelar</span>
                        </button>
                        <!-- <button type="button" class="btn btn-primary">Understood</button> -->
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade salasModal" id="salasModal3" data-bs-backdrop="static" data-bs-keyboard="false"
            tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <div class="tools">
                            <div class="circle">
                                <span class="red box"></span>
                            </div>
                            <div class="circle">
                                <span class="yellow box"></span>
                            </div>
                            <div class="circle">
                                <span class="green box"></span>
                            </div>
                        </div>
                        <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
                    </div>
                    <div class="modal-body">
                        <h3 class="modal-title fs-5" id="staticBackdropLabel">Sala existente</h3>
                        <h5>Ingresa el id de la sala</h5>
                        <form action="{{ route('salas.agregarUsuarioSala') }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <input type="text" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" name="sala">
                            </div>
                            @if ($errors->any())
                                <script>
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Error de validación',
                                        html: '@foreach ($errors->all() as $error){{ $error }}<br>@endforeach',
                                    });
                                </script>
                            @endif
                            <button type="submit" class="btn btn-primary">
                                <span class="circle1"></span>
                                <span class="circle2"></span>
                                <span class="circle3"></span>
                                <span class="circle4"></span>
                                <span class="circle5"></span>
                                <span class="text">Aceptar</span>
                            </button>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-toggle="modal"
                            data-bs-target="#salasModal">
                            <span class="circle1"></span>
                            <span class="circle2"></span>
                            <span class="circle3"></span>
                            <span class="circle4"></span>
                            <span class="circle5"></span>
                            <span class="text">Cancelar</span>
                        </button>
                        <!-- <button type="button" class="btn btn-primary">Understood</button> -->
                    </div>
                </div>
            </div>
        </div>
        <!-- fin salas modal  -->

    </main>


    <footer id="creditos" class="footer">

        <div class="container footer-top">
            <div class="row gy-4">
                <div class="col-lg-8 col-md-6 footer-about">
                    <a href="index.html" class="d-flex align-items-center">
                        <span class="sitename">Ortographic</span>
                    </a>
                    <div class="footer-contact pt-3">
                        <p>Proyecto presentado como prototipo didáctico para la DEGETI.</p>
                        <p>CBTis No 150.</p>
                        <p>Ocotlán de Morelos, Oaxaca, México.</p>
                    </div>
                </div>

                <div class="col-lg-4 col-md-3 footer-links">
                    <h4>Nuestras secciones</h4>
                    <ul>
                        <li><i class="bi bi-chevron-right"></i> <a href="#">Inicio</a></li>
                        <li><i class="bi bi-chevron-right"></i> <a href="#acerca">Acerca de</a></li>
                        <li><i class="bi bi-chevron-right"></i> <a href="#manual">Manuales</a></li>
                        <li><i class="bi bi-chevron-right"></i> <a href="#galeria">Galeria de imagenes</a></li>
                    </ul>
                </div>


                <!-- <div class="col-lg-4 col-md-12">
        <h4>Siguenos en nuestras redes sociales</h4>
        <p>Cras fermentum odio eu feugiat lide par naso tierra videa magna derita valies</p>
        <div class="social-links d-flex">
          <a href=""><i class="bi bi-twitter-x"></i></a>
          <a href=""><i class="bi bi-facebook"></i></a>
          <a href=""><i class="bi bi-instagram"></i></a>
          <a href=""><i class="bi bi-linkedin"></i></a>
        </div>
      </div> -->

            </div>
        </div>

        <div class="container copyright text-center mt-4">
            <p>© 2024 Copyright DGETI - CBTis No. 150.</p>
            <p>© <span>Copyright</span> <strong class="px-1 sitename">BootstrapMade</strong> <span>All Rights
                    Reserved</span>
            </p>
            <div class="credits">
                <!-- All the links in the footer should remain intact. -->
                <!-- You can delete the links only if you've purchased the pro version. -->
                <!-- Licensing information: https://bootstrapmade.com/license/ -->
                <!-- Purchase the pro version with working PHP/AJAX contact form: [buy-url] -->
                Diseñado por <a href="https://bootstrapmade.com/">BootstrapMade</a>
            </div>
        </div>

    </footer>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            fetchSalas();
        });

        function fetchSalas() {
            fetch('{{ route('salas.obtener') }}')
                .then(response => response.json())
                .then(salas => {
                    let listaSalas = document.getElementById('listaSalasPrivadas');
                    listaSalas.innerHTML = '';

                    if (salas.length > 0) {
                        salas.forEach(sala => {
                            let listItem = document.createElement('li');
                            listItem.classList.add('list-group-item', 'd-flex', 'justify-content-between',
                                'mb-2');

                            listItem.innerHTML = `
                                <div class="texto-salas">
                                    <strong>${sala.codigo_sala}</strong><br>
                                    ${sala.nombre}
                                </div>
                                <div>
                                    <a href="/salas/privada/redirect/${sala.id}" class="btn btn-success btn-sm">Entrar</a>
                                    <a class="btn btn-danger btn-sm" onclick="confirmarSalida('${sala.id}')">Salir</a>
                                </div>
                            `;
                            listaSalas.appendChild(listItem);
                        });
                    } else {
                        listaSalas.innerHTML =
                            '<li class="list-group-item">No se encontraron salas para este usuario.</li>';
                    }
                })
                .catch(error => console.error('Error al obtener las salas:', error));
        }

        function confirmarSalida(codigoSala) {
            Swal.fire({
                title: '¿Estás seguro?',
                text: '¿Estás seguro de que quieres salir de la sala, todos tus datos se eliminaran?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sí, salir'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Crear formulario dinámicamente
                    let form = document.createElement('form');
                    form.action = `/salas/salir/${codigoSala}`;
                    form.method = 'POST';
                    form.style.display = 'none';

                    // Agregar token CSRF
                    let csrfInput = document.createElement('input');
                    csrfInput.name = '_token';
                    csrfInput.value = '{{ csrf_token() }}';
                    csrfInput.type = 'hidden';
                    form.appendChild(csrfInput);

                    // Agregar formulario al cuerpo del documento y enviar
                    document.body.appendChild(form);
                    form.submit();
                }
            });
        }
    </script>

    <!-- Scroll Top -->
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Preloader -->
    <div id="preloader"></div>

    <!-- Vendor JS Files -->
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>
    <script src="{{ asset('assets/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/waypoints/noframework.waypoints.js') }}"></script>
    <script src="{{ asset('assets/vendor/imagesloaded/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>

    <!-- Main JS File -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('assets/js/home.js') }}"></script>

</body>

</html>



{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}
