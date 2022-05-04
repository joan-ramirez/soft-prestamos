<?php

namespace App\Http\Controllers;

use App\Models\Deuda;
use App\Models\Prestamo;
use Illuminate\Http\Request;

class EstadisticaController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     
    public function __construct()
    {
        $this->middleware('auth');
    }*/

    public function show()
    {
        $prestamos = Prestamo::get();
        $prestado = 0;
        foreach ($prestamos as $prestamo) {
            $prestado += $prestamo->importe_de_credito;
        }

        $deudas = Deuda::get();
        $deudas_cobrada = 0;
        $deudas_pendiente = 0;
        foreach ($deudas as $deuda) {
            if ($deuda->status === 0) {
                $deudas_pendiente +=  $deuda->prestamo->importe_de_cuota;
            } else {
                $deudas_cobrada +=  $deuda->prestamo->importe_de_cuota;
            }
        }

        $result = array("Estadistica", $prestado, $deudas_cobrada, $deudas_pendiente);

        return json_encode($result, true);
    }
}
