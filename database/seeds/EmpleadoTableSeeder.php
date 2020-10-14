<?php

use Illuminate\Database\Seeder;
use App\Administracion\EmpleadoCliente;
use App\Entidades\EmpleadoEntidad;
use App\User;

class EmpleadoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user=new User;
        $user->name="miguel angel";
        $user->apellido="moreno paez";
        $user->email="miguelamp92@gmail.com";
        $user->password=bcrypt('12345678');
        $user->save();

        $empleado=new EmpleadoCliente();
        $empleado->estado="nuevo";
        $empleado->tipoDocumento_id=1;
        $empleado->numeroDocumento="1121885139";
        $empleado->fechaNacimiento="1992-01-19";
        $empleado->paisNacimiento_id=1;
        $empleado->departamentoNacimiento=4;
        $empleado->ciudadNacimiento="bogota";
        $empleado->departamentoResidencia_id=4;
        $empleado->cuidadResidencia="bogota";
        $empleado->direccionResidencia="calle 168 14b-45";
        $empleado->estadoCivil_id=1;
        $empleado->rh_id=4;
        $empleado->estatura=170;
        $empleado->hijos=0;
        $empleado->user_id=$user->id;
        $empleado->admincliente_id=1;
        $empleado->save();

        $entidadBancaria= new EmpleadoEntidad();
        $entidadBancaria->empleado_id=$empleado->id;
        $entidadBancaria->tipoEntidad_id=1;
        $entidadBancaria->tipocuenta=1;
        $entidadBancaria->numeroCuenta="11214435";
        $entidadBancaria->save();
    }
}
