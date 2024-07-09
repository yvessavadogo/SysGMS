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
        Schema::create('prestations_supportes', function (Blueprint $table) {
            $table->id('idPrestationSupporte');
            $table->string('nomPrestationSupporte', 50)->nullable();
            $table->decimal('plafondPrestationSupporte', 8, 2)->nullable();
            $table->decimal('tauxPrestationSupporte', 8, 2)->nullable();
            $table->string('observationPrestationSupporte', 128)->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('prestations_supportes');
    }
};
