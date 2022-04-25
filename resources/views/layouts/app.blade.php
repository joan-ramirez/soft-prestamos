<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>


    <!--Fontawesome-->
    <script src="https://kit.fontawesome.com/19a1f7c413.js" crossorigin="anonymous"></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>

    <div class="contenedor">
        <header class="contenedor_size">
            <div class="logo">
                Logo
            </div>

            <ul>
                <!-- Authentication Links -->
                @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                    @endif

                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="icono_notificacion" onclick="abrir_notificaciones()">
                        <div class="numero_notificacion">1</div>

                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9">
                            </path>
                        </svg>

                        <div class="notificaciones" id="notificaciones">
                            <header>Notificaciones</header>
                            
                           <a href="">
                            <div class="notificacion">
                                <div class="icono">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9">
                                        </path>
                                    </svg>

                                    <span class="estado_notificacion estado_sin_leer">
                                        Sin leer
                                    </span>
                                </div>

                                <div class="informacion">
                                    <h2>Notificacion de pago</h2>
                                    <div class="descripcion">
                                        loren jsdbfjh dsvbfjhsdvd loren jsdbfjh dsvbfjhsdvd loren jsdbfjh dsvbfjhsdvd
                                    </div>
                                    <span class="fecha">2022</span>
                                </div>
                            </div>
                           </a>

                        </div>
                    </li>

                    <li class="icono_user_perfil">

                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z">
                            </path>
                        </svg>

                    </li>
                @endguest





            </ul>

        </header>

        @yield('content')

        <footer class="contenedor_size">
            Todos los derechos reservados 2022
        </footer>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

</body>

</html>
