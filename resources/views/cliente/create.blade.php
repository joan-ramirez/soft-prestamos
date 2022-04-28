@extends('layouts.app')

@section('content')
    <div class="volver contenedor_size">
        <svg onclick="location.href='{{ route('index.clientes') }}'" class="w-6 h-6" fill="none"
            stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
        </svg> Crear Cliente
    </div>

    <section class="view contenedor_size">

        <form action="{{ route('store.cliente') }}" method="post">
            @csrf

            <div class="input">
                <label for="">Cédula de Identidad:</label>

                <div>
                    <input type="number" value="{{ old('cedula_de_identidad') }}"  class="@error('cedula_de_identidad') invalid-input @enderror"
                        name="cedula_de_identidad" placeholder="Cédula de Identidad">
                    @error('cedula_de_identidad')
                        <span class="error_text" role="alert">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
            </div>


            <div class="input">
                <label for="">Nombre:</label>
                <div>
                    <input type="text" value="{{ old('nombre') }}" class="@error('nombre') invalid-input @enderror" name="nombre"
                        placeholder="Nombre">
                    @error('nombre')
                        <span class="error_text" role="alert">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
            </div>

            <div class="input">
                <label for="">Apeliido:</label>
                <div> <input type="text" value="{{ old('apellido') }}" class="@error('apellido') invalid-input @enderror" name="apellido"
                        placeholder="Apeliido">
                    @error('apellido')
                        <span class="error_text" role="alert">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
            </div>

            <div class="input">
                <label for="">Número de Teléfono:</label>
                <div> <input type="tel" value="{{ old('numero_de_telefono') }}" class="@error('numero_de_telefono') invalid-input @enderror"
                        name="numero_de_telefono" placeholder="Número de Teléfono">
                    @error('numero_de_telefono')
                        <span class="error_text" role="alert">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
            </div>

            <div class="input">
                <label for="">Correo Electrónico:</label>
                <div> <input type="Email" value="{{ old('correo_electronico') }}" class="@error('correo_electronico') invalid-input @enderror"
                        name="correo_electronico" placeholder="Correo Electrónico">
                    @error('correo_electronico')
                        <span class="error_text" role="alert">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
            </div>


            <div class="input">
                <label for="">Fecha de Nacimiento:</label>
                <div> <input type="date" value="{{ old('fecha_de_nacimiento') }}" class="@error('fecha_de_nacimiento') invalid-input @enderror"
                        name="fecha_de_nacimiento" id="">
                    @error('fecha_de_nacimiento')
                        <span class="error_text" role="alert">
                            {{ $message }}
                        </span>
                    @enderror
                </div>

            </div>

            <div class="input">
                <label for="">Ubicación:</label>

                <div>
                    <input type="text" value="{{ old('ubicacion') }}" class="@error('ubicacion') invalid-input @enderror" name="ubicacion"
                        placeholder="Ubicación">
                    @error('ubicacion')
                        <span class="error_text" role="alert">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
            </div>

            <div class="input">
                <div></div>
                <button class="btn_submit" type="submit">Crear Cliente</button>
            </div>



        </form>

    </section>
@endsection
