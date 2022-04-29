<?php

namespace App\Http\Controllers;

use App\Models\Rol;
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
    public function index()
    {
        $rol = Rol::find(1);
        $this->authorize('rol', $rol);

        return view('prestamo.index');
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
