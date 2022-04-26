@extends('layouts.app')

@section('content')
    <div class="volver contenedor_size">
        <svg onclick="location.href='{{ route('index.usuarios') }}'" class="w-6 h-6" fill="none"
            stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
        </svg> Crear Usuario
    </div>

    <section class="view contenedor_size">

        <form action="" method="post">

            <div class="input">
                <label for="">Nombre:</label>
                <input type="text" placeholder="Nombre">
            </div>

            <div class="input">
                <label for="">Apellido:</label>
                <input type="text" placeholder="Apellido">
            </div>


            <div class="input">
                <label for="">Correo Electrónico:</label>
                <input type="text" placeholder="Correo Electrónico">
            </div>

            <div class="input">
                <label for="">Contraseña de acceso:</label>
                <input type="password" placeholder="Contraseña de acceso">
            </div>


            <div class="roles">
                <label for="">Selecciona roles:</label>
                <div class="rols">

                    <label class="rol">
                        <input type="checkbox" name="" id="">
                        <div class="text-rol">
                            Ver notificaciones
                        </div>
                    </label>
                    <label class="rol">
                        <input type="checkbox" name="" id="">
                        <div class="text-rol">
                            Usuarios
                        </div>
                    </label>
                    <label class="rol">
                        <input type="checkbox" name="" id="">
                        <div class="text-rol">
                            Clientes
                        </div>
                    </label>
                    <label class="rol">
                        <input type="checkbox" name="" id="">
                        <div class="text-rol">
                           Nuevo prestamos
                        </div>
                    </label>
                    <label class="rol">
                        <input type="checkbox" name="" id="">
                        <div class="text-rol">
                           Cuotas atrasadas
                        </div>
                    </label>
                    <label class="rol">
                        <input type="checkbox" name="" id="">
                        <div class="text-rol">
                            Cobros del dia
                        </div>
                    </label>





                </div>
            </div>


            <div class="input">
                <div></div>
                <button class="btn_submit" type="submit">Crear Usuario</button>
            </div>

        </form>

    </section>
@endsection
