<?php

namespace Database\Seeders;

use App\Models\Rol;
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
            'nombre' => "Rol 1",
            'descripcion' => "descripcion 1",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        Rol::create([
            'nombre' => "Rol 2",
            'descripcion' => "descripcion 2",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        Rol::create([
            'nombre' => "Rol 3",
            'descripcion' => "descripcion 3",
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
