<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBancoReactivosTable extends Migration
{
    public function up()
    {
        Schema::create('banco_reactivos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('docente_id');
            $table->unsignedBigInteger('reactivo_id');
            $table->foreign('docente_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('reactivo_id')->references('id')->on('reactivos')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('banco_reactivos');
    }
}
