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
        Schema::create('details_prestations', function (Blueprint $table) {
            $table->integer('idPrestationSupporte');
            $table->integer('idFiche');
            $table->decimal('coutTotal', 8, 2)->nullable();
            $table->decimal('partMutuelle', 8, 2)->nullable();
            $table->decimal('partMutuelleReel', 8, 2)->nullable();
            $table->primary(['idPrestationSupporte', 'idFiche']);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('details_prestations');
    }
};
