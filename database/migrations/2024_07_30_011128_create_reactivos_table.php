<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReactivosTable extends Migration
{
    public function up()
    {
        Schema::create('reactivos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('tipo');
            $table->string('dificultad');
            $table->string('pregunta');
            $table->string('respuesta');
            $table->string('distractor_1');
            $table->string('distractor_2');
            $table->string('feedback');
            $table->string('oracionCorrecta');
        });
    }

    public function down()
    {
        Schema::dropIfExists('reactivos');
    }
}
