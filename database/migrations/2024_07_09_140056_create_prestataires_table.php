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
        Schema::create('prestataires', function (Blueprint $table) {
            $table->id('idPrestataire');
            $table->string('nomPrestataire', 128)->nullable();
            $table->string('telephonePrestataire', 11)->nullable();
            $table->string('adressePrestataire', 128)->nullable();
            $table->binary('logoPrestataire')->nullable();
            $table->binary('conventionPrestataire')->nullable();
            $table->string('categoriePrestataire', 15)->nullable();
            $table->smallInteger('statutPrestataire')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('prestataires');
    }
};
