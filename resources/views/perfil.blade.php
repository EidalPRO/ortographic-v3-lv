<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Ortographic - Perfiles.</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link rel="shortcut icon" href="{{ asset('assets/img/logoOrtographic.webp') }}" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/quill/quill.snow.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/quill/quill.bubble.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/simple-datatables/style.css') }}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('assets/css/esta.css') }}" rel="stylesheet">

    <!-- Cropper.js CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.css" rel="stylesheet" />

    <!-- Cropper.js JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.js"></script>


    <!-- =======================================================
  * Template Name: NiceAdmin
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Updated: Apr 20 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center">

        <div class="d-flex align-items-center justify-content-between">
            <a href="/home" class="logo d-flex align-items-center">
                <img src="{{ asset('assets/img/logoOrtographic.webp') }}" alt="">
                <span class="d-none d-lg-block">ORTOGRAPHIC</span>
            </a>
        </div><!-- End Logo -->


        <nav class="header-nav ms-auto">
            <ul class="d-flex align-items-center">
                <li class="nav-item dropdown pe-3">

                    <a class="nav-link nav-profile d-flex align-items-center pe-0" data-bs-toggle="dropdown">
                        <img src="{{ asset($foto) }}" alt="Profile" class="rounded-circle">
                        <span class="d-none d-md-block dropdown-toggle ps-2">{{ $nombre }}</span>
                    </a><!-- End Profile Iamge Icon -->

                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                        <li class="dropdown-header">
                            <h6>{{ $nombre }}</h6>
                            <span>Usuario de Ortographic</span>
                        </li>
                    </ul><!-- End Profile Dropdown Items -->
                </li><!-- End Profile Nav -->

            </ul>
        </nav><!-- End Icons Navigation -->

    </header><!-- End Header -->

    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Mi Perfil</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/home">Inicio</a></li>
                    <li class="breadcrumb-item">Usuarios</li>
                    <li class="breadcrumb-item active">Mi perfil</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section profile">
            <div class="row">
                <div class="col-xl-4">

                    <div class="card">
                        <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

                            <img src="{{ asset($foto) }}" alt="Profile" class="img-fluid rounded-circle">
                            <h2>{{ $nombre }}</h2>
                            <h3>{{ $descripcion }}</h3>
                            {{-- <div class="social-links mt-2">
                                <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                                <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                                <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                                <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
                            </div> --}}
                        </div>
                    </div>

                </div>

                <div class="col-xl-8">

                    <div class="card">
                        <div class="card-body pt-2">
                            <!-- Bordered Tabs -->
                            <ul class="nav nav-tabs nav-tabs-bordered">

                                <li class="nav-item">
                                    <button class="nav-link active" data-bs-toggle="tab"
                                        data-bs-target="#profile-overview">Sobre mí</button>
                                </li>

                                <li class="nav-item">
                                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Editar
                                        perfil</button>
                                </li>

                                <li class="nav-item">
                                    <button class="nav-link" data-bs-toggle="tab"
                                        data-bs-target="#profile-change-password">Cambiar contraseña</button>
                                </li>

                            </ul>
                            <div class="tab-content pt-2">
                                <div class="tab-pane fade show active profile-overview" id="profile-overview">
                                    {{-- <h5 class="card-title">Detalles</h5> --}}
                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label ">Nombre de usuario</div>
                                        <div class="col-lg-9 col-md-8">{{ $nombre }}</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label ">Descirpción</div>
                                        <div class="col-lg-9 col-md-8">{{ $descripcion }}</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Correo electronico</div>
                                        <div class="col-lg-9 col-md-8">{{ $email }}</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Fecha de creación de la cuenta</div>
                                        <div class="col-lg-9 col-md-8">{{ $creado_el }}</div>
                                    </div>
                                </div>
                                <div class="tab-pane fade profile-edit pt-3" id="profile-edit">
                                    <!-- Profile Edit Form -->
                                    <form id="profileForm" action="{{ route('perfil.actualizar') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')

                                        <div class="row mb-3">
                                            <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Foto de
                                                perfil</label>
                                            <div class="col-md-8 col-lg-9">
                                                <div class="pt-2">
                                                    <!-- Input para subir la imagen -->
                                                    <input type="file" id="inputImage"
                                                        class="form-control @error('foto') is-invalid @enderror"
                                                        accept="image/*">
                                                    @error('foto')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror

                                                    <!-- Contenedor para la vista previa de la imagen -->
                                                    <div id="imageContainer" style="display: none;">
                                                        <img id="image" style="max-width: 100%;" />
                                                    </div>

                                                    <!-- Campo oculto para la imagen recortada -->
                                                    <input type="hidden" name="foto" id="croppedImage"
                                                        value="">

                                                    <!-- Botón para recortar la imagen -->
                                                    <button type="button" id="cropButton" class="btn btn-primary"
                                                        style="display: none;">Aceptar</button>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="descripcion"
                                                class="col-md-4 col-lg-3 col-form-label">Descripción</label>
                                            <div class="col-md-8 col-lg-9">
                                                <textarea name="descripcion" class="form-control @error('descripcion') is-invalid @enderror" id="descripcion"
                                                    style="height: 100px">{{ old('descripcion', $descripcion) }}</textarea>
                                                @error('descripcion')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary" id="guardarCambiosBtn"
                                                style="display: none">Guardar cambios</button>
                                        </div>
                                    </form>
                                    <!-- End Profile Edit Form -->

                                </div>

                                <div class="tab-pane fade pt-3" id="profile-change-password">
                                    <!-- Change Password Form -->
                                    <form>

                                        <div class="row mb-3">
                                            <label for="currentPassword"
                                                class="col-md-4 col-lg-3 col-form-label">Contraseña actual</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="password" type="password" class="form-control"
                                                    id="currentPassword">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">Nueva
                                                contraseña</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="newpassword" type="password" class="form-control"
                                                    id="newPassword">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="renewPassword"
                                                class="col-md-4 col-lg-3 col-form-label">Confirmar contraseña</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="renewpassword" type="password" class="form-control"
                                                    id="renewPassword">
                                            </div>
                                        </div>

                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary">Guardar cambios</button>
                                        </div>
                                    </form><!-- End Change Password Form -->

                                </div>

                            </div><!-- End Bordered Tabs -->

                        </div>
                    </div>

                </div>
            </div>
        </section>

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">
        <div class="copyright">
            &copy; Copyright <strong><span>NiceAdmin</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
            <!-- All the links in the footer should remain intact. -->
            <!-- You can delete the links only if you purchased the pro version. -->
            <!-- Licensing information: https://bootstrapmade.com/license/ -->
            <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
            Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
        </div>
    </footer><!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="{{ asset('assets/vendor/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/chart.js/chart.umd.js') }}"></script>
    <script src="{{ asset('assets/vendor/echarts/echarts.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/quill/quill.js') }}"></script>
    <script src="{{ asset('assets/vendor/simple-datatables/simple-datatables.js') }}"></script>
    <script src="{{ asset('assets/vendor/tinymce/tinymce.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('assets/js/esta.js') }}"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            let cropper;
            const inputImage = document.getElementById('inputImage');
            const imageContainer = document.getElementById('imageContainer');
            const imageElement = document.getElementById('image');
            const cropButton = document.getElementById('cropButton');
            const guardarCambiosBtn = document.getElementById('guardarCambiosBtn');
            const descripcionText = document.getElementById('descripcion');

            // Verifica si el meta tag existe
            const csrfTokenMeta = document.querySelector('meta[name="csrf-token"]');
            if (!csrfTokenMeta) {
                console.error('CSRF token meta tag not found');
                return;
            }
            const csrfToken = csrfTokenMeta.getAttribute('content');

            inputImage.addEventListener('change', function(event) {
                const file = event.target.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        imageElement.src = e.target.result;
                        imageContainer.style.display = 'block';
                        cropButton.style.display = 'inline';

                        if (cropper) {
                            cropper.destroy();
                        }

                        cropper = new Cropper(imageElement, {
                            aspectRatio: 1,
                            viewMode: 1,
                            ready: function() {
                                cropButton.addEventListener('click', function() {
                                    const canvas = cropper.getCroppedCanvas({
                                        width: 250,
                                        height: 250
                                    });

                                    canvas.toBlob(function(blob) {
                                        const formData = new FormData();
                                        formData.append('foto', blob,
                                            'cropped-image.webp');
                                        formData.append('descripcion',
                                            document.getElementById(
                                                'descripcion').value);
                                        formData.append('_token',
                                            csrfToken);
                                        formData.append('_method',
                                            'PUT'); // Añadir el método PUT

                                        fetch('{{ route('perfil.actualizar') }}', {
                                            method: 'POST', // Cambia a POST para que funcione con el método PUT en el servidor
                                            body: formData
                                        }).then(response => response
                                            .json()).then(data => {
                                            if (data.success) {
                                                window.location
                                                    .href =
                                                    '{{ route('miPerfil') }}';
                                            } else {
                                                window.location
                                                    .href =
                                                    '{{ route('miPerfil') }}';
                                            }
                                        }).catch(error => {
                                            window.location
                                                .href =
                                                '{{ route('miPerfil') }}';
                                        });
                                    }, 'image/webp');
                                });
                            }
                        });
                    };
                    reader.readAsDataURL(file);
                }
            });

            descripcionText.addEventListener('click', function(event) {
                guardarCambiosBtn.style.display = 'inline';
            });
        });
    </script>
</body>

</html>
