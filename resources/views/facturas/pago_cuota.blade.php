<!DOCTYPE html>
<html>

<head>
    <title>Factura de cuota</title>
</head>

<body>
    <h2>Factura de cuota</h2>
    <p><strong>Codigo de cuota:</strong> {{ $cuota->id }} </p>
    <p><strong>Cliente:</strong> {{ $cuota->prestamo->cliente->nombre }} -
        {{ $cuota->prestamo->cliente->cedula_de_identidad }}</p>
    <p><strong>Modalidad de pago:</strong> {{ $cuota->prestamo->modalidad }}</p>
    <p><strong>Numero de cuota:</strong> 2</p>
    <p><strong>Monto de cuota:</strong> ${{ $cuota->prestamo->importe_de_cuota }}</p>
    <p><strong>Cuotas faltante:</strong> 3</p>
    <p><strong>Fecha de pago:</strong> {{ $cuota->start }}</p>

</body>

</html>
