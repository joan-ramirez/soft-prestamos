@extends('layouts.app')

@section('content')
    <div class="volver contenedor_size">
        <svg onclick="location.href='{{ route('home') }}'" class="w-6 h-6" fill="none" stroke="currentColor"
            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
        </svg> Cobro pendiente
    </div>

    <section class="view contenedor_size">


            <form action="" method="post" class="formulario_factura_couta">
                @csrf
                <h2>Cuota de prestamo</h2>
                <p><strong>Cliente:</strong> {{ $deuda->prestamo->cliente->nombre }} - {{ $deuda->prestamo->cliente->cedula_de_identidad }}</p>
                <p><strong>Modalidad de pago:</strong> {{ $deuda->prestamo->modalidad }}</p>
                <p><strong>Numero de cuota:</strong> 2</p>
                <p><strong>Monto de cuota:</strong> ${{ $deuda->prestamo->importe_de_cuota }}</p>
                <p><strong>Cuotas faltante:</strong> 3</p>
                <p><strong>Fecha de pago:</strong> {{ $deuda->start }}</p>

                <button> Marcar cuota como pagada e imprimir</button>
            </form>

        

    </section>
@endsection
