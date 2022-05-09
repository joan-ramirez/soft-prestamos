<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cuota extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_prestamo',
        'title',
        'start',
        'status',
        'year_inicio',
    ];

    // Obtener el prestamo de la deuda
    public function prestamo()
    {
        return $this->hasOne(Prestamo::class, 'id','id_prestamo');
    }

}
