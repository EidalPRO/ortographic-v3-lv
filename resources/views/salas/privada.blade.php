@extends('layouts.sala')

@section('lista')
    <li><a href="/sala/global/estadisticas-sala/{{ $sala_id }}">Estadísticas</a></li>
    <li><a class="active" id="sala">Sala: {{ $codigo_sala }}</a></li>
    <li><a id="admin" style="color: #ffffff8d">{{ $sala_nombre }}</a></li>
@endsection

@section('hero')
    <div class="icon-boxes position-relative">
        <div class="container position-relative">
            <div class="row gy-4 mt-5">
                @foreach ($temas as $index => $tema)
                    <div class="col-xl-3 col-md-6" data-aos="fade-up" data-aos-delay="{{ 100 * ($index + 1) }}">
                        <div class="icon-box">
                            <div class="icon"><i class="bi bi-book"></i></div>
                            <h4 class="title">
                                <a class="stretched-link" data-tema="{{ $tema }}"
                                    data-dificultades="{{ json_encode($dificultades) }}" data-sala-id="{{ $sala_id }}"
                                    data-codigo-sala="{{ $codigo_sala }}" onclick="mostrarDificultad(this)">
                                    {{ $tema }}
                                </a>
                            </h4>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection

@section('content')
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
                    </div>
                    <div class="modal-body">
                        <h4 class="modal-title fs-5" id="exampleModalLabel">Acerca de</h4>
                        <p>
                            Para comenzar a jugar, selecciona uno de los temas disponibles para practicar.
                            Luego, elige la dificultad con la que deseas enfrentarte (si la sala fue creada con una
                            dificultad, los redireccionara automaticamente al juego). <br>
                            El porcentaje de efectividad se calculará en función de las respuestas correctas que des en cada
                            tema y en cada una de sus tres diferentes dificultades. Al completar los tres niveles (fácil,
                            medio y difícil) de un tema, el porcentaje de efectividad de ese tema será del 100%.
                            <br><br>
                            En salas privadas, las estadísticas se sumarán dependiendo del número de dificultades que haya
                            en la sala.<br><br>
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
                                        <!-- Contenido del acordeón de usuarios -->
                                    </div>
                                </div>
                            </div>
                            <!-- Otros elementos del acordeón -->
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
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function mostrarDificultad(element) {
            const tema = element.dataset.tema;
            var tm;
            switch (tema) {
                case 'Uso de Letras':
                    tm = 'letras';
                    break;
                case 'Gramática General':
                    tm = 'gramaticaGeneral';
                    break;
                case 'Acentuación':
                    tm = 'acentuacion';
                    break;
                case 'Concordancia':
                    tm = 'concordancia';
                    break;
            }
            let dificultades = JSON.parse(element.dataset.dificultades);
            const codigoSala = element.dataset.codigoSala; // Obtener el código de la sala

            // Si el array de dificultades está vacío, asignar las tres dificultades predeterminadas
            if (dificultades.length === 0) {
                dificultades = ['facil', 'medio', 'dificil'];
            }

            // Si solo hay una dificultad, redirigir directamente
            if (dificultades.length === 1) {
                const url =
                    `/salas/privada/juego/sala-privada?tema=${tm}&dificultad=${dificultades[0]}&codigo_sala=${codigoSala}`;
                window.location.href = url;
                return;
            }

            // Crear opciones para el select en el SweetAlert
            const inputOptions = dificultades.reduce((options, dificultad) => {
                options[dificultad] = dificultad.charAt(0).toUpperCase() + dificultad.slice(1);
                return options;
            }, {});

            // Mostrar el SweetAlert
            Swal.fire({
                title: 'Selecciona la dificultad',
                input: 'select',
                inputOptions: inputOptions,
                inputPlaceholder: 'Selecciona una opción',
                showCancelButton: true,
                cancelButtonText: 'Cancelar',
                confirmButtonText: 'Aceptar',
                inputValidator: (value) => {
                    return new Promise((resolve) => {
                        if (value !== '') {
                            resolve();
                        } else {
                            resolve('Debes seleccionar una opción');
                        }
                    });
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    const url =
                        `/salas/privada/juego/sala-privada?tema=${tm}&dificultad=${result.value}&codigo_sala=${codigoSala}`;
                    window.location.href = url;
                }
            });
        }
    </script>

    <!-- Asegúrate de incluir jQuery en tu página si aún no está incluido -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
@endsection
