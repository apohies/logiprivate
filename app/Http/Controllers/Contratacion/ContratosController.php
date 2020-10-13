<?php

namespace App\Http\Controllers\Contratacion;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\parametricas\tipoContrato;
use App\User;
Use Auth;
use App\Contratacion\Contrato;
use App\Contratacion\Clausula;
use App\Contratacion\ContratoClausula;
use DB;

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

    function storeContrato(Request $request)
    {
        $user=User::UserAuth();

        $contrato = new Contrato();
        $contrato->nombreContrato=$request->nombreContrato;
        $contrato->descripcionContrato=$request->descripcionContrato;
        $contrato->codigoContrato=$request->codigoContrato;
        $contrato->tipoContrato_id=$request->tipoContrato_id;
        $contrato->admincliente_id=$user->admincliente_id;
        $contrato->creador=$user->id;
        $contrato->save();


        $clausulas=$request->clausulas[0];
        $arrayClausulas= explode(',',$clausulas);

        for($i=0 ; $i < count($arrayClausulas) ; $i++)
        {
            $nuevo = new ContratoClausula();
            $nuevo->contrato_id=$contrato->id;
            $nuevo->clausula_id=$arrayClausulas[$i];
            $nuevo->save();
        }

            
        return redirect()->route('contratacion.indexContratos');
            
    }

    function clausulaContrato(Contrato $contrato)
    {
        
        $clausulas=DB::table('contrato_clausulas')
            ->join('contratos','contratos.id','=','contrato_clausulas.contrato_id')
            ->join('clausulas','clausulas.id','=','contrato_clausulas.clausula_id')
            ->select('clausulas.*')
            ->where('contratos.id',$contrato->id)
            ->get();

        return view('contratos.clausulas_contrato',compact('clausulas','contrato'));
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
