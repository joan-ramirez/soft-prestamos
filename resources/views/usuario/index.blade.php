@extends('layouts.app')

@section('content')
    <div class="volver contenedor_size">
        <svg onclick="location.href='{{ route('home') }}'" class="w-6 h-6" fill="none" stroke="currentColor"
            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
        </svg> Usuarios
    </div>

    <section class="view contenedor_size">

        <div class="usuarios">

            <div class="links">
                <a href="{{ route('create.usuario') }}"><button>Crear Usuario</button></a>
            </div>

            <form action="{{ route('index.usuarios') }}" method="get" class="buscador">

                <input type="search" name="search" value="{{ $query }}"
                    placeholder="Buscar usuario por nombre o correo electronico">

                <button type="submit">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </button>
            </form>

            @if (count($usuarios))
                <div class="labels">
                    <div class="label_usuario">
                        <span>Usuario</span>
                    </div>

                    <div class="label_acciones">
                        <span>Acciones</span>
                    </div>
                </div>
                @foreach ($usuarios as $usuario)
                    <div class="usuario">

                        <div class="info">
                            <span class="nombre_usuario">{{ $usuario->name }}</span>
                            <span class="codigo_usuario">{{ $usuario->email }}</span>
                        </div>

                        <div class="acciones">
                            <button>Desactivar</button>
                            <button>Detalle</button>
                        </div>

                    </div>
                @endforeach

                {{ $usuarios->links() }}
            @else
                <!--Me falta esto-->
                <div class="sin-resultado">
                    Sin resultado
                </div>
            @endif

        </div>

    </section>
@endsection
