<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCentroCostosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('centro_costos', function (Blueprint $table) {
            $table->increments('id');
            $table->enum('estado',['activo','inactivo']);
            $table->string('nombreCentro');
            $table->longText('descripcionCentro')->nullable();
            $table->unsignedInteger('admincliente_id');
            $table->timestamps();
            $table->foreign('admincliente_id')->references('id')->on('adminclientes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('centro_costos');
    }
}
