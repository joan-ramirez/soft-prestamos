@extends('layouts.app')

@section('content')
    <div class="volver contenedor_size">
        <svg onclick="location.href='{{ route('home') }}'" class="w-6 h-6" fill="none" stroke="currentColor"
            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
        </svg> Configuración
    </div>

    <section class="view contenedor_size">

        <div class="configuracion">
            <div class="cerrar_sesion">
                <button onclick="window.localStorage.setItem('logeado', false); event.preventDefault();
                                    document.getElementById('logout-form').submit(); ">
                    Cerrar Sesión
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1">
                        </path>
                </button>
                </svg>

            </div>
            <form action="{{ route('logout') }}" method="post" id="logout-form">@csrf</form>

            <div class="reset-password">
                <form action="{{ route('cambiar_password.configuracion') }}" method="post">
                    @method('put')
                    @csrf


                    <h3 style="font-weight: 500; font-size:17px; margin-bottom:10px">Cambiar Contraseña</h3>
                    <div class="linea">

                    </div>

                    <div class="input">
                        <label for="">Contraseña actual:</label>
                        <div> <input class="@error('password_actual') invalid-input @enderror"
                                value="{{ old('password_actual') }}" type="password" name="password_actual"
                                placeholder="Contraseña actual">

                            @error('password_actual')
                                <span class="error_text" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror
                            
                        </div>
                    </div>

                    <div class="input">
                        <label for="">Nueva contraseña:</label>
                        <div> <input class="@error('password_nueva') invalid-input @enderror"
                                value="{{ old('password_nueva') }}" type="password" name="password_nueva"
                                placeholder="Nueva contraseña">

                            @error('password_nueva')
                                <span class="error_text" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="input">
                        <label for="">Confirma la contraseña:</label>
                        <div> <input class="@error('confirmar_password') invalid-input @enderror" type="password"
                                name="confirmar_password" placeholder="Confirma la contraseña">

                            @error('confirmar_password')
                                <span class="error_text" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="input">
                        <div></div>
                        <button class="btn_submit">Cambiar contraseña</button>
                    </div>
                </form>
            </div>


        </div>

    </section>
@endsection
