<?php

namespace Database\Seeders;

use App\Models\Rol;
use App\Models\UserRol;
use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Rol::create([
            'nombre' => "Prestamos",
            'descripcion' => "El permiso de hacer o ver los prestamos.",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        Rol::create([
            'nombre' => "Usuarios",
            'descripcion' => "El permiso de agregar, ver, editar o eliminar usuarios.",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        Rol::create([
            'nombre' => "Clientes",
            'descripcion' => "El permiso de agregar, ver, editar o eliminar clientes.",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        UserRol::create([
            'id_rol' => 1,
            'id_user' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        UserRol::create([
            'id_rol' => 2,
            'id_user' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        UserRol::create([
            'id_rol' => 3,
            'id_user' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
