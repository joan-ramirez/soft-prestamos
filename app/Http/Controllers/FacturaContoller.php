<?php

namespace App\Http\Controllers;

use App\Models\Cuota;
use App\Models\Prestamo;
use PDF;

class FacturaContoller extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // Generar la factura del prestamo
    public function prestamo(Prestamo $prestamo)
    {
        $data = [
            'prestamo' => $prestamo,
        ];

        $pdf = PDF::loadView('facturas/prestamo', $data);

        return $pdf->stream('factura_prestamo' . $prestamo->id . '.pdf', ["Attachment" => true]);
    }


    // Generar la factura de pago de cuota
    public function pago_cuota(Cuota $cuota)
    {
        $data = [
            'cuota' => $cuota,
        ];

        $pdf = PDF::loadView('facturas/pago_cuota', $data);

        return $pdf->stream('factura_pago_cuota' . $cuota->id . '.pdf', ["Attachment" => true]);
    }
}
