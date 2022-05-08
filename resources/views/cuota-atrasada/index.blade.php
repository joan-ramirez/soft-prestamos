@extends('layouts.app')

@section('content')
    <div class="volver contenedor_size">
        <svg onclick="location.href='{{ route('home') }}'" class="w-6 h-6" fill="none" stroke="currentColor"
            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
        </svg> Cuotas atrasadas
    </div>

    <section class="view contenedor_size">

        @if (count($cuotas))
            <div class="cuotas_atrasadas">
                @foreach ($cuotas as $cuota)
                    <div class="cuota_atrasada">
                        <p><strong>Importe de la cuota:</strong> ${{ $cuota->prestamo->importe_de_cuota }}</p>
                        <p><strong>Codigo prestamo:</strong> {{ $cuota->prestamo->id }}</p>
                        <p><strong>Cliente:</strong> {{ $cuota->prestamo->cliente->nombre }} -
                            {{ $cuota->prestamo->cliente->cedula_de_identidad }}</p>
                        <p><strong>Fecha de pago:</strong> {{ $cuota->start }}</p>
                        <p>Cuota atrasada {{ Carbon\Carbon::parse($cuota->start)->diffForHumans() }}</p>

                        <button onclick="location.href='{{ route('show.cobro', ['cuota' => $cuota->id]) }}'">Ir a
                            pagar</button>
                    </div>
                @endforeach
            </div>
            {{ $cuotas->links() }}
        @else
            <div class="sin-resultado" style="margin-top: 125px; margin-bottom:125px;">
                No hay cuotas atrasadas
            </div>
        @endif


    </section>
@endsection
