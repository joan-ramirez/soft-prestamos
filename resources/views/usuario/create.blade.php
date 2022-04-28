@extends('layouts.app')

@section('content')
    <div class="volver contenedor_size">
        <svg onclick="location.href='{{ route('index.usuarios') }}'" class="w-6 h-6" fill="none"
            stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
        </svg> Crear Usuario
    </div>

    <section class="view contenedor_size">

        <form action="{{ route('store.usuario') }}" method="post">
            @csrf

            <div class="input">
                <label for="">Nombre:</label>

                <div>
                    <input type="text" value="{{ old('nombre') }}" class="@error('nombre') invalid-input @enderror"
                        name="nombre" placeholder="Nombre">
                    @error('nombre')
                        <span class="error_text" role="alert">
                            {{ $message }}
                        </span>
                    @enderror
                </div>

            </div>

            <div class="input">
                <label for="">Apellido:</label>
                <div> <input type="text" value="{{ old('apellido') }}" name="apellido" placeholder="Apellido">

                    @error('apellido')
                        <span class="error_text" role="alert">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
            </div>


            <div class="input">
                <label for="">Correo Electrónico:</label>
                <div><input type="email" value="{{ old('correo_electronico') }}" name="correo_electronico"
                        placeholder="Correo Electrónico">

                    @error('correo_electronico')
                        <span class="error_text" role="alert">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
            </div>

            <div class="input">
                <label for="">Contraseña de acceso:</label>
                <div><input type="password" name="password" placeholder="password" placeholder="Contraseña de acceso">


                    @error('password')
                        <span class="error_text" role="alert">
                            {{ $message }}
                        </span>
                    @enderror
                </div>

            </div>


            <div class="roles">
                <label for="">Selecciona roles:</label>
                <div class="rols">

                    @foreach ($roles as $rol)
                        <label class="rol">
                            <input type="checkbox" value="{{ $rol->id }}" name="rol">
                            <div class="text-rol">
                                {{ $rol->nombre }}
                            </div>
                        </label>
                    @endforeach


                </div>
            </div>


            <div class="input">
                <div></div>
                <button class="btn_submit" type="submit">Crear Usuario</button>
            </div>

        </form>

    </section>
@endsection
