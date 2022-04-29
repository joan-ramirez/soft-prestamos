<?php

namespace App\Policies;

use App\Models\Rol;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class RolPolicy
{
    use HandlesAuthorization;

    public function rol(User $user, Rol $rol)
    {
        // Revisa si el usuario autenticado tiene permiso a las vista de prestamos
        foreach ($user->roles as $rol_user) {
            if ($rol_user->id_rol === $rol->id) {
                return  true;
            }
        }
        return false;
    }
}
