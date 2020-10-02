<?php

use Illuminate\Database\Seeder;
use App\parametricas\Departamento;

class DepartamentosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $departamento= new Departamento;
        $departamento->nombreDepartamento="Amazonas";
        $departamento->save();

        $departamento= new Departamento;
        $departamento->nombreDepartamento="Antioquia";
        $departamento->save();

        $departamento= new Departamento;
        $departamento->nombreDepartamento="Arauca";
        $departamento->save();

        $departamento= new Departamento;
        $departamento->nombreDepartamento="Bogotá";
        $departamento->save();

        $departamento= new Departamento;
        $departamento->nombreDepartamento="Bolivar";
        $departamento->save();

        $departamento= new Departamento;
        $departamento->nombreDepartamento="Boyacá";
        $departamento->save();

        $departamento= new Departamento;
        $departamento->nombreDepartamento="Caldas";
        $departamento->save();

        $departamento= new Departamento;
        $departamento->nombreDepartamento="Caquetá";
        $departamento->save();

        $departamento= new Departamento;
        $departamento->nombreDepartamento="Casanare";
        $departamento->save();

        $departamento= new Departamento;
        $departamento->nombreDepartamento="Cauca";
        $departamento->save();

        $departamento= new Departamento;
        $departamento->nombreDepartamento="Cesar";
        $departamento->save();

        $departamento= new Departamento;
        $departamento->nombreDepartamento="Chocó";
        $departamento->save();

        $departamento= new Departamento;
        $departamento->nombreDepartamento="Cordoba";
        $departamento->save();

        $departamento= new Departamento;
        $departamento->nombreDepartamento="Cundinamarca";
        $departamento->save();

        $departamento= new Departamento;
        $departamento->nombreDepartamento="Guainia";
        $departamento->save();

        $departamento= new Departamento;
        $departamento->nombreDepartamento="Guaviare";
        $departamento->save();

        $departamento= new Departamento;
        $departamento->nombreDepartamento="Huila";
        $departamento->save();

        $departamento= new Departamento;
        $departamento->nombreDepartamento="Guajira";
        $departamento->save();

        $departamento= new Departamento;
        $departamento->nombreDepartamento="Magdalena";
        $departamento->save();

        $departamento= new Departamento;
        $departamento->nombreDepartamento="Meta";
        $departamento->save();

        $departamento= new Departamento;
        $departamento->nombreDepartamento="Nariño";
        $departamento->save();

        $departamento= new Departamento;
        $departamento->nombreDepartamento="Norte Santander";
        $departamento->save();

        $departamento= new Departamento;
        $departamento->nombreDepartamento="Putumayo";
        $departamento->save();

        $departamento= new Departamento;
        $departamento->nombreDepartamento="Quindio";
        $departamento->save();

        $departamento= new Departamento;
        $departamento->nombreDepartamento="Risaralda";
        $departamento->save();

        $departamento= new Departamento;
        $departamento->nombreDepartamento="San Andres y Providencia";
        $departamento->save();

        $departamento= new Departamento;
        $departamento->nombreDepartamento="Santander";
        $departamento->save();

        $departamento= new Departamento;
        $departamento->nombreDepartamento="Sucre";
        $departamento->save();

        $departamento= new Departamento;
        $departamento->nombreDepartamento="Tolima";
        $departamento->save();

        $departamento= new Departamento;
        $departamento->nombreDepartamento="Valle del Cauca";
        $departamento->save();

        $departamento= new Departamento;
        $departamento->nombreDepartamento="Vaupés";
        $departamento->save();

        $departamento= new Departamento;
        $departamento->nombreDepartamento="Vichada";
        $departamento->save();
    }

}
