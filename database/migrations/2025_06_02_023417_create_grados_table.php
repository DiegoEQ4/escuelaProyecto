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
        Schema::create('grados', function (Blueprint $table) {
            $table->id('idGrado');
            $table->string('nombre');
            $table->string('seccion');
            $table->integer('cupos');
            $table->double('orden');
            $table->integer('tiempo'); //AÑO EN QUE SE IMPARTIO
            $table->timestamps();
            $table->integer('habilitado'); 

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('grados');
    }
};
