<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCargosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cargos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombreCargo');
            $table->string('codigoCargo');
            $table->unsignedInteger('admincliente_id');
            $table->unsignedInteger('creador')->nullable();
            $table->timestamps();

            $table->foreign('admincliente_id')->references('id')->on('adminclientes');
            $table->foreign('creador')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cargos');
    }
}
