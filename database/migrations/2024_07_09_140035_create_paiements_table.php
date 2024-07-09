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
        Schema::create('paiements', function (Blueprint $table) {
            $table->id('idPaiement');
            $table->integer('idPrestataire');
            $table->date('dateReceptionFacture')->nullable();
            $table->decimal('montantTotalFacture', 8, 2)->nullable();
            $table->decimal('montantTotalReel', 8, 2)->nullable();
            $table->binary('factureRecue')->nullable();
            $table->string('statutPaiement', 15)->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('paiements');
    }
};
