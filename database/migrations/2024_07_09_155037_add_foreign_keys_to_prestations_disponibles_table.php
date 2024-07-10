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
        Schema::table('prestations_disponibles', function (Blueprint $table) {
            $table->foreign('idPrestataire')->references('idPrestataire')->on('prestataires')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('prestations_disponibles', function (Blueprint $table) {
            $table->dropForeign(['idPrestataire']);
        });
    }
};
