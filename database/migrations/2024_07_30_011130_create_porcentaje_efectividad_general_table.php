<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePorcentajeEfectividadGeneralTable extends Migration
{
    public function up()
    {
        Schema::create('porcentaje_efectividad_general', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('sala_id');
            $table->unique(['user_id', 'sala_id']);
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('sala_id')->references('id')->on('salas')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('porcentaje_efectividad_general');
    }
}
