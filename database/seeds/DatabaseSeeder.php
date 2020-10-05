<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {


        // parametricas
        $this->call(TipoDocumentoTableSeeder::class);
        $this->call(PaisesTableSeeder::class);
        $this->call(DepartamentosTableSeeder::class);
        $this->call(EstadoCivilTableSeeder::class);
        $this->call(RhTableSeeder::class);
        $this->call(TipoEntidadTableSeeder::class);
        $this->call(tipocontratoTableSeeder::class);
        $this->call(ClausulasTableSeeder::class);
        
        
        // fin para metriacs
        
        $this->call(ModulosTableSeeder::class);
        $this->call(PermissionTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(EntidadesTableSeeder::class);
    }
}
