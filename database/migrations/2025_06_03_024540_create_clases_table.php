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
        Schema::create('clases', function (Blueprint $table) {
            $table->id('idClase');
            $table->string('contenidoClase');
            $table->double('duracion');// EN HORAS HORAS


            $table->foreignId('idMateriaDetalle')
            ->references('idMateriaDetalle')
            ->on('materia_detalle')-> onDelete('cascade') ;


            $table->timestamps();

            $table->integer('habilitado'); 

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clases');
    }
};
