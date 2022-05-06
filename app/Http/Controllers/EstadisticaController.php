<?php

namespace App\Http\Controllers;

use App\Models\Cuota;
use App\Models\Prestamo;

class EstadisticaController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show()
    {
        $prestamos = Prestamo::get();
        $prestado = 0;
        foreach ($prestamos as $prestamo) {
            $prestado += $prestamo->importe_de_credito;
        }

        $cuotas = Cuota::get();
        $cuotas_cobrada = 0;
        $cuotas_pendiente = 0;
        foreach ($cuotas as $cuota) {
            if ($cuota->status === 0) {
                $cuotas_pendiente +=  $cuota->prestamo->importe_de_cuota;
            } else {
                $cuotas_cobrada +=  $cuota->prestamo->importe_de_cuota;
            }
        }

        $result = array("Estadistica", $prestado, $cuotas_cobrada, $cuotas_pendiente);

        return json_encode($result, true);
    }
}
