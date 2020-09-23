<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create(['name' => 'Ver SuperUsuario','display_name' =>'Ver','modulo_id'=>1]);
        Permission::create(['name' => 'Crear SuperUsuario','display_name' =>'Crear','modulo_id'=>1]);
        Permission::create(['name' => 'Editar SuperUsuario','display_name' =>'Editar','modulo_id'=>1]);
        Permission::create(['name' => 'Eliminar SuperUsuario','display_name' =>'Eliminar','modulo_id'=>1]);


        //permisos admincliente

        Permission::create(['name' => 'Ver Admincliente','display_name' =>'Ver','modulo_id'=>2]);
        Permission::create(['name' => 'Crear Admincliente','display_name' =>'Crear','modulo_id'=>2]);
        Permission::create(['name' => 'Editar Admincliente','display_name' =>'Editar','modulo_id'=>2]);
        Permission::create(['name' => 'Eliminar Admincliente','display_name' =>'Eliminar','modulo_id'=>2]);
        Permission::create(['name' => 'Ver CentroCostos','display_name' =>'Ver unidad','modulo_id'=>2]);
        Permission::create(['name' => 'Crear CentroCostos','display_name' =>'Crear unidad','modulo_id'=>2]);


        Permission::create(['name' => 'Ver Test','display_name' =>'Ver','modulo_id'=>3]);
        Permission::create(['name' => 'Crear Test','display_name' =>'Crear','modulo_id'=>3]);
        Permission::create(['name' => 'Editar Test','display_name' =>'Editar','modulo_id'=>3]);
        Permission::create(['name' => 'Eliminar Test','display_name' =>'Eliminar','modulo_id'=>3]);
  
    }
}
