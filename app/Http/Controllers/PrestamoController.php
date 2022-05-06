<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Rol;
use App\Models\Cuota;
use App\Models\Cliente;
use App\Models\Prestamo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PrestamoController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $rol = Rol::find(1);
        $this->authorize('rol', $rol);

        if (isset($request['search'])) {
            return redirect()->route('index.prestamos', ['query' => $request['search']]);
        }

        $query = $request['query'];

        if (!$query) {
            $query = "";
        }

        $prestamos = Prestamo::query()->where('cedula_de_identidad_cliente', 'like', "%{$query}%")->paginate(10);

        return view('prestamo.index', compact('prestamos', 'query'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $rol = Rol::find(1);
        $this->authorize('rol', $rol);

        return view('prestamo.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rol = Rol::find(1);
        $this->authorize('rol', $rol);

        $validator = Validator::make($request->all(), [
            'cliente' => 'required',
            'importe_de_credito' => 'required',
            'modalidad' => 'required',
            'tasa_de_interes' => 'required',
            'numero_de_cuotas' => 'required',
            'importe_de_cuota' => 'required',
            'total_a_pagar' => 'required',
            'interes_generado' => 'required',
            'fecha_de_inicio' => 'required',
        ]);

        if ($validator->fails()) {

            $errors = $validator->errors();

            $data = array(
                "code" => 500,
                "mensaje" => $errors,
            );
        } else {

            // Verificar si la cedula le pertenece a algun cliente
            $cliente = Cliente::where('cedula_de_identidad',  $request['cliente'])->count();

            if ($cliente > 0) {

                //Crear un prestamo
                $prestamo = Prestamo::create([
                    'cedula_de_identidad_cliente' => $request['cliente'],
                    'modalidad' => $request['modalidad'],
                    'importe_de_credito' => $request['importe_de_credito'],
                    'tasa_de_interes' => $request['tasa_de_interes'],
                    'numero_de_cuotas' => $request['numero_de_cuotas'],
                    'importe_de_cuota' => $request['importe_de_cuota'],
                    'total_a_pagar' => $request['total_a_pagar'],
                    'interes_generado' =>  $request['interes_generado'],
                    'fecha_de_inicio' => $request['fecha_de_inicio'],
                    'status' => 1
                ]);

                //Crear las Cuotas del prestamo modalidad dia
                if ($request['modalidad'] === "dia") {
                    for ($i = 0; $i < $request['numero_de_cuotas']; $i++) {
                        $increment_dia = 0 + $i;

                        Cuota::create([
                            'id_prestamo' => $prestamo->id,
                            'title' => "Cuota pendiente",
                            'start' =>  Carbon::parse($request['fecha_de_inicio'])->addDays($increment_dia),
                            'fecha_vencimiento' => "2022-04-26",
                            'status' => 0
                        ]);
                    }
                }

                //Crear las Cuotas del prestamo modalidad semanal
                if ($request['modalidad'] === "semanal") {
                    for ($i = 0; $i < $request['numero_de_cuotas']; $i++) {
                        $increment_semana = 0 + $i;

                        Cuota::create([
                            'id_prestamo' => $prestamo->id,
                            'title' => "Cuota pendiente",
                            'start' =>  Carbon::parse($request['fecha_de_inicio'])->addWeeks($increment_semana),
                            'fecha_vencimiento' => "2022-04-26",
                            'status' => 0
                        ]);
                    }
                }

                //Crear las Cuotas del prestamo modalidad mensual
                if ($request['modalidad'] === "mensual") {
                    for ($i = 0; $i < $request['numero_de_cuotas']; $i++) {
                        $increment_mensual = 0 + $i;

                        Cuota::create([
                            'id_prestamo' => $prestamo->id,
                            'title' => "Cuota pendiente",
                            'start' =>  Carbon::parse($request['fecha_de_inicio'])->addMonths($increment_mensual),
                            'fecha_vencimiento' => "2022-04-26",
                            'status' => 0
                        ]);
                    }
                }

                $data = array(
                    "code" => 200,
                    "mensaje" => "Prestamo registrado...",
                );
            } else {

                $data = array(
                    "code" => 500,
                    "mensaje" => [
                        'cliente' => ['La cedula del cliente no se encuentra en el sistema.']
                    ],
                );
            }
        }

        return json_encode($data, true);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Prestamo  $prestamo
     * @return \Illuminate\Http\Response
     */
    public function show(Prestamo $prestamo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Prestamo  $prestamo
     * @return \Illuminate\Http\Response
     */
    public function edit(Prestamo $prestamo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Prestamo  $prestamo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Prestamo $prestamo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Prestamo  $prestamo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Prestamo $prestamo)
    {
        //
    }
}
