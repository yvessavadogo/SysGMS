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
        Schema::table('details_prestations', function (Blueprint $table) {
            $table->foreign('idFiche')->references('idFiche')->on('fiches_prestations')->onDelete('cascade');
            $table->foreign('idPrestationSupporte')->references('idPrestationSupporte')->on('prestations_supportes')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('details_prestations', function (Blueprint $table) {
            $table->dropForeign(['idFiche']);
            $table->dropForeign(['idPrestationSupporte']);
        });
    }
};
