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
        Schema::create('materia_detalle', function (Blueprint $table) {
            $table->id('idMateriaDetalle');

            $table->foreignId('idGrado')
            ->references('idGrado')
            ->on('grados')-> onDelete('cascade');

            $table->foreignId('idMateria')
            ->references('idMateria')
            ->on('materias')-> onDelete('cascade');

            $table->integer('carnetProfesor');
            
            $table->foreign('carnetProfesor')->references('carnet')
            ->on('profesores')->onDelete('cascade');
            
            $table->timestamps();

            $table->integer('habilitado'); 

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('materia_detalle');
    }
};
