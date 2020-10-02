<?php

use Illuminate\Database\Seeder;

class TipoDocumentoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipo_documentos')->insert([

           
            'tipoDocumento'=>'Cédula Ciudadanía'
    
            ]);
    
            DB::table('tipo_documentos')->insert([
    
            'tipoDocumento'=>'NIT'
    
            ]);
    
            DB::table('tipo_documentos')->insert([
    
            'tipoDocumento'=>'NN'
    
            ]);
    
            DB::table('tipo_documentos')->insert([
    
            'tipoDocumento'=>'Pasaporte'
    
            ]);


             DB::table('tipo_documentos')->insert([
    
            'tipoDocumento'=>'Cédula de Extranjería'
            
             ]);

             DB::table('tipo_documentos')->insert([
    
                'tipoDocumento'=>'Permiso Laboral'
                
                 ]);

             }


}
