<?php

namespace App\Http\Controllers\CentroCostos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\CentroCostos\CentroCosto;
use App\CentroCostos\CentrocostoTiempo;
use App\Administracion\Admincliente;
use Auth;


class CentroCostosController extends Controller
{
    public function index()
    {
        $admincliente = new Admincliente;
        $this->authorize('ver_centro', $admincliente);
        $user=User::UserAuth();
     
        $centros=CentroCosto::where('centro_costos.admincliente_id',$user->admincliente_id)
                ->join('centrocosto_tiempos','centrocosto_tiempos.centro_id','=','centro_costos.id')
                ->where('centrocosto_tiempos.estado','activo')
                ->select('centro_costos.id','centro_costos.nombreCentro','centro_costos.descripcionCentro','centro_costos.estado','centrocosto_tiempos.periodo')
                ->get();


        return view('centrocostos.index',compact('centros'));

    }

    public function store(Request $request)
    {
        
        $validate=$request->validate([
            'nombreCentro'=>'required',
            'periodo'=>'required'
            ]);
            
        $user=User::UserAuth();

        $centro=new CentroCosto();    
        $centro->nombreCentro=$request->nombreCentro;
        $centro->descripcionCentro=$request->descripcionCentro;
        $centro->admincliente_id=$user->admincliente_id;
        $centro->estado="activo";
        $centro->save();

        $periodo= new CentrocostoTiempo();
        $periodo->centro_id=$centro->id;
        $periodo->periodo=$request->periodo;
        $periodo->estado="activo";
        $periodo->save();

        return  back()->with('success','Ha sido creado el centro de costos');
    }
}
