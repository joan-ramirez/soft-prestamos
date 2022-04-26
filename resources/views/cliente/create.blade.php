@extends('layouts.app')

@section('content')
    <div class="volver contenedor_size">
        <svg onclick="location.href='{{ route('index.clientes') }}'" class="w-6 h-6" fill="none"
            stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
        </svg> Crear Cliente
    </div>

    <section class="view contenedor_size">

        <form action="" method="post">


            <div class="input">
                <label for="">Cédula de Identidad:</label>
                <input type="text" placeholder="Cédula de Identidad">
            </div>


            <div class="input">
                <label for="">Nombre:</label>
                <input type="text" placeholder="Nombre">
            </div>

            <div class="input">
                <label for="">Apeliido:</label>
                <input type="text" placeholder="Apeliido">
            </div>

            <div class="input">
                <label for="">Número de Teléfono:</label>
                <input type="tel" placeholder="Número de Teléfono">
            </div>

            <div class="input">
                <label for="">Correo Electrónico:</label>
                <input type="Email" placeholder="Correo Electrónico">
            </div>


            <div class="input">
                <label for="">Fecha de Nacimiento:</label>
                <input type="date" name="" id="">
            </div>

            <div class="input">
                <label for="">Ubicación:</label>
                <input type="text" placeholder="Ubicación">
            </div>

            <div class="input">
                <div></div>
                <button class="btn_submit" type="submit">Crear Cliente</button>
            </div>



        </form>

    </section>
@endsection
