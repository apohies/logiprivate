<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClausulasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clausulas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombreClausula');
            $table->text('descripcionCorta');
            $table->longText('descripcionCompleta');
            $table->unsignedInteger('admincliente_id')->nullable();
            $table->unsignedInteger('creador')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clausulas');
    }
}
