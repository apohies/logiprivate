<?php

use Illuminate\Database\Seeder;
use App\parametricas\EstadoCivil;

class EstadoCivilTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $civil= new EstadoCivil();
        $civil->nombreEstadocivil="Soltero/a";
        $civil->save();

        $civil= new EstadoCivil();
        $civil->nombreEstadocivil="Casado/a";
        $civil->save();

        $civil= new EstadoCivil();
        $civil->nombreEstadocivil="Divorciado/a";
        $civil->save();

        $civil= new EstadoCivil();
        $civil->nombreEstadocivil="Viudo/a";
        $civil->save();

        $civil= new EstadoCivil();
        $civil->nombreEstadocivil="Union Libre";
        $civil->save();

        $civil= new EstadoCivil();
        $civil->nombreEstadocivil="Comprometido/a";
        $civil->save();

    }
}
