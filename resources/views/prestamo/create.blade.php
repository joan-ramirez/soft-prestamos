@extends('layouts.app')

@section('content')
    <div class="volver contenedor_size">
        <svg onclick="location.href='{{ route('home') }}'" class="w-6 h-6" fill="none" stroke="currentColor"
            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
        </svg> Crear prestamo
    </div>

    <section class="view contenedor_size">

        <form action="" method="post">




              <div>
                <crear-prestamo />
              </div>
     


            <div class="input">
                <label for="">Cliente</label>
                <input type="search" placeholder="Busca cliente por nombre">
            </div>



            <div class="input">
                <label for="">Importe de Crédito</label>
                <input type="number" placeholder="Importe de Crédito">
            </div>

            <div class="select">
                <label for="">Modalidad</label>
                <select name="" id="">
                    <option value="">Dia</option>
                    <option value="">Semenal</option>
                    <option value="">Mensual</option>
                </select>
            </div>

            <div class="input">
                <label for="">Tasa de Interes</label>
                <input type="number" placeholder="Tasa de Interes">
            </div>

            <div class="input">
                <label for="">Nº Cuotas</label>
                <input type="number" placeholder="Nº Cuotas">
            </div>

            <div class="input">
                <label for="">Importe de la Cuota</label>
                <input type="number" placeholder="Importe de la Cuota" readonly disabled>
            </div>

            <div class="input">
                <label for="">Total a Pagar</label>
                <input type="number" placeholder="Total a Pagar" disabled>
            </div>

            <div class="input">
                <label for="">Interes Generado</label>
                <input type="number" placeholder="Interes Generado" disabled>
            </div>

            <div class="input">
                <label for="">Fecha de Inicio</label>
                <input type="date" name="" id="" value="{{ date('Y-m-d') }}">
            </div>

            <div class="input">
                <div></div>
                <button class="btn_submit" type="submit">Crear Prestamo</button>
            </div>

        </form>

    </section>
   
@endsection
