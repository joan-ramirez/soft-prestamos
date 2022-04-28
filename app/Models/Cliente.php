<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $fillable = [
        'cedula_de_identidad',
        'nombre',
        'apellido',
        'numero_de_telefono',
        'correo_electronico',
        'fecha_de_nacimiento',
        'ubicacion',
        'status',
    ];
}
