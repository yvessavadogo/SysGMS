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
        Schema::create('mutualistes', function (Blueprint $table) {
            $table->id('idMutualiste');
            $table->integer('idAssure');
            $table->string('matriculeMutualiste', 10)->nullable();
            $table->string('categorieMutualiste', 20)->nullable();
            $table->string('serviceMutualiste', 128)->nullable();
            $table->string('fonctionMutualiste', 128)->nullable();
            $table->decimal('depensesSante', 8, 2)->default(0)->nullable();
            $table->binary('documentMutualiste')->nullable();
            //$table->primary(['idAssure', 'idMutualiste']);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('mutualistes');
    }
};
