<?php

use Illuminate\Database\Seeder;
use App\Administracion\Modulo;

class ModulosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $modulo= new Modulo();
        $modulo->nombreModulo="Super Administrador";
        $modulo->save();

        $modulo1= new Modulo();
        $modulo1->nombreModulo="Administrador Cliente";
        $modulo1->save();

        $modulo1= new Modulo();
        $modulo1->nombreModulo="Test Aliance";
        $modulo1->save();


    }
}
