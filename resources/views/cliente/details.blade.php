@extends('layouts.app')

@section('content')
    <div class="volver contenedor_size">
        <svg onclick="location.href='{{ route('index.clientes') }}'" class="w-6 h-6" fill="none" stroke="currentColor"
            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
        </svg> Detalles Clientes
    </div>

    <section class="view contenedor_size">

  
        <div class="detalles_cliente">  
            <div class="detalle">
                <strong>Cédula de Identidad:</strong>
                {{ $get_cliente->cedula_de_identidad }}
            </div>

            <div class="detalle">
                <strong>Nombre completo:</strong>
                {{ $get_cliente->nombre }}
            </div>

            <div class="detalle">
                <strong>Número de Teléfono:</strong>
                {{ $get_cliente->numero_de_telefono }}
            </div>

            <div class="detalle">
                <strong>Correo Electrónico:</strong>
                {{ $get_cliente->correo_electronico }}
            </div>

            <div class="detalle">
                <strong>Fecha de Nacimiento:</strong>
                {{ $get_cliente->fecha_de_nacimiento }}
            </div>

            <div class="detalle">
                <strong>Ubicación:</strong>
                {{ $get_cliente->ubicacion }}
            </div>


            <div class="detalle">
                <strong>Total de prestamos:</strong>
                {{ count($get_cliente->prestamos )}}
            </div>

        </div>

      

    </section>
@endsection
