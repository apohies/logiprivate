<?php

use Illuminate\Database\Seeder;
use App\parametricas\Pais;

class PaisesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pais= new Pais();
        $pais->nombrePais="Colombia";
        $pais->save();

        $pais= new Pais();
        $pais->nombrePais="Venezuela";
        $pais->save();

        $pais= new Pais();
        $pais->nombrePais="Ecuador";
        $pais->save();

        $pais= new Pais();
        $pais->nombrePais="Brazil";
        $pais->save();

        $pais= new Pais();
        $pais->nombrePais="Peru";
        $pais->save();

        $pais= new Pais();
        $pais->nombrePais="Bolivia";
        $pais->save();

        $pais= new Pais();
        $pais->nombrePais="Chile";
        $pais->save();

        $pais= new Pais();
        $pais->nombrePais="Uruguay";
        $pais->save();

        $pais= new Pais();
        $pais->nombrePais="Argentina";
        $pais->save();

        $pais= new Pais();
        $pais->nombrePais="Paraguay";
        $pais->save();

        $pais= new Pais();
        $pais->nombrePais="Mexico";
        $pais->save();


    }
}
