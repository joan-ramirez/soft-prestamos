<?php

namespace App\Http\Controllers;

use App\Models\Rol;
use App\Models\User;
use App\Models\UserRol;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(User $user, Request $request)
    {

        $rol = Rol::find(1);
        $this->authorize('rol', $rol);

        if (isset($request['search'])) {
            return redirect()->route('index.usuarios', ['query' => $request['search']]);
        }

        $query = $request['query'];

        if (!$query) {
            $query = "";
        }

        $usuarios = $user->query()->where('name', 'like', "%{$query}%")->orWhere('email', 'LIKE', "%{$query}%")->paginate(10);

        return view('usuario.index', compact('usuarios', 'query'));
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

        $roles = Rol::all();

        return view('usuario.create', compact('roles'));
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
            'nombre' => 'required',
            'apellido' => 'required',
            'correo_electronico' => 'required | email  | unique:users,email',
            'password' => 'required',
        ]);

        $usuario = User::create([
            'name' => $request['nombre'] . ' ' .  $request['apellido'],
            'email' => $request['correo_electronico'],
            'password' => Hash::make($request['password']),

        ]);

        // Virificar los roles e insertarlo
        if (isset($request['rol1'])) {
            UserRol::create([
                'id_rol' => 1,
                'id_user' => $usuario->id
            ]);
        }

        if (isset($request['rol2'])) {
            UserRol::create([
                'id_rol' => 2,
                'id_user' => $usuario->id
            ]);
        }
        if (isset($request['rol3'])) {
            UserRol::create([
                'id_rol' => 3,
                'id_user' => $usuario->id
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $User
     * @return \Illuminate\Http\Response
     */
    public function show(User $User)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $User
     * @return \Illuminate\Http\Response
     */
    public function edit(User $User)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $User
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $User)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $User
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $User)
    {
        //
    }
}
