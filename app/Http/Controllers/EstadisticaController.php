<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Cuota;

use App\Models\Prestamo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EstadisticaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show(Request $request)
    {
        //Carbon::now()->format('Y');

        $prestamos = Prestamo::where('year_inicio', $request['year'])->get();
        $prestado = 0;
        foreach ($prestamos as $prestamo) {
            $prestado += $prestamo->importe_de_credito;
        }

        $cuotas = Cuota::where('year_inicio', $request['year'])->get();
        $cuotas_cobrada = 0;
        $cuotas_pendiente = 0;
        foreach ($cuotas as $cuota) {
            if ($cuota->status === 0) {
                $cuotas_pendiente +=  $cuota->prestamo->importe_de_cuota;
            } else {
                $cuotas_cobrada +=  $cuota->prestamo->importe_de_cuota;
            }
        }

        $estadistica = array("Estadistica", $prestado, $cuotas_cobrada, $cuotas_pendiente, $cuotas_cobrada - $prestado);

        $data = array('estadistica' => $estadistica, 'fecha_inicio_app' =>  DB::table('fecha_inicio_app')->first()->fecha_inicio_app);

        return json_encode($data, true);
    }
}
