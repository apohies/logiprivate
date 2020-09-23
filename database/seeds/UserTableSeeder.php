<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Administracion\Admincliente;
use App\Administracion\AdminclienteModulo;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Administracion\EmpleadoCliente;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $superRole=Role::create(['name' => 'SuperUsuario','display_name' =>'SuperUsuario']);
        $adminRole = Role::create(['name' => 'Admin','display_name'=>'Admin']);
        $superRole->givePermissionTo('Ver SuperUsuario','Crear SuperUsuario','Editar SuperUsuario','Eliminar SuperUsuario');

        $user=new user();
        $user->name='Ricardo Riveros';
        $user->email='ricardoriveros@icommerce.com';
        $user->password=bcrypt('12345678');
        $user->save();
        $user->assignRole($superRole);

        /// cliente de prueba

        $user1=new User();
        $user1->name='Cliente';
        $user1->email='cliente1@icommerce.com';
        $user1->password=bcrypt('12345678');
        $user1->save();

        $admincliente = new Admincliente();
        $admincliente->nombreAdmincliente='Empresa Cliente1';
        $admincliente->user_id=$user1->id;
        $admincliente->save();

        $AdminRol=Role::create(['name' => 'Admin general','display_name'=>'Admin general','admincliente_id'=>$admincliente->id]);
        //$permisos=Permission::whereIn('modulo_id',[2,3,4,9])->get();
        $permisos=Permission::whereIn('modulo_id',[2])->get();
        $AdminRol->givePermissionTo($permisos);

        // $user1->syncRoles($AdminRol);
        $user1->assignRole($AdminRol);

        $modulo1=new AdminclienteModulo();
        $modulo1->admincliente_id=$admincliente->id;
        $modulo1->modulo_id=2;
        $modulo1->save();



        // $carguero=Role::create(['name' => 'Carguero','display_name'=>'Carguero','admincliente_id'=>$admincliente->id]);
    
        // $empleado1=new user();
        // $empleado1->name='Juan';
        // $empleado1->apellido="Perez";
        // $empleado1->email='Perez@icommerce.com';
        // $empleado1->password=bcrypt('12345678');
        // $empleado1->save();
        // $empleado1->assignRole($carguero);

        // $empleadoSave=new EmpleadoCliente();
        // $empleadoSave->estado="activo";
        // $empleadoSave->cargo="carguero";
        // $empleadoSave->user_id=$empleado1->id;
        // $empleadoSave->admincliente_id=1;
        // $empleadoSave->save();

        // $empleado2=new user();
        // $empleado2->name='Pepe';
        // $empleado2->apellido="Lombana";
        // $empleado2->email='lombana@icommerce.com';
        // $empleado2->password=bcrypt('12345678');
        // $empleado2->save();
        // $empleado2->assignRole($carguero);

        // $empleadoSave1=new EmpleadoCliente();
        // $empleadoSave1->estado="activo";
        // $empleadoSave1->cargo="carguero";
        // $empleadoSave1->user_id=$empleado2->id;
        // $empleadoSave1->admincliente_id=1;
        // $empleadoSave1->save();

        // $empleado3=new user();
        // $empleado3->name='Ignario';
        // $empleado3->apellido="Paez";
        // $empleado3->email='paez@icommerce.com';
        // $empleado3->password=bcrypt('12345678');
        // $empleado3->save();
        // $empleado3->assignRole($carguero);

        // $empleadoSave2=new EmpleadoCliente();
        // $empleadoSave2->estado="activo";
        // $empleadoSave2->cargo="carguero";
        // $empleadoSave2->user_id=$empleado3->id;
        // $empleadoSave2->admincliente_id=1;
        // $empleadoSave2->save();
        
    }
}
