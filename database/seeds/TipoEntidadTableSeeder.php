<?php

use Illuminate\Database\Seeder;
use App\parametricas\TipoEntidades;

class TipoEntidadTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $entidad= new TipoEntidades();
        $entidad->tipoEntidad="Banco";
        $entidad->save();

        $entidad= new TipoEntidades();
        $entidad->tipoEntidad="Prestadora salud";
        $entidad->save();

        $entidad= new TipoEntidades();
        $entidad->tipoEntidad="ARL";
        $entidad->save();

        $entidad= new TipoEntidades();
        $entidad->tipoEntidad="Pensiones Y Cesantias";
        $entidad->save();

        $entidad= new TipoEntidades();
        $entidad->tipoEntidad="Coperativa";
        $entidad->save();

        $entidad= new TipoEntidades();
        $entidad->tipoEntidad="Caja compensacion";
        $entidad->save();

        $entidad= new TipoEntidades();
        $entidad->tipoEntidad="Aseguradora";
        $entidad->save();


    }
}
