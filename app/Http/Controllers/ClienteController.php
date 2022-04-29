<?php

namespace App\Http\Controllers;

use App\Models\Rol;
use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
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
    public function index(Request $request, Cliente $cliente)
    {
        $rol = Rol::find(1);
        $this->authorize('rol', $rol);

        if (isset($request['search'])) {
            return redirect()->route('index.clientes', ['query' => $request['search']]);
        }

        $query = $request['query'];

        if (!$query) {
            $query = "";
        }

        $clientes = $cliente->query()->where('nombre', 'like', "%{$query}%")->orWhere('cedula_de_identidad', 'LIKE', "%{$query}%")->paginate(15);

        return view('cliente.index', compact('clientes', 'query'));
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

        return view('cliente.create');
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


        $request->validate([
            'cedula_de_identidad' => 'required | unique:clientes,cedula_de_identidad',
            'nombre' => 'required',
            'apellido' => 'required',
            'numero_de_telefono' => 'required',
            'correo_electronico' => 'required | email',
            'fecha_de_nacimiento' => 'required | date',
            'ubicacion' => 'required',
        ]);

        Cliente::create([
            'cedula_de_identidad' =>  $request['cedula_de_identidad'],
            'nombre' => $request['nombre'] . ' ' .  $request['apellido'],
            'numero_de_telefono' => $request['numero_de_telefono'],
            'correo_electronico' => $request['correo_electronico'],
            'fecha_de_nacimiento' => $request['fecha_de_nacimiento'],
            'ubicacion' => $request['ubicacion'],
            'status' => 1,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Cliente $cliente)
    {
        $rol = Rol::find(1);
        $this->authorize('rol', $rol);


        $query = $request['cliente'];

        $clientes = $cliente->query()->where('nombre', 'like', "%{$query}%")->orWhere('cedula_de_identidad', 'LIKE', "%{$query}%")->paginate(15);

        $data = array(
            "code" => 200,
            "clientes" => $clientes,
        );

        return json_encode($data, true);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function edit(Cliente $cliente)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cliente $cliente)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cliente $cliente)
    {
        //
    }
}
