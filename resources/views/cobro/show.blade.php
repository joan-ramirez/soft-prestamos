@extends('layouts.app')

@section('content')
    <div class="volver contenedor_size">
        <svg onclick="location.href='{{ route('index.cobro') }}'" class="w-6 h-6" fill="none" stroke="currentColor"
            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
        </svg>
        @if (!$deuda->status)
            Cobro pendiente
        @else
            Factura del pago
        @endif
    </div>

    <section class="view contenedor_size">
        @if (!$deuda->status)
            <form method="POST" action="{{ route('update.deuda', ['deuda' => $deuda->id]) }}"
                class="formulario_factura_couta">
                @csrf
                @method('PUT')
                <h2>Cuota de prestamo</h2>
                <p><strong>Codigo de cuota:</strong> {{ $deuda->id }} </p>
                <p><strong>Cliente:</strong> {{ $deuda->prestamo->cliente->nombre }} -
                    {{ $deuda->prestamo->cliente->cedula_de_identidad }}</p>
                <p><strong>Modalidad de pago:</strong> {{ $deuda->prestamo->modalidad }}</p>
                <p><strong>Numero de cuota:</strong> 2</p>
                <p><strong>Monto de cuota:</strong> ${{ $deuda->prestamo->importe_de_cuota }}</p>
                <p><strong>Cuotas faltante:</strong> 3</p>
                <p><strong>Fecha de pago:</strong> {{ $deuda->start }}</p>

                <button type="submit"> Marcar cuota como pagada</button>
            </form>
        @else
            <div class="conten_generar_factura">
                <h1>Esta cuota ya fue pagada!</h1>
                <button>
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z">
                        </path>
                    </svg>
                    Generar factura
                </button>
            </div>
        @endif

    </section>
@endsection
