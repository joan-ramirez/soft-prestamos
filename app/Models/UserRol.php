<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserRol extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_rol',
        'id_user'
    ];

    // Obtener los roles del usuario
    public function rols()
    {
        return $this->belongsTo(Rol::class,'id_rol','id');
    }
}
