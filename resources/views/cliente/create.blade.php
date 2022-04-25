@extends('layouts.app')

@section('content')
    <div class="volver contenedor_size">
        <svg onclick="location.href='{{ route('index.clientes') }}'" class="w-6 h-6" fill="none" stroke="currentColor"
            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
        </svg> Crear Cliente
    </div>

    <section class="view contenedor_size">

        <form action="" method="post">

            <div class="input">
                <label for="">Ejemplo</label>
                <input type="text">
            </div>

            <div class="select">
                <label for="">Ejemplo</label>
                <select name="" id="">
                    <option value="">1</option>
                </select>
            </div>

            <div class="input">
                <label for="">Ejemplo</label>
                <input type="text">
            </div>

            <button class="btn_submit" type="submit">Crear Cliente</button>
        </form>

    </section>
@endsection
