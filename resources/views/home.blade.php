@extends('layouts.app')

@section('content')
    <div class="bienvenida contenedor_size">
        <h1>Buenos dias, joan</h1>
        <span class="fecha">Hoy es Lunes, 5 Abrir 2022 10:38:40 Horas</span>
    </div>

    <section class="navegaciones contenedor_size">

        <div class="navegacion">
            <div>
                <i class="fa-solid fa-dollar-sign"></i>
                <span>Nuevo Prestamos</span>
            </div>
        </div>

        <div class="navegacion">
            <div>
                <i class="fa-solid fa-calendar-days"></i>
                <span>Cobros del dia</span>
            </div>
        </div>

        <div class="navegacion">
            <div>
                <i class="fa-solid fa-clock-rotate-left"></i>
                <span>Cobros atrasados</span>
            </div>
        </div>

        <div class="navegacion">
            <div>
                <i class="fa-solid fa-users"></i>
                <span>Clientes</span>
            </div>
        </div>

        <div class="navegacion">
            <div>
                <i class="fa-solid fa-user"></i>
                <span>Usuario</span>
            </div>
        </div>

        <div class="navegacion">
            <div>
                <i class="fa-solid fa-list"></i>
                <span>Préstamos</span>
            </div>
        </div>

    </section>
@endsection
