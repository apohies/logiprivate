<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDependenciasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dependencias', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombreDependencia');
            $table->string('descripcionDependencia');
            $table->enum('estado',['activo','desactivo'])->default('desactivo');
            $table->unsignedInteger('unidad_negocios_id');
            //$table->string('codigo');
            $table->timestamps();
            
            $table->foreign('unidad_negocios_id')->references('id')->on('unidad_negocios');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dependencias');
    }
}
