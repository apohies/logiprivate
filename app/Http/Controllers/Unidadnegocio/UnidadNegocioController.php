<?php

namespace App\Http\Controllers\Unidadnegocio;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\UnidadNegocio\UnidadNegocio;
use App\UnidadNegocio\Dependencia;
use App\UnidadNegocio\Area;
use App\UnidadNegocio\EmpleadoArea;
use App\User;
use App\Administracion\EmpleadoCliente;

use DB;

class UnidadNegocioController extends Controller
{
    
    public function index()
    {
        $user=User::UserAuth();
        $unidades=UnidadNegocio::where('admincliente_id',$user->admincliente_id)
        ->orderBy('id', 'desc')
        ->get();
        return view('unidadnegocio.index',compact('unidades'));        
    }

    // metodo store de unidades de negocio
    public function store(Request $request)
    {

        $user=User::UserAuth();

        $this->validate($request, [
            'unidadNegocio' => 'required|string|max:190',
            'direccionNegocio' => 'required|string|max:190',
        ]);

        $unidad= new UnidadNegocio();
        $unidad->unidadNegocio=$request->unidadNegocio;
        $unidad->direccionNegocio=$request->direccionNegocio;
        $unidad->unidadCodigo=$request->unidadCodigo;
        $unidad->admincliente_id=$user->admincliente_id;
        $unidad->save();

        return back()->with('success','creado exitosamente');
    }

    // este metodo lleva al panel general que conecta con el boton gestionar aqui pueede acceder depedencias
    public function gestionarUnidad($unidad)
    {
        $user=User::UserAuth();

        $unidadNegocio=UnidadNegocio::where('id',$unidad)->first();
        $depedencias=Dependencia::where('unidad_negocios_id',$unidadNegocio->id)->get();
        $areas=Area::whereIn('dependencia_id',Dependencia::select('id')->where('unidad_negocios_id',$unidadNegocio->id))->get();

        // empleados disponibles para ser asignados a una area o empleados nuevos quienes estan recien cargados.
        $empleadosLibres=DB::select("SELECT empleado_clientes.id ,users.name , users.apellido FROM `empleado_clientes`
        inner join users on users.id =empleado_clientes.user_id
        where empleado_clientes.id not in ( select empleado_id from empleado_areas) 
        or
        empleado_clientes.id  in ( select empleado_id from empleado_areas where estado = 'desactivo'
        and empleado_clientes.admincliente_id=?)",[$user->admincliente_id]);

        return view('unidadnegocio.gestionunidad',compact('unidadNegocio','depedencias','areas','empleadosLibres'));
    }


    public function storeArea(Dependencia $dependencia,Request $request)
    {
        
        $area=new Area();
        $area->nombreArea=$request->nombreArea;
        $area->descripcionArea=$request->descripcionArea;
        $area->dependencia_id=$dependencia->id;
        $area->save();

        return back()->with('sucess','El area ha sido creada satisfactoriamente');

    }

    public function storeDependencia(UnidadNegocio $unidadNegocio,Request $request)
    {
        
        $area=new Dependencia();
        $area->nombreDependencia=$request->nombreDependencia;
        $area->descripcionDependencia=$request->descripcionDependencia;
        $area->unidad_negocios_id=$unidadNegocio->id;
        $area->save();

        return back()->with('sucess','La dependencia ha sido creada satisfactoriamente');

    }


        // metodo para tener el listado de todos los empleados y saber en que area estan asigandos ya  donde puede ser transferidos
    public function indexAreActural()
    {
        $empleadosSalida=[];
        $user=User::UserAuth();
        // $empleados=DB::select("SELECT empleado_clientes.id ,users.name , users.apellido, areas.nombreArea , dependencias.nombreDependencia 
        // ,unidad_negocios.unidadNegocio FROM `empleado_clientes`
        // inner join users on users.id =empleado_clientes.user_id
        // left join empleado_areas on empleado_areas.empleado_id = empleado_clientes.id
        // left join areas on areas.id = empleado_areas.area_id
        // left join dependencias on dependencias.id = areas.dependencia_id
        // left join unidad_negocios on unidad_negocios.id = dependencias.unidad_negocios_id
        // where empleado_clientes.id not in ( select empleado_id from empleado_areas) 
        // or
        // empleado_clientes.id  in ( select empleado_id from empleado_areas where estado = 'activo'
        // and empleado_clientes.admincliente_id=?) AND  NOT empleado_areas.estado = 'desactivo' ",[$user->admincliente_id]);

        $empleadosNuevos=EmpleadoCliente::whereNotIn('id',DB::table('empleado_areas')->groupBy('empleado_id')->select('empleado_id'))
                                        ->get();

        $empleadosAntiguos=DB::select("SELECT empleado_areas.empleado_id from empleado_areas
        where empleado_areas.empleado_id not in (select empleado_id from empleado_areas 
        where estado = 'activo')
        GROUP BY (empleado_areas.empleado_id)");

                                    //dd($empleadosAntiguos);

            $empleados=DB::select("SELECT empleado_clientes.id ,users.name , users.apellido, areas.nombreArea , dependencias.nombreDependencia 
            ,unidad_negocios.unidadNegocio FROM `empleado_clientes`
            inner join users on users.id =empleado_clientes.user_id
            left join empleado_areas on empleado_areas.empleado_id = empleado_clientes.id
            left join areas on areas.id = empleado_areas.area_id
            left join dependencias on dependencias.id = areas.dependencia_id
            left join unidad_negocios on unidad_negocios.id = dependencias.unidad_negocios_id
            where empleado_areas.estado = 'activo'");

            foreach($empleadosNuevos as $empleado)
            {
                $infoEmpleado=User::where('id',$empleado->user_id)->first();
                $objeto=(object)['id'=>$empleado->id, 'name'=>$infoEmpleado->name , 'apellido'=>$infoEmpleado->apellido,
                        'nombreArea'=>'' , 'nombreDependencia'=>'' ,'nombreDependencia'=>'','unidadNegocio'=>''];
                array_push($empleadosSalida,$objeto);        
            }

            foreach($empleadosAntiguos as $empleado)
            {
            
                $infoEmpleado=User::select('users.name','users.apellido','empleado_clientes.id')
                                    ->join('empleado_clientes','empleado_clientes.user_id','=','users.id')
                                    ->where('empleado_clientes.id',$empleado->empleado_id)
                                    ->first();
                                    
                $objeto=(object)['id'=>$empleado->empleado_id, 'name'=>$infoEmpleado->name , 'apellido'=>$infoEmpleado->apellido,
                        'nombreArea'=>'' , 'nombreDependencia'=>'' ,'nombreDependencia'=>'','unidadNegocio'=>''];
                array_push($empleadosSalida,$objeto);        
            }

            foreach($empleados as $empleado)
            {

                $objeto=(object)['id'=>$empleado->id, 'name'=>$empleado->name , 'apellido'=>$empleado->apellido,
                        'nombreArea'=>$empleado->nombreArea , 'nombreDependencia'=>$empleado->nombreDependencia , 
                        'nombreDependencia'=>$empleado->nombreDependencia,'unidadNegocio'=>$empleado->unidadNegocio];
                        array_push($empleadosSalida,$objeto); 
            }
    
            
        $unidades=UnidadNegocio::where('estado','activo')->where('admincliente_id',$user->admincliente_id)->get();
       
        
        return view('unidadnegocio.indexAreactual',compact('empleadosSalida','unidades'));
    }

    
    // asignacion grupal desde el a vista de empleados 
    public function asignacionGrupalEmpleados(Request $request)
    {
        EmpleadoArea::whereIn('empleado_id',$request->empleados)->where('estado','activo')->update(['estado'=>'desactivo']);

        foreach($request->empleados as $empleado)
        {
            $asignacion=new EmpleadoArea();
            $asignacion->empleado_id=$empleado;
            $asignacion->area_id=$request->area;
            $asignacion->estado='activo';
            $asignacion->save();
        }
        return response()->json('creados');
    }

    // metodo de asignacion de empleados a las diferentes areas disponibles. desde el panel de gestion 

    public function asignacionEmpleado(Area $area,Request $request)
    {
      
        foreach($request->empleados as $empleado)
        {
           $area1= new EmpleadoArea();
           $area1->empleado_id=$empleado;
           $area1->area_id=$area->id;
           $area1->estado='activo';
           $area1->save();
        }

        return back()->with('success','empleados asigandos satisfactoriamente');
    }



    // METODOS DE AJAX

    public function dependenciaUnidad($unidad)
    {
        $dependencias=Dependencia::where('estado','activo')->where('unidad_negocios_id',$unidad)->get();
        return response()->json(['dependencias'=>$dependencias],200);
    }

    public function AreaDepedencia($dependencia)
    {
        $areas=Area::where('estado','activo')->where('dependencia_id',$dependencia)->get();
        return response()->json(['areas'=>$areas],200);
    }

}
