@extends('layouts.app')

@section('content')
    <div class="volver contenedor_size">
        <svg onclick="location.href='{{ route('home') }}'" class="w-6 h-6" fill="none" stroke="currentColor"
            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
        </svg> Crear prestamo
    </div>

    <section class="view contenedor_size">

        <crear-prestamo url-buscar-cliente="{{ route('show.clientes') }}"
            url-guardar-prestamo="{{ route('store.prestamo') }}" />

    </section>
@endsection
