<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deuda extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_prestamo',
        'title',
        'start',
        'fecha_vencimiento',
        'status'
    ];

    // Obtener el prestamo de la deuda
    public function prestamo()
    {
        return $this->hasOne(Prestamo::class, 'id','id_prestamo');
    }

}
