<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalasTable extends Migration
{
    public function up()
    {
        Schema::create('salas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('codigo_sala')->unique();
            $table->string('nombre');
            $table->string('descripcion')->nullable();
            $table->text('dificultades')->default('0');
            $table->integer('id_administrador');
            $table->text('temas')->default('4');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('salas');
    }
}
