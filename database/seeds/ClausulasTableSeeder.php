<?php

use Illuminate\Database\Seeder;
use App\Contratacion\Clausula;

class ClausulasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $clausula= new Clausula();
        $clausula->nombreClausula="clausula 1";
        $clausula->descripcionCorta="descripcion basica de la clausula 1";
        $clausula->descripcionCompleta="Informacion completa de la clausula 1";
        $clausula->save();

        $clausula= new Clausula();
        $clausula->nombreClausula="clausula 2";
        $clausula->descripcionCorta="descripcion basica de la clausula 2";
        $clausula->descripcionCompleta="Informacion completa de la clausula 2";
        $clausula->save();
    }
}
