<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCentrocostoTiemposTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('centrocosto_tiempos', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('centro_id');
            $table->enum('periodo',['mensual','quincenal']);
            $table->enum('estado',['activo','inactivo']);
            $table->timestamps();
            
            $table->foreign('centro_id')->references('id')->on('centro_costos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('centrocosto_tiempos');
    }
}
