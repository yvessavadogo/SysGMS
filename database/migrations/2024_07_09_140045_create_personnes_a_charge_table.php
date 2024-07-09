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
        Schema::create('personnes_a_charge', function (Blueprint $table) {
            $table->integer('idAssure');
            $table->integer('idPAC');
            $table->integer('Mut_idAssure');
            $table->integer('idMutualiste');
            $table->string('affilliationPAC', 15)->nullable();
            $table->binary('documentAffiliationPAC')->nullable();
            $table->binary('certificatScolarite')->nullable();
            $table->primary(['idAssure', 'idPAC']);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('personnes_a_charge');
    }
};
