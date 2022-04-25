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


            <div class="buscador">
                <input type="search" name="" id="" placeholder="Buscar usuario por nombre o codigo">
                <button><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg> </button>
            </div>

            <div class="labels">
                <div class="label_usuario">
                    <span>Usuario</span>
                </div>

                <div class="label_acciones">
                    <span>Acciones</span>
                </div>
            </div>


            <div class="usuario">

                <div class="info">
                    <span class="nombre_usuario">Joan ramirez</span>
                    <span class="codigo_usuario">40218177638</span>
                </div>

                <div class="acciones">
                    <button>Desactivar</button>
                    <button>Detalle</button>
                </div>

            </div>


        </div>

    </section>
@endsection
