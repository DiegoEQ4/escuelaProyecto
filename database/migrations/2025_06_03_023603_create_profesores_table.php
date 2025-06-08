<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('profesores', function (Blueprint $table) {
            $table->integer('carnet')->primary();
            $table->string('nombre',100);
            $table->string('apellido',100);
            $table->string('correo',255);
            $table->date('fechaNacimiento');
            $table->string('titulo',255);
            $table->string('telefono',9);
            $table->timestamps();
            $table->integer('habilitado'); 


            $table->foreignId('idUsuario')
            ->references('idUsuario')
            ->on('usuarios');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profesores');
    }
};
