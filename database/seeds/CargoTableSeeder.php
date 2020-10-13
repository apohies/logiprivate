<?php

use Illuminate\Database\Seeder;
use App\Cargos\Cargo;

class CargoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cargo = new Cargo();
        $cargo->nombreCargo="Analista profesional I";
        $cargo->codigoCargo="102045";
        $cargo->admincliente_id=1;
        $cargo->save();

        $cargo = new Cargo();
        $cargo->nombreCargo="Analista profesional II";
        $cargo->codigoCargo="234354";
        $cargo->admincliente_id=1;
        $cargo->save();

        $cargo = new Cargo();
        $cargo->nombreCargo="Administrativo I";
        $cargo->codigoCargo="567567567";
        $cargo->admincliente_id=1;
        $cargo->save();

        $cargo = new Cargo();
        $cargo->nombreCargo="Administrativo II";
        $cargo->codigoCargo="56534";
        $cargo->admincliente_id=1;
        $cargo->save();

        $cargo = new Cargo();
        $cargo->nombreCargo="Servicios Generales";
        $cargo->codigoCargo="4543234";
        $cargo->admincliente_id=1;
        $cargo->save();
    }
}
