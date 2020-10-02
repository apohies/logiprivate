<?php

use Illuminate\Database\Seeder;
use App\parametricas\Rh;

class RhTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $rh=new Rh();
        $rh->tipoSangre='O-';
        $rh->save();

        $rh=new Rh();
        $rh->tipoSangre='0+';
        $rh->save();

        $rh=new Rh();
        $rh->tipoSangre='A-';
        $rh->save();

        $rh=new Rh();
        $rh->tipoSangre='A+';
        $rh->save();

        $rh=new Rh();
        $rh->tipoSangre='B-';
        $rh->save();

        $rh=new Rh();
        $rh->tipoSangre='AB-';
        $rh->save();

        $rh=new Rh();
        $rh->tipoSangre='AB+';
        $rh->save();
        
    
    }
}
