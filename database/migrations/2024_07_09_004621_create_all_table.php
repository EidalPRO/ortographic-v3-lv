<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        // Tabla roles
        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->text('description')->nullable();
            $table->timestamps();
        });

        // Tabla salas
        Schema::create('salas', function (Blueprint $table) {
            $table->id();
            $table->string('codigo_sala')->unique();
            $table->string('nombre');
            $table->text('descripcion')->nullable();
            $table->integer('dificultades')->default(0);
            $table->timestamps();
        });

        // Tabla reactivos
        Schema::create('reactivos', function (Blueprint $table) {
            $table->id();
            $table->string('tipo');
            $table->string('dificultad');
            $table->string('pregunta', 500);
            $table->string('respuesta', 500);
            $table->string('distractor_1', 250);
            $table->string('distractor_2', 250);
            $table->string('feedback', 700);
            $table->string('oracionCorrecta', 500);
            $table->timestamps();
        });

        // Tabla user_role
        Schema::create('user_role', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('role_id');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
        });

        // Tabla usuario_sala_actual
        Schema::create('usuario_sala_actual', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('sala_id');
            $table->timestamps();

            $table->unique(['user_id', 'sala_id']);
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('sala_id')->references('id')->on('salas')->onDelete('cascade');
        });

        // Tabla banco_reactivos
        Schema::create('banco_reactivos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('docente_id');
            $table->unsignedBigInteger('reactivo_id');
            $table->timestamps();

            $table->foreign('docente_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('reactivo_id')->references('id')->on('reactivos')->onDelete('cascade');
        });

        // Tabla estadisticas
        Schema::create('estadisticas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('sala_id');
            $table->string('tema');
            $table->string('dificultad');
            $table->integer('tiempo_usado')->default(0);
            $table->integer('reactivos_acertados')->default(0);
            $table->integer('reactivos_fallados')->default(0);
            $table->float('porcentaje_efectividad')->default(0);
            $table->timestamps();

            $table->unique(['user_id', 'sala_id', 'tema', 'dificultad']);
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('sala_id')->references('id')->on('salas')->onDelete('cascade');
        });

        // Tabla porcentaje_efectividad_general
        Schema::create('porcentaje_efectividad_general', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('sala_id');
            $table->float('porcentaje_efectividad')->default(0);
            $table->timestamps();

            $table->unique(['user_id', 'sala_id']);
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('sala_id')->references('id')->on('salas')->onDelete('cascade');
        });

        // Más tablas y relaciones aquí...
    }

    public function down()
    {
        // Drop todas las tablas si es necesario (para deshacer la migración)
        Schema::dropIfExists('porcentaje_efectividad_general');
        Schema::dropIfExists('estadisticas');
        Schema::dropIfExists('banco_reactivos');
        Schema::dropIfExists('usuario_sala_actual');
        Schema::dropIfExists('user_role');
        Schema::dropIfExists('reactivos');
        Schema::dropIfExists('salas');
        Schema::dropIfExists('roles');
        // Otras tablas aquí...
    }
};
