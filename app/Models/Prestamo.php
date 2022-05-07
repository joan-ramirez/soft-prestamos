<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prestamo extends Model
{
    use HasFactory;

    protected $fillable = [
        'cedula_de_identidad_cliente',
        'modalidad',
        'importe_de_credito',
        'tasa_de_interes',
        'numero_de_cuotas',
        'importe_de_cuota',
        'total_a_pagar',
        'interes_generado',
        'fecha_de_inicio',
        'status'
    ];

    // obtener el cliente del prestamo
    public function cliente()
    {
        return $this->hasOne(Cliente::class, 'cedula_de_identidad', 'cedula_de_identidad_cliente');
    }

        // Obtener los roles/permisos del usuario autenticado.
        public function cuotas()
        {
            return $this->hasMany(Cuota::class,'id_prestamo');
        }
}
