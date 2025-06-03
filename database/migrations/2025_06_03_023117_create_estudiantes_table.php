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
        Schema::create('estudiantes', function (Blueprint $table) {
            $table->integer('carnet')->primary();
            $table->string('nombre',100);
            $table->string('apellido',100);
            $table->string('correo',255);
            $table->date('fechaNacimiento');
            $table->timestamps();

            $table->foreignId('idUsuario')
            ->references('idUsuario')
            ->on('usuarios');

            $table->foreignId('idGrado')
            ->references('idGrado')
            ->on('grados');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('estudiantes');
    }
};
