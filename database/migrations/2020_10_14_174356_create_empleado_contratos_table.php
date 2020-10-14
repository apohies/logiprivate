<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpleadoContratosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empleado_contratos', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('empleado_id');
            $table->unsignedInteger('unidad_negocio_id');
            $table->unsignedInteger('centro_costo_id');
            $table->string('fechaInicio');
            $table->string('fechaFinal')->nullable();
            $table->enum('estado',['activo','inactivo','licencia']);
            $table->string('salario');
            $table->timestamps();

            $table->foreign('empleado_id')->references('id')->on('empleado_clientes');
            $table->foreign('unidad_negocio_id')->references('id')->on('unidad_negocios');
            $table->foreign('centro_costo_id')->references('id')->on('centro_costos');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('empleado_contratos');
    }
}
