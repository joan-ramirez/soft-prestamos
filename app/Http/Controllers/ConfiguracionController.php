<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ConfiguracionController extends Controller
{
    public function index()
    {
        return view('configuracion.index');
    }


    public function cambiar_password(Request $request)
    {
        $request->validate([
            "password_actual" => [
                'required',
                function ($attribute, $value, $fail) {
                    if (!Hash::check($value, Auth::user()->password)) {
                        $fail('El campos contrseña actual no coincide con la contraseña.');
                    }
                },

            ],
            "password_nueva" => "required|min:8|max:50",
            "confirmar_password" => "required|min:8|max:50|same:password_nueva",
        ]);

        Auth::user()->update([
            "password" => Hash::make($request['password_nueva']),
            "updated_at" => Carbon::now(),
        ]);
    }
}
