<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prestamo extends Model
{
    use HasFactory;

    protected $fillable = [
        'cedula_de_identidad_cliente',
        'importe_de_credito',
        'tasa_de_interes',
        'numero_de_cuotas',
        'importe_de_cuota',
        'total_a_pagar',
        'interes_generado',
        'fecha_de_inicio',
        'status'
    ];

    // Obtener todos los clientes que tiene un prestamos
    public function cliente()
    {
        return $this->hasOne(Cliente::class,'cedula_de_identidad', 'cedula_de_identidad_cliente');
    }

}

