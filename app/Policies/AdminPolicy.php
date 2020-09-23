<?php

namespace App\Policies;

use App\Administracion\Admincliente;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class AdminPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\User  $user
     * @param  \App\Admincliente  $admincliente
     * @return mixed
     */
   public function ver_cliente(User $user, Admincliente $admincliente)
   {
    return $user->hasPermissionTo('Ver SuperUsuario');   
   }

   public function ver_modulos(User $user, Admincliente $admincliente)
   {
    return $user->hasPermissionTo('Crear SuperUsuario');   
   }



   public function ver_empleado(User $user,Admincliente $admincliente )
   {
       return $user->hasPermissionTo('Ver Admincliente');
   }


   // PERMISOS PARA ADMINISTRADOR.

   public function ver_centro(User $user,Admincliente $admincliente )
   {
        return $user->hasPermissionTo('Ver CentroCostos');
   }

   public function crear_centro(User $user,Admincliente $admincliente )
   {
        return $user->hasPermissionTo('Crear CentroCostos');
   }

   
}
