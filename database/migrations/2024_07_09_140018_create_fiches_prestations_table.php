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
        Schema::create('fiches_prestations', function (Blueprint $table) {
            $table->id('idFiche');
            $table->integer('idAssure');
            $table->integer('idPaiement');
            $table->date('datePrestation')->nullable();
            $table->decimal('montantFacturePrestation', 8, 2)->nullable();
            $table->decimal('montantReelPrestation', 8, 2)->nullable();
            $table->binary('dossierPrestation')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('fiches_prestations');
    }
};
