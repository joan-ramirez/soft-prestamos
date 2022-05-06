<?php

namespace App\Http\Controllers;

use App\Models\Cuota;

use PDF;

class FacturaContoller extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // Generar la factura de pago de cuota
    public function pago_cuota(Cuota $cuota)
    {
        $data = [
            'cuota' => $cuota,
        ];

        $pdf = PDF::loadView('facturas/pago_cuota', $data);

        return $pdf->stream('itsolutionstuff.pdf', ["Attachment" => true]);
    }
}
