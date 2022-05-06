@extends('layouts.app')

@section('content')
    <div class="volver contenedor_size">
        <svg onclick="location.href='{{ route('index.cobro') }}'" class="w-6 h-6" fill="none" stroke="currentColor"
            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
        </svg>
        @if (!$cuota->status)
            Cobro pendiente
        @else
            Factura del pago
        @endif
    </div>

    <section class="view contenedor_size">
        @if (!$cuota->status)
            <form method="POST" action="{{ route('pagar_cuota.cuota', ['cuota' => $cuota->id]) }}"
                class="formulario_factura_couta">
                @csrf
                @method('PUT')
                <h2>Cuota de prestamo</h2>
                <p><strong>Codigo de cuota:</strong> {{ $cuota->id }} </p>
                <p><strong>Cliente:</strong> {{ $cuota->prestamo->cliente->nombre }} -
                    {{ $cuota->prestamo->cliente->cedula_de_identidad }}</p>
                <p><strong>Modalidad de pago:</strong> {{ $cuota->prestamo->modalidad }}</p>
                <p><strong>Numero de cuota:</strong> 2</p>
                <p><strong>Monto de cuota:</strong> ${{ $cuota->prestamo->importe_de_cuota }}</p>
                <p><strong>Cuotas faltante:</strong> 3</p>
                <p><strong>Fecha de pago:</strong> {{ $cuota->start }}</p>

                <button type="submit"> Marcar cuota como pagada</button>
            </form>
        @else
            <div class="conten_generar_factura">
                <h1>Esta cuota ya fue pagada!</h1>

                <a href="{{ route('pago_cuota.factura', ['cuota' => $cuota->id]) }}" target="_blank"
                    rel="noopener noreferrer">
                    <button>
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z">
                            </path>
                        </svg>
                        Generar factura
                    </button>
                </a>

            </div>
        @endif

    </section>
@endsection
