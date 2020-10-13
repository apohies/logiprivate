<?php

namespace App\Http\Controllers\Contratacion;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
Use Auth;
use App\Contratacion\Contrato;
use App\Contratacion\Clausula;
use App\Contratacion\ContratoClausula;
use DB;
use App\Administracion\EmpleadoCliente;



class ContratacionController extends Controller
{
    
    // metodo empleados nuevos sin asignacion de contrato

    public function indexSinasignacion()
    {
        $user=User::UserAuth();
        $empleados=EmpleadoCliente::where('admincliente_id',$user->admincliente_id)
                                    ->where('estado',"nuevo")
                                    ->join('users','users.id','=','empleado_clientes.user_id')
                                    ->join('tipo_documentos','tipo_documentos.id','=','empleado_clientes.tipoDocumento_id')
                                    ->select('users.id as idUser','users.name','users.apellido','users.email','empleado_clientes.*','tipo_documentos.tipoDocumento')
                                    ->get();

        return view('contratacion.index_sinasignacion',compact('empleados'));
    }
}
