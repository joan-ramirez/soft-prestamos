@extends('layouts.app')

@section('content')
    <div class="volver contenedor_size">
        <svg onclick="location.href='{{ route('home') }}'" class="w-6 h-6" fill="none" stroke="currentColor"
            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
        </svg> Prestamos
    </div>

    <section class="view contenedor_size">

        <div class="usuarios">

            <div class="links">
                <a href="{{ route('create.prestamo') }}"><button>Nuevo Prestamos</button></a>
            </div>

            <form action="{{ route('index.prestamos') }}" method="get" class="buscador">
                <input type="search" name="search" value="{{ $query }}" placeholder="Buscar prestamos por codigo o cedula de identidad del cliente" />

                <button type="submit">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </button>
            </form>

            @if (count($prestamos))
                <div class="labels">
                    <div class="label_usuario">
                        <span>Prestamos</span>
                    </div>

                    <div class="label_acciones">
                        <span>Acciones</span>
                    </div>
                </div>

                @foreach ($prestamos as $prestamo)
                    <div class="usuario">

                        <div class="info">
                            <span class="codigo_usuario"><strong>Codigo:</strong> {{ $prestamo->id }}</span>
                            <span class="codigo_usuario"><strong>Cliente:</strong> {{ $prestamo->cliente->nombre }}  - {{ $prestamo->cliente->cedula_de_identidad }}</span>

                            @php
                                $estado_pagado = true;
                            @endphp

                            @foreach ($prestamo->cuotas as $cuota)
                                @if (!$cuota->status)
                                    @php
                                        $estado_pagado = false;
                                    @endphp
                                @endif
                            @endforeach

                            @if ($estado_pagado)
                               <strong> <span class="codigo_usuario" style="color: #2ecc71;">Pagado</span></strong>
                              
                                @else

                                <strong><span class="codigo_usuario" style="color: #e74c3c;">Sin pagar</span></strong>
                            @endif

                        </div>

                        <div class="acciones">
                            <button>Reembolso</button>
                            <button onclick=" window.open('{{ route('prestamo.factura', ['prestamo' => $prestamo->id]) }}','_blank')">Generar Factura</button>
                        </div>

                    </div>
                @endforeach

                {{ $prestamos->links() }}
            @else
                <!--Me falta esto-->
                <div class="sin-resultado">
                    Sin resultado
                </div>
            @endif

        </div>

    </section>
@endsection
