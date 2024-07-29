<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{ asset('assets/img/logoOrtographic.webp') }}" rel="icon">


    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('assets/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    <link rel="shortcut icon" href="{{ asset('assets/img/logoOrtographic.webp') }}" type="image/x-icon">
    <title>Ortographic - Donde las letras se vuelven tu juego.</title>


</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top d-flex align-items-center">
        <div class="container d-flex align-items-center">

            <div class="logo me-auto">
                <h1><a>ORTOGRAPHIC</a></h1>
                <!-- Uncomment below if you prefer to use an image logo -->
                <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
            </div>

            <nav id="navbar" class="navbar order-last order-lg-0">
                <ul>
                    <li><a class="nav-link scrollto" style="color: white; font-size: 20px;" id="salir"
                            href>Salir</a></li>

                    <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

        </div>
    </header><!-- End Header -->

    <!-- ======= Hero Section ======= -->
    <section id="hero" class="services ">

        <div class="container">

            <div class="section-title" data-aos="fade-up">
                <div class="container progreso mb-3 mb-md-5" data-aos="fade-up">
                    <div class="progress" role="progressbar" aria-label="Animated striped example" aria-valuenow="75"
                        aria-valuemin="0" aria-valuemax="100">
                        <div class="progress-bar progress-bar-striped progress-bar-animated bg-info" style="width: 1%">
                        </div>
                    </div>
                </div>
                <h5 id="contador"> </h5>
                <h2 id="mostrar-reactivo"></h2>

            </div>

            <div class="row mt-md-5">
                <div class="col-2"></div>
                <div class="col-12 col-md-12 col-lg-3 centrado mb-2 mb-lg-0" data-aos="zoom-in">
                    <div class="icon-box icon-box-pink" id="card1">
                        <div class="icon"><i class="bi bi-dice-1"></i></div>
                        <h4 class="title"><a id="op1"></a></h4>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3 centrado mb-2 mb-lg-0" data-aos="zoom-in" data-aos-delay="100">
                    <div class="icon-box icon-box-cyan" id="card2">
                        <div class="icon"><i class="bi bi-dice-2"></i></div>
                        <h4 class="title"><a id="op2"></a></h4>
                    </div>
                </div>


                <div class="col-md-6 col-lg-3 centrado mb-2 mb-lg-0" data-aos="zoom-in" data-aos-delay="300">
                    <div class="icon-box icon-box-blue" id="card3">
                        <div class="icon"><i class="bi bi-dice-3"></i></div>
                        <h4 class="title"><a id="op3"></a></h4>
                    </div>
                </div>
                <div class="col-1"></div>


            </div>

        </div>

    </section><!-- End Hero -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <script>
        // Convertir los datos de PHP a formato JSON y almacenarlos en una variable global
        document.addEventListener('DOMContentLoaded', function() {
            var token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            document.getElementById("salir").addEventListener('click', function(event) {
                event.preventDefault();

                const swalWithBootstrapButtons = Swal.mixin({
                    customClass: {
                        confirmButton: "btn btn-success",
                        cancelButton: "btn btn-danger"
                    },
                    buttonsStyling: false
                });
                swalWithBootstrapButtons.fire({
                    title: "¿Esta segur@ que desea salir?",
                    text: "Ten en cuenta que se perdera todo tu progreso!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonText: "Si, estoy segur@!",
                    cancelButtonText: "No, cancelar!",

                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = `/salas/privada/redirect/${salaId}`;
                    }
                });

            });


            const op1 = document.getElementById("op1");
            const op2 = document.getElementById("op2");
            const op3 = document.getElementById("op3");
            const c1 = document.getElementById("card1");
            const c2 = document.getElementById("card2");
            const c3 = document.getElementById("card3");
            const mostrarReactivo = document.getElementById("mostrar-reactivo");
            const contador = document.getElementById("contador");
            var preg;
            var res;
            var d1;
            var d2;
            var fed;
            var ora;
            var posCorrect;
            var id;
            var acerto = 0;
            let preguntasRespondidas = 1;
            var porcentajeEfectividad;
            var porcentajeNivel;
            var tiempoTotal;
            let preguntasMostradas = [];
            let reactivos = [];
            let numerosGenerados = [];
            var tema;
            var temaPorsentaje;
            var miDificultad;
            var fallo = 0;
            var salaId = @json($sala_id);


            // Función para obtener los datos de la tabla desde PHP
            function obtenerDatos() {
                reactivos = @json($reactivos);
                tema = @json($tema);
                miDificultad = @json($dificultad);
                console.log(salaId)
                iniciarJuego();
            }
            window.onload = obtenerDatos();

            function iniciarJuego() {
                tiempoInicio = performance.now();
                cargarReactivo();
            }

            function generarNumeroUnico(min, max) {
                let nuevoNumero;
                do {
                    nuevoNumero = Math.floor(Math.random() * (max - min + 1)) + min;
                } while (numerosGenerados.includes(nuevoNumero));
                numerosGenerados.push(nuevoNumero);
                return nuevoNumero;
            }

            function cargarReactivo() {
                if (verificarFinJuego()) {
                    // progressBar.style.width = 100 + '%';
                    porcentajeEfectividad = (acerto * 100) / reactivos.length;
                    porcentajeEfectividad = Number(porcentajeEfectividad.toFixed(2));
                    // progressBar.setAttribute('aria-valuenow', porcentaje);

                    finalizarJuego();

                    subirDatosUno(tiempoTotal, porcentajeEfectividad, miDificultad, tema, acerto, fallo, salaId);
                } else {


                    do {
                        id = generarNumeroUnico(0, reactivos.length - 1);
                    } while (preguntasMostradas.includes(id));

                    preguntasMostradas.push(id);

                    var n = Math.floor(Math.random() * 3);
                    posCorrect = (n == 1) ? 'I' : (n == 2) ? 'M' : 'D';

                    preg = reactivos[id].pregunta;
                    res = reactivos[id].respuesta;
                    d1 = reactivos[id].distractor_1;
                    d2 = reactivos[id].distractor_2;
                    fed = reactivos[id].feedback;
                    ora = reactivos[id].oracionCorrecta;

                    contador.innerText = preguntasMostradas.length + "/" + reactivos.length;
                    mostrarReactivo.innerText = preg;
                    if (posCorrect == 'I') {
                        op1.innerText = res;
                        if (Math.floor(Math.random() * 2) == 1) {
                            op2.innerText = d1;
                            op3.innerText = d2;
                        } else {
                            op2.innerText = d2;
                            op3.innerText = d1;
                        }
                    } else if (posCorrect == 'M') {
                        op2.innerText = res;
                        if (Math.floor(Math.random() * 2) == 1) {
                            op1.innerText = d1;
                            op3.innerText = d2;
                        } else {
                            op1.innerText = d2;
                            op3.innerText = d1;
                        }
                    } else {
                        op3.innerText = res;
                        if (Math.floor(Math.random() * 2) == 1) {
                            op1.innerText = d1;
                            op2.innerText = d2;
                        } else {
                            op1.innerText = d2;
                            op2.innerText = d1;
                        }
                    }

                }
            }

            c1.addEventListener("click", ganoI);

            function ganoI() {
                if (posCorrect == 'I') {
                    mostrarRespuestaCorrecta();
                } else {
                    mostrarRespuestaIncorrecta();
                }
            }
            c2.addEventListener("click", ganoM);

            function ganoM() {
                if (posCorrect == 'M') {
                    mostrarRespuestaCorrecta();
                } else {
                    mostrarRespuestaIncorrecta();
                }
            }
            c3.addEventListener("click", verificarGano);

            function verificarGano() {
                if (posCorrect == 'D') {
                    mostrarRespuestaCorrecta();
                } else {
                    mostrarRespuestaIncorrecta();
                }
            }

            function mostrarRespuestaCorrecta() {
                acerto++;
                Swal.fire({
                    icon: 'success',
                    title: 'Respuesta correcta. ',
                    html: `<p class="text-center">${ora}</p>` + '<br>' +
                        `<p class="modal-justificado">${fed}</p>`,
                    confirmButtonText: 'Continuar',
                    padding: '1rem',
                    allowOutsideClick: false,
                    allowEscapeKey: false,
                    showConfirmButton: true,
                }).then((result) => {
                    if (result.isConfirmed) {
                        cargarReactivo();
                        avanzarBarraProgreso();
                    }
                });
            }

            // Función para mostrar SweetAlert de respuesta incorrecta
            function mostrarRespuestaIncorrecta() {
                fallo++;
                Swal.fire({
                    icon: 'error',
                    title: 'Respuesta incorrecta. ',
                    html: `<p class="text-center">${ora}</p>` + '<br>' +
                        `<p class="modal-justificado">${fed}</p>`,
                    confirmButtonText: 'Continuar',
                    padding: '1rem',
                    confirmButtonText: "Continuar",
                    allowOutsideClick: false,
                    allowEscapeKey: false,
                    showConfirmButton: true,
                }).then((result) => {
                    if (result.isConfirmed) {
                        cargarReactivo();
                        avanzarBarraProgreso();
                    }
                });
            }

            function avanzarBarraProgreso() {
                preguntasRespondidas++;
                const porcentaje = (preguntasRespondidas / reactivos.length) * 100;
                const progressBar = document.querySelector('.progress-bar');
                progressBar.style.width = (porcentaje) + '%';
                progressBar.setAttribute('aria-valuenow', porcentaje);
            }

            function verificarFinJuego() {
                return (preguntasMostradas.length === reactivos.length) ? true : false;
            }

            function finalizarJuego() {
                tiempoFinal = performance.now(); // Guarda el tiempo de finalización

                tiempoTotal = (tiempoFinal - tiempoInicio) / 1000; // Calcula la diferencia de tiempo
                // Convierte a segundos: tiempoTotal / 1000
                // Limita el tiempo total a dos decimales y muestra solo las cuatro cifras significativas
                tiempoTotal = Number(tiempoTotal.toFixed(2));
            }

            function subirDatosUno(tiempoTotal, porcentajeEfectividad, miDificultad, tema, acerto, fallo, salaId) {
                var estadisticasGuardarUrl = "{{ route('estadisticas.guardarPriv') }}";

                let timerInterval;
                Swal.fire({
                    title: "Espere un momento!",
                    html: "Tus estadisticas se estan actualizando, espere un momento <br><b></b>.",
                    timer: 2000,
                    allowOutsideClick: false,
                    allowEscapeKey: false,
                    timerProgressBar: true,
                    didOpen: () => {
                        Swal.showLoading();
                        const timer = Swal.getPopup().querySelector("b");
                        timerInterval = setInterval(() => {
                            timer.textContent = `${Swal.getTimerLeft()}`;
                        }, 100);
                    },
                    willClose: () => {
                        clearInterval(timerInterval);
                    }
                }).then((result) => {
                    /* Read more about handling dismissals below */
                    if (result.dismiss === Swal.DismissReason.timer) {
                        console.log("I was closed by the timer");
                    }
                });

                fetch(estadisticasGuardarUrl, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': token
                        },
                        body: JSON.stringify({
                            tiempo_usado: tiempoTotal,
                            porcentaje_efectividad: porcentajeEfectividad,
                            dificultad: miDificultad,
                            tema: tema,
                            reactivos_acertados: acerto,
                            reactivos_fallados: fallo,
                            sala_id: salaId
                        })
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            Swal.fire({
                                icon: "success",
                                title: 'Preguntas completadas',
                                confirmButtonText: "De acuerdo",
                                text: `Este fue tu porcentaje de efectividad en la dificultad ${miDificultad}: ${porcentajeEfectividad}% \nTu tiempo total en responder las preguntas fue de ${tiempoTotal} segundos.`
                            }).then(() => {
                                // Ejemplo de uso
                                // window.location.href = `categoria.php?ronda=terminada&logro=${temaPorsentaje}`;
                                window.location.href = `/salas/privada/redirect/${salaId}`;
                            });
                        } else {
                            console.log('Error al guardar las estadísticas');
                        }
                    })
                    .catch(error => {
                        console.log('Error:', error);
                    });
            }
        });
    </script>

    <!-- Vendor JS Files -->
    <script src="{{ asset('assets/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>

    <!-- Template Main JS File -->


    {{-- <script src="{{ asset('assets/js/jugar.js') }}"></script> --}}
    <script src="{{ asset('assets/js/jugar2.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</body>

</html>
