<?php

use Illuminate\Database\Seeder;
use App\Entidades\Entidad;

class EntidadesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $entidad= new Entidad();
        $entidad->nombreEntidad="BANCOLOMBIA";
        $entidad->nitEntidad="1121212121-1";
        $entidad->direccionEntidad="calle 123 # 45 -56";
       
        $entidad->codigoEntidad="102010";
        $entidad->admincliente_id=1;
        $entidad->tipoEntidad_id=1;
        $entidad->save();

        $entidad= new Entidad();
        $entidad->nombreEntidad="BANCO BOGOTA";
        $entidad->nitEntidad="3343434343-1";
        $entidad->direccionEntidad="calle 100 # 45 -56";
     
        $entidad->codigoEntidad="5665456";
        $entidad->admincliente_id=1;
        $entidad->tipoEntidad_id=1;
        $entidad->save();

        $entidad= new Entidad();
        $entidad->nombreEntidad="COLPATRIA";
        $entidad->nitEntidad="5454545454-1";
        $entidad->direccionEntidad="calle 56 # 56 -56";
      
        $entidad->codigoEntidad="342342";
        $entidad->admincliente_id=1;
        $entidad->tipoEntidad_id=1;
        $entidad->save();


        $entidad= new Entidad();
        $entidad->nombreEntidad="SALUDTOTAL";
        $entidad->nitEntidad="7897897789-1";
        $entidad->direccionEntidad="calle 56 # 56 -56";
        
        $entidad->codigoEntidad="6767676";
        $entidad->admincliente_id=1;
        $entidad->tipoEntidad_id=2;
        $entidad->save();

        $entidad= new Entidad();
        $entidad->nombreEntidad="COLSANITAS";
        $entidad->nitEntidad="75675670-1";
        $entidad->direccionEntidad="calle 45 # 12 -56";
        
        $entidad->codigoEntidad="3453435";
        $entidad->admincliente_id=1;
        $entidad->tipoEntidad_id=2;
        $entidad->save();

        $entidad= new Entidad();
        $entidad->nombreEntidad="NUEVA EPS";
        $entidad->nitEntidad="6786786678-1";
        $entidad->direccionEntidad="calle 45 # 12 -56";
      
        $entidad->codigoEntidad="354345345";
        $entidad->admincliente_id=1;
        $entidad->tipoEntidad_id=2;
        $entidad->save();

        $entidad= new Entidad();
        $entidad->nombreEntidad="SURA";
        $entidad->nitEntidad="543543453-1";
        $entidad->direccionEntidad="calle  78 # 12 -56";
      
        $entidad->codigoEntidad="354345345";
        $entidad->admincliente_id=1;
        $entidad->tipoEntidad_id=3;
        $entidad->save();

        $entidad= new Entidad();
        $entidad->nombreEntidad="AXA";
        $entidad->nitEntidad="56567565-1";
        $entidad->direccionEntidad="calle 47 # 12 -56";
        
        $entidad->codigoEntidad="4654642";
        $entidad->admincliente_id=1;
        $entidad->tipoEntidad_id=3;
        $entidad->save();

        $entidad= new Entidad();
        $entidad->nombreEntidad="POSITIVA";
        $entidad->nitEntidad="3453453-1";
        $entidad->direccionEntidad="calle 90 # 12 -56";
        
        $entidad->codigoEntidad="098765";
        $entidad->admincliente_id=1;
        $entidad->tipoEntidad_id=3;
        $entidad->save();


        $entidad= new Entidad();
        $entidad->nombreEntidad="COLPENSIONES";
        $entidad->nitEntidad="890809890-1";
        $entidad->direccionEntidad="calle 90 # 12 -56";
    
        $entidad->codigoEntidad="098765";
        $entidad->admincliente_id=1;
        $entidad->tipoEntidad_id=4;
        $entidad->save();

        $entidad= new Entidad();
        $entidad->nombreEntidad="COLFONDOS";
        $entidad->nitEntidad="3543453543-1";
        $entidad->direccionEntidad="calle 90 # 12 -56";
      
        $entidad->codigoEntidad="098765";
        $entidad->admincliente_id=1;
        $entidad->tipoEntidad_id=4;
        $entidad->save();

        $entidad= new Entidad();
        $entidad->nombreEntidad="PROTECCION";
        $entidad->nitEntidad="3453453543-1";
        $entidad->direccionEntidad="calle 90 # 12 -56";
     
        $entidad->codigoEntidad="098765";
        $entidad->admincliente_id=1;
        $entidad->tipoEntidad_id=4;
        $entidad->save();


    }
}
