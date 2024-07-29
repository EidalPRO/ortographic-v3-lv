@extends('layouts.sala')

@section('lista')
    {{-- <li><a href="" id="btn-admin" data-bs-toggle="modal" data-bs-target="#exampleModal2"></a>
    </li> --}}
    <li><a href="{{ route('estadisticas.global') }}"> Estadisticas </a></li>
    <li><a href="" class="active" id="sala">Sala: ORT001</a></li>
    <li><a id="admin" style="color: #ffffff8d">Sala Global</a></li>
@endsection
@section('hero')
    <div class="icon-boxes position-relative">
        <div class="container position-relative">
            <div class="row gy-4 mt-5">

                <div class="col-xl-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="icon-box">
                        <div class="icon"><i class="bi bi-behance"></i></div>
                        <h4 class="title"><a class="stretched-link" id="t1">Acentuación.</a></h4>
                    </div>
                </div><!--End Icon Box -->

                <div class="col-xl-3 col-md-6" data-aos="fade-up" data-aos-delay="200">
                    <div class="icon-box">
                        <div class="icon"><i class="bi bi-alphabet-uppercase"></i></div>
                        <h4 class="title"><a class="stretched-link" id="t2">Uso de letras.</a></h4>
                    </div>
                </div><!--End Icon Box -->

                <div class="col-xl-3 col-md-6" data-aos="fade-up" data-aos-delay="300">
                    <div class="icon-box">
                        <div class="icon"><i class="bi bi-backpack3"></i></div>
                        <h4 class="title"><a class="stretched-link" id="t3">Concordancia.</a></h4>
                    </div>
                </div><!--End Icon Box -->

                <div class="col-xl-3 col-md-6" data-aos="fade-up" data-aos-delay="500">
                    <div class="icon-box">
                        <div class="icon"><i class="bi bi-command"></i></div>
                        <h4 class="title"><a class="stretched-link" id="t4">Gramatica en general.</a>
                        </h4>
                    </div>
                </div><!--End Icon Box -->

            </div>
        </div>
    </div>
@endsection
@section('content')
    <!-- ======= Frequently Asked Questions Section ======= -->
    <section id="faq" class="faq">
        <div class="container" data-aos="fade-up">

            <div class="row gy-4">

                <div class="col-lg-4">
                    <div class="content px-xl-5">
                        <h3>¿Como funciona cada<strong> tema</strong>?</h3>
                        <p>
                            Todos los temas están compuestos por una serie de preguntas, cada una con 3 posibles
                            respuestas y una retroalimentación sobre la pregunta. En la dificultad fácil, cada tema
                            consta de 10 preguntas. En la dificultad media, cada tema presenta 15 preguntas. Para la
                            dificultad difícil, cada una contiene 25 preguntas, excepto el tema de Gramática
                            General, que tiene 27 preguntas.
                        </p>
                    </div>
                </div>

                <div class="col-lg-8">

                    <div class="accordion accordion-flush" id="faqlist" data-aos="fade-up" data-aos-delay="100">

                        <div class="accordion-item">
                            <h3 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#faq-content-1">
                                    <span class="num">1.</span>
                                    Acentuación.
                                </button>
                            </h3>
                            <div id="faq-content-1" class="accordion-collapse collapse" data-bs-parent="#faqlist">
                                <div class="accordion-body">
                                    Uso de tildes para palabras agudas, graves y esdrújulas según
                                    las normativas específicas del idioma.
                                </div>
                            </div>
                        </div><!-- # Faq item-->

                        <div class="accordion-item">
                            <h3 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#faq-content-2">
                                    <span class="num">2.</span>
                                    Uso de letras.
                                </button>
                            </h3>
                            <div id="faq-content-2" class="accordion-collapse collapse" data-bs-parent="#faqlist">
                                <div class="accordion-body">
                                    Normas para el uso adecuado de las letras, como la grafía
                                    correcta de las palabras, uso de mayúsculas y minúsculas, etc.
                                </div>
                            </div>
                        </div><!-- # Faq item-->

                        <div class="accordion-item">
                            <h3 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#faq-content-3">
                                    <span class="num">3.</span>
                                    Concordancia.
                                </button>
                            </h3>
                            <div id="faq-content-3" class="accordion-collapse collapse" data-bs-parent="#faqlist">
                                <div class="accordion-body">
                                    Se trata de los errores de concordancia entre sustantivos y adjetivos, sujetos y
                                    predicados, así como entre género y número.
                                </div>
                            </div>
                        </div><!-- # Faq item-->

                        <div class="accordion-item">
                            <h3 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#faq-content-4">
                                    <span class="num">4.</span>
                                    Gramatica en general.
                                </button>
                            </h3>
                            <div id="faq-content-4" class="accordion-collapse collapse" data-bs-parent="#faqlist">
                                <div class="accordion-body">
                                    El uso de palabras inexistentes o mal escritas puede
                                    clasificarse como errores ortográficos o gramaticales dependiendo del contexto
                                    específico en el que se cometan.
                                </div>
                            </div>
                        </div><!-- # Faq item-->

                    </div>

                </div>
            </div>

        </div>
    </section><!-- End Frequently Asked Questions Section -->

    <section class="modales">
        <!-- Modal -->
        <div class="modal fade salasModal" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
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
                        <h4 class="modal-title fs-5" id="exampleModalLabel">Acerca de</h4>
                        <p>
                            Para comenzar a jugar, selecciona uno de los cuatro temas disponibles para practicar.
                            Luego, elige la dificultad con la que deseas enfrentarte. <br>
                            El porcentaje de efectividad se calculará en función de las respuestas correctas que des
                            en cada tema y en cada una de sus tres diferentes dificultades. Al completar los tres
                            niveles (fácil, medio y difícil) de un tema, el porcentaje de efectividad de ese tema
                            será del 100%.
                            <br><br>
                            En salas privadas, las estadísticas se sumarán dependiendo del número de dificultades
                            que haya en la sala.<br><br>

                            Nota: El sistema de logros solo está disponible para la sala global.
                            <br><br>
                            ¡Diviértete aprendiendo!
                        </p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-dark" data-bs-dismiss="modal">
                            <span class="circle1"></span>
                            <span class="circle2"></span>
                            <span class="circle3"></span>
                            <span class="circle4"></span>
                            <span class="circle5"></span>
                            <span class="text">Cerrar</span>
                        </button>
                        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade salasModal" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
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
                        <h4 class="modal-title fs-5" id="exampleModalLabel">Administrar sala.</h4>

                        <div class="accordion" id="accordionExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <a class="accordion-button" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        Usuarios
                                    </a>
                                </h2>
                                <div id="collapseOne" class="accordion-collapse collapse show"
                                    data-bs-parent="#accordionExample">
                                    <div class="accordion-body">

                                    </div>
                                </div>
                            </div>
                            <!-- <div class="accordion-item">
                                                                <h2 class="accordion-header">
                                                                    <a class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                                        Accordion Item #2
                                                                    </a>
                                                                </h2>
                                                                <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                                                    <div class="accordion-body">
                                                                        <strong>This is the second item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="accordion-item">
                                                                <h2 class="accordion-header">
                                                                    <a class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                                        Accordion Item #3
                                                                    </a>
                                                                </h2>
                                                                <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                                                    <div class="accordion-body">
                                                                        <strong>This is the third item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                                                                    </div>
                                                                </div>
                                                            </div> -->
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-dark" data-bs-dismiss="modal">
                            <span class="circle1"></span>
                            <span class="circle2"></span>
                            <span class="circle3"></span>
                            <span class="circle4"></span>
                            <span class="circle5"></span>
                            <span class="text">Cerrar</span>
                        </button>
                        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="{{ asset('assets/js/salaGlobal.js') }}"></script>
    <!-- Asegúrate de incluir jQuery en tu página si aún no está incluido -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endsection
