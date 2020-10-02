<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEntidadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entidads', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nitEntidad');
            $table->string('nombreEntidad');
            $table->string('direccionEntidad')->nullable();
            $table->string('codigoEntidad');
            $table->unsignedInteger('admincliente_id')->nullable();
            $table->unsignedInteger('tipoEntidad_id');
            $table->timestamps();

            $table->foreign('admincliente_id')->references('id')->on('adminclientes');
            $table->foreign('tipoEntidad_id')->references('id')->on('tipo_entidades');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('entidads');
    }
}
