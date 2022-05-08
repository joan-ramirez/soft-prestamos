<!DOCTYPE html>
<html>


<head>
    <title>Factura de cuota</title>

    <style>
    @import url("https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap");
    html,body {
        font-family: "Poppins", sans-serif;
    }
</style>
</head>

<body>
    <h2>Factura de cuota</h2>
    <p><strong>Código de cuota:</strong> {{ $cuota->id }} </p>
    <p><strong>Cliente:</strong> {{ $cuota->prestamo->cliente->nombre }} -
        {{ $cuota->prestamo->cliente->cedula_de_identidad }}</p>
    <p><strong>Modalidad de pago:</strong> {{ $cuota->prestamo->modalidad }}</p>
    <p><strong>Numero de cuota:</strong> 2</p>
    <p><strong>Monto de cuota:</strong> ${{ $cuota->prestamo->importe_de_cuota }}</p>
    <p><strong>Cuotas faltante:</strong> 3</p>
    <p><strong>Fecha de pago:</strong> {{ $cuota->start }}</p>
</body>

</html>
