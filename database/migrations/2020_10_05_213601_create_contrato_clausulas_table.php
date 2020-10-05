<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContratoClausulasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contrato_clausulas', function (Blueprint $table) {
            $table->unsignedInteger('contrato_id');
            $table->unsignedInteger('clausula_id');
            $table->unsignedInteger('admincliente_id')->nullable();
            $table->timestamps();

            $table->foreign('contrato_id')->references('id')->on('contratos');
            $table->foreign('clausula_id')->references('id')->on('clausulas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contrato_clausulas');
    }
}
