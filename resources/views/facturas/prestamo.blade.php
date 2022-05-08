<!DOCTYPE html>
<html>

<head>
    <title>Factura de prestamo</title>

    <style>
        @import url("https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap");

        html,
        body {
            font-family: "Poppins", sans-serif;
        }

    </style>
</head>

<body>
    <h2>Factura de prestamo</h2>
    <p><strong>Nombre:</strong> {{ $prestamo->cliente->nombre }} </p>
    <p><strong>Cedula:</strong> {{ $prestamo->cliente->cedula_de_identidad }} </p>

    <h3>Detalles del prestamo:</h3>
    <p><strong>Código de prestamo:</strong> {{ $prestamo->id }} </p>
    <p><strong>Modalidad:</strong> {{ $prestamo->modalidad }} </p>
    <p><strong>Importe de Crédito:</strong> ${{ $prestamo->importe_de_credito }} </p>
    <p><strong>Tasa de Interes:</strong> {{ $prestamo->tasa_de_interes }}% </p>
    <p><strong>Total a Pagar:</strong> ${{ $prestamo->total_a_pagar }} </p>

    <strong>Detalles de las cuotas:</strong>
    <ol>
        @foreach ($prestamo->cuotas as $cuota)
            <li>
                <strong>Fecha de pago:</strong> {{ $cuota->start }} - Monto cuota:
                ${{ $prestamo->importe_de_cuota }} 
                @if ($cuota->status)
                - Pagodo
                @else
                - Sin pagar
                @endif
            </li>
        @endforeach
    </ol>



</body>

</html>
