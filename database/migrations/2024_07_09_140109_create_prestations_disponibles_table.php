<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('prestations_disponibles', function (Blueprint $table) {
            $table->id('idPrestationDisponible');
            $table->integer('idPrestataire');
            $table->string('nomPrestationDisponible', 50)->nullable();
            $table->decimal('coutPrestationDisponible', 8, 2)->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('prestations_disponibles');
    }
};
