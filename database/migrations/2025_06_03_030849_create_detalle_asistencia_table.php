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
        Schema::create('detalle_asistencia', function (Blueprint $table) {
            $table->id('idDetalleAsistencia');
            $table->integer('estado');
            $table->string('detalle');

            $table->integer('carnetEstudiante');
            $table->foreign('carnetEstudiante')
            ->references('carnet')
            ->on('estudiantes')-> onDelete('cascade');

            $table->foreignId('idAsistencia')
            ->references('idAsistencia')
            ->on('asistencias')-> onDelete('cascade');
            $table->timestamps();

            $table->integer('habilitado'); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detalle_asistencia');
    }
};
