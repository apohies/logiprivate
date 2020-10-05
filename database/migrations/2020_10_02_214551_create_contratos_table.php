<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContratosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contratos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombreContrato');
            $table->text('descripcionContrato');
            $table->string('codigoContrato')->nullable();
            $table->unsignedInteger('admincliente_id');
            $table->unsignedInteger('creador');
            $table->unsignedInteger('tipoContrato_id');
            $table->timestamps();

            $table->foreign('creador')->references('id')->on('empleado_clientes');
            $table->foreign('tipoContrato_id')->references('id')->on('empleado_clientes');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contratos');
    }
}
