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
        Schema::create('asistencias', function (Blueprint $table) {
            $table->id('idAsistencia');
            $table->dateTime('fechaInicio');
            $table->dateTime('fechaFinal');

            $table->foreignId('clase')
            ->references('idClase')
            ->on('clases')-> onDelete('cascade');
             
            $table->timestamps();
            $table->integer('habilitado'); 

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('asistencias');
    }
};
