<!DOCTYPE html>
<html>

<head>
    <title>Factura de prestamo</title>
</head>

<body>
    <h2>Factura de prestamo</h2>
    <p><strong>Nombre:</strong> {{ $prestamo->cliente->nombre }} </p>
    <p><strong>Cedula:</strong> {{ $prestamo->cliente->cedula_de_identidad }} </p>

    <h3>Detalles del prestamo:</h3>
    <p><strong>ID:</strong> {{ $prestamo->id }} </p>
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
            </li>
        @endforeach
    </ol>



</body>

</html>
