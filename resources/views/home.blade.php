@extends('layouts.app')

@section('content')
    <div class="bienvenida contenedor_size">
        <h1>Buenos dias, {{ Auth::user()->name }}</h1>
        <span class="fecha">Hoy es Lunes, 5 Abrir 2022 10:38:40 Horas</span>
    </div>

    <section class="navegaciones contenedor_size">

        <div class="navegacion" onclick="location.href='{{ route('create.prestamo') }}'">
            <div>
                <i class="fa-solid fa-dollar-sign"></i>
                <span>Nuevo Prestamos</span>
            </div>
        </div>
        
        <div class="navegacion" onclick="location.href='{{ route('index.cobro') }}'">
            <div>
                <i class="fa-solid fa-calendar-days"></i>
                <span>Cobros del dia</span>
            </div>
        </div>

        <div class="navegacion" onclick="location.href=''">
            <div>
                <i class="fa-solid fa-clock-rotate-left"></i>
                <span>Cuotas atrasadas</span>
            </div>
        </div>

        <div class="navegacion" onclick="location.href='{{ route('index.clientes') }}'">
            <div>
                <i class="fa-solid fa-users"></i>
                <span>Clientes</span>
            </div>
        </div>

        <div class="navegacion" onclick="location.href='{{ route('index.usuarios') }}'">
            <div>
                <i class="fa-solid fa-user"></i>
                <span>Usuarios</span>
            </div>
        </div>

        <div class="navegacion" onclick="location.href='{{ route('index.prestamos') }}'">
            <div>
                <i class="fa-solid fa-list"></i>
                <span>Préstamos</span>
            </div>
        </div>

    </section>
@endsection
