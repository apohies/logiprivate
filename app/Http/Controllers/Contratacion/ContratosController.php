<?php

namespace App\Http\Controllers\Contratacion;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\parametricas\tipoContrato;
use App\User;
Use Auth;
use App\Contratacion\Contrato;
use App\Contratacion\Clausula;

class ContratosController extends Controller
{
    function inicio()
    {
        return view('contratos.inicio');
    }

    function indexTipocontrato()
    {
        $contratos=tipoContrato::all();
        return view('contratos.tipo_contrato_index',compact('contratos'));
    }

    function indexContratos()
    {
        $user=User::UserAuth();
        $contratos=Contrato::where('admincliente_id',$user->admincliente_id)
                            ->join('tipo_contratos','tipo_contratos.id','=','contratos.tipoContrato_id')
                            ->select('contratos.*','tipo_contratos.nombreTipocontrato')->get();

        return view('contratos.contratos_index',compact('contratos'));
    }

    function createContrato()
    {
        $user=User::UserAuth();

        $tipoContratos=tipoContrato::all();

        $clausulas=Clausula::whereNull('admincliente_id')
        ->orWhere('admincliente_id',$user->admincliente_id)
        ->get();

        return view('contratos.crear_contrato',compact('clausulas','tipoContratos'));
    }


    function indexClausulas()
    {
        $user=User::UserAuth();

        $clausulas=Clausula::whereNull('admincliente_id')
                            ->orWhere('admincliente_id',$user->admincliente_id)
                            ->get();

        return view('contratos.index_clausulas',compact('clausulas'));
    }

    function createClausula()
    {

            return view('contratos.crear_clausula');
    }

    function storeClausula(Request $request)
    {
     
        $user=User::UserAuth();

     $clausula= new Clausula();
     $clausula->nombreClausula=$request->nombreClausula;
     $clausula->descripcionCorta=$request->descripcionCorta;
     $clausula->descripcionCompleta=$request->descripcionCompleta;
     $clausula->admincliente_id=$user->admincliente_id;
     $clausula->creador=$user->id;
     $clausula->save();

     return redirect()->route('contratacion.indexClausulas');

    }

}
