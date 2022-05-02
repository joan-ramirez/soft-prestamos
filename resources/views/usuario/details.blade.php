@extends('layouts.app')

@section('content')
    <div class="volver contenedor_size">
        <svg onclick="location.href='{{ route('index.usuarios') }}'" class="w-6 h-6" fill="none"
            stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
        </svg> Detalles Usuario
    </div>

    <section class="view contenedor_size">


        <div class="detalles_cliente">
            <div class="detalle">
                <strong>Nombre completo:</strong>
                {{ $user->name }}
            </div>

            <div class="detalle">
                <strong>Correo Electrónico:</strong>
                {{ $user->email }}
            </div>


            <div class="detalle">

                <strong>Roles:</strong>
                <br>
                @foreach ($user->roles as $rol)
                <div style="font-size: 13px">
                    <span style="font-weight: 600">{{ $rol->rols->nombre }}</span>
                    <li>{{ $rol->rols->descripcion }}</li>
                </div>
                   
                @endforeach

            </div>


        </div>



    </section>
@endsection
