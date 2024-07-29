@extends('layouts.app')

@section('content')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-4 col-md-8 ">
                <form class="form" method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="flex-column">
                        <label>Correo electronico </label>
                    </div>
                    <div class="inputForm">
                        <svg height="20" viewBox="0 0 32 32" width="20" xmlns="http://www.w3.org/2000/svg">
                            <g id="Layer_3" data-name="Layer 3">
                                <path
                                    d="m30.853 13.87a15 15 0 0 0 -29.729 4.082 15.1 15.1 0 0 0 12.876 12.918 15.6 15.6 0 0 0 2.016.13 14.85 14.85 0 0 0 7.715-2.145 1 1 0 1 0 -1.031-1.711 13.007 13.007 0 1 1 5.458-6.529 2.149 2.149 0 0 1 -4.158-.759v-10.856a1 1 0 0 0 -2 0v1.726a8 8 0 1 0 .2 10.325 4.135 4.135 0 0 0 7.83.274 15.2 15.2 0 0 0 .823-7.455zm-14.853 8.13a6 6 0 1 1 6-6 6.006 6.006 0 0 1 -6 6z">
                                </path>
                            </g>
                        </svg>
                        <input id="email" type="email" class="input" name="email" value="{{ old('email') }}"
                            required autocomplete="email" autofocus placeholder="Ingresa tu correo electronico">

                        @error('email')
                            <script>
                                Swal.fire({
                                    title: "Error",
                                    text: "Usuario y/o contraseña incorrecta.",
                                    icon: "error"
                                });
                            </script>
                            {{-- <span class="invalid-feedback" role="alert">
                                <strong>Usuario y/o contraseña incorrecta</strong>
                            </span> --}}
                        @enderror

                        @if (session('error'))
                            <script>
                                Swal.fire({
                                    title: "Error",
                                    text: "{{ session('error') }}",
                                    icon: "error"
                                });
                            </script>
                        @endif
                    </div>

                    <div class="flex-column">
                        <label>Constraseña</label>
                    </div>
                    <div class="inputForm">
                        <svg height="20" viewBox="-64 0 512 512" width="20" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="m336 512h-288c-26.453125 0-48-21.523438-48-48v-224c0-26.476562 21.546875-48 48-48h288c26.453125 0 48 21.523438 48 48v224c0 26.476562-21.546875 48-48 48zm-288-288c-8.8125 0-16 7.167969-16 16v224c0 8.832031 7.1875 16 16 16h288c8.8125 0 16-7.167969 16-16v-224c0-8.832031-7.1875-16-16-16zm0 0">
                            </path>
                            <path
                                d="m304 224c-8.832031 0-16-7.167969-16-16v-80c0-52.929688-43.070312-96-96-96s-96 43.070312-96 96v80c0 8.832031-7.167969 16-16 16s-16-7.167969-16-16v-80c0-70.59375 57.40625-128 128-128s128 57.40625 128 128v80c0 8.832031-7.167969 16-16 16zm0 0">
                            </path>
                        </svg>
                        <input type="password" id="password"
                            class="input
                            @error('password') is-invalid @enderror"
                            name="password" required class="input" placeholder="Ingresa tu contraseña">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                    </div>

                    <div class="flex-row">
                        <div>
                            <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                {{ old('remember') ? 'checked' : '' }}>

                            <label class="form-check-label" for="remember">
                                {{ __('Recordar contraseña') }}
                            </label>
                        </div>

                        @if (Route::has('password.request'))
                            <a class="span" href="{{ route('password.request') }}">
                                {{ __('Olvidaste tu contraseña?') }}
                            </a>
                        @endif

                    </div>
                    <button class="button-submit">Iniciar sesión</button>
                    <p class="p">No tienes cuenta? <a href="{{ route('register') }}" class="span">Registrate aquí</a>
                    </p>
                    <p class="p line">O puedes usar</p>

                    <div class="flex-row">
                        <a class="btn google" href="{{route('authGoogle.redirect')}}">
                            <svg version="1.1" width="20" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                                xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512"
                                style="enable-background:new 0 0 512 512;" xml:space="preserve">
                                <path style="fill:#FBBB00;"
                                    d="M113.47,309.408L95.648,375.94l-65.139,1.378C11.042,341.211,0,299.9,0,256
                                                                                                                                                    c0-42.451,10.324-82.483,28.624-117.732h0.014l57.992,10.632l25.404,57.644c-5.317,15.501-8.215,32.141-8.215,49.456
                                                                                                                                                    C103.821,274.792,107.225,292.797,113.47,309.408z">
                                </path>
                                <path style="fill:#518EF8;"
                                    d="M507.527,208.176C510.467,223.662,512,239.655,512,256c0,18.328-1.927,36.206-5.598,53.451
                                                                                                                                                    c-12.462,58.683-45.025,109.925-90.134,146.187l-0.014-0.014l-73.044-3.727l-10.338-64.535
                                                                                                                                                    c29.932-17.554,53.324-45.025,65.646-77.911h-136.89V208.176h138.887L507.527,208.176L507.527,208.176z">
                                </path>
                                <path style="fill:#28B446;"
                                    d="M416.253,455.624l0.014,0.014C372.396,490.901,316.666,512,256,512
                                                                                                                                                    c-97.491,0-182.252-54.491-225.491-134.681l82.961-67.91c21.619,57.698,77.278,98.771,142.53,98.771
                                                                                                                                                    c28.047,0,54.323-7.582,76.87-20.818L416.253,455.624z">
                                </path>
                                <path style="fill:#F14336;"
                                    d="M419.404,58.936l-82.933,67.896c-23.335-14.586-50.919-23.012-80.471-23.012
                                                                                                                                                    c-66.729,0-123.429,42.957-143.965,102.724l-83.397-68.276h-0.014C71.23,56.123,157.06,0,256,0
                                                                                                                                                    C318.115,0,375.068,22.126,419.404,58.936z">
                                </path>

                            </svg>

                            Google

                        </a>
                        <a class="btn apple" href="{{ route('auth.redirect') }}" class="text-center">
                            <svg width="20" height="20" viewBox="0 0 48 48" fill="none" id="Layer_1"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M48 24C48 10.7438 37.2562 0 24 0C10.7438 0 0 10.7438 0 24C0 35.9813 8.775 45.9094 20.25 47.7094V30.9375H14.1562V24H20.25V18.7125C20.25 12.6984 23.8313 9.375 29.3156 9.375C31.9406 9.375 34.6875 9.84375 34.6875 9.84375V15.75H31.6594C28.6781 15.75 27.75 17.6016 27.75 19.5V24H34.4062L33.3422 30.9375H27.75V47.7094C39.225 45.9094 48 35.9813 48 24Z"
                                    fill="#1877F2" />
                                <path
                                    d="M33.3422 30.9375L34.4062 24H27.75V19.5C27.75 17.6016 28.6781 15.75 31.6594 15.75H34.6875V9.84375C34.6875 9.84375 31.9406 9.375 29.3156 9.375C23.8313 9.375 20.25 12.6984 20.25 18.7125V24H14.1562V30.9375H20.25V47.7094C21.4734 47.9016 22.725 48 24 48C25.275 48 26.5266 47.9016 27.75 47.7094V30.9375H33.3422Z"
                                    fill="white" />
                            </svg>


                            Facebook

                        </a>
                    </div>
                </form>
                {{-- <div class="card">
                    <div class="card-header">{{ __('Iniciar sesión') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="row mb-3">
                                <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>Usuario y/o contraseña incorrecta</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Contraseña') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required>

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                            {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Login') }}
                                    </button>

                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('Olvidaste tu contraseña?') }}
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </form>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
@endsection
