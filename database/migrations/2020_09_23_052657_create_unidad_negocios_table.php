<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUnidadNegociosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('unidad_negocios', function (Blueprint $table) {
            $table->increments('id');
            $table->string('unidadNegocio');
            $table->string('direccionNegocio');
            $table->enum('estado',['activo','desactivo'])->default('desactivo');
            $table->string('unidadCodigo')->nullable();
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
        Schema::dropIfExists('unidad_negocios');
    }
}
