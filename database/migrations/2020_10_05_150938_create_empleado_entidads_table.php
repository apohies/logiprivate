<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpleadoEntidadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empleado_entidads', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('empleado_id');
            $table->unsignedInteger('tipoEntidad_id');
            $table->enum('tipocuenta',['Corriente','Ahorros'])->nullable();
            $table->string('numeroCuenta')->nullable();
            $table->timestamps();

            $table->foreign('empleado_id')->references('id')->on('empleado_clientes');
            $table->foreign('tipoEntidad_id')->references('id')->on('tipo_contratos');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('empleado_entidads');
    }
}
