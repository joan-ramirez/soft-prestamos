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
}
