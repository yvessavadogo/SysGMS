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
        Schema::create('assures', function (Blueprint $table) {
            $table->id('idAssure');
            $table->string('nomAssure', 30)->nullable();
            $table->string('prenomAssure', 60)->nullable();
            $table->date('dateNaissanceAssure')->nullable();
            $table->char('sexeAssure', 1)->check('sexeAssure IN ("M", "F")');
            $table->string('telephoneAssure', 11)->nullable();
            $table->string('adresseAssure', 128)->nullable();
            $table->smallInteger('statutAssure')->nullable();
            $table->binary('photoAssure')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('assures');
    }
};
