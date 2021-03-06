<?php

use Illuminate\Database\Seeder;
use App\parametricas\tipoContrato;

class tipocontratoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $contrato= new tipoContrato;
         $contrato->nombreTipocontrato="termino definido inferior a un año";
         $contrato->descripcionTipocontrato="descripcion basica";
         $contrato->save();

         $contrato= new tipoContrato;
         $contrato->nombreTipocontrato="contrato termino indefinido";
         $contrato->descripcionTipocontrato="descripcion basica";
         $contrato->save();

         $contrato= new tipoContrato;
         $contrato->nombreTipocontrato="contrato aprendizaje";
         $contrato->descripcionTipocontrato="descripcion basica";
         $contrato->save();

         $contrato= new tipoContrato;
         $contrato->nombreTipocontrato="contrato prestacion de servicio";
         $contrato->descripcionTipocontrato="descripcion basica";
         $contrato->save();

         $contrato= new tipoContrato;
         $contrato->nombreTipocontrato="contrato de practica";
         $contrato->descripcionTipocontrato="descripcion basica";
         $contrato->save();

    }
}
