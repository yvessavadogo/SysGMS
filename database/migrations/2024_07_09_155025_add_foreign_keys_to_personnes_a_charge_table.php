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
        Schema::table('personnes_a_charge', function (Blueprint $table) {
            $table->foreign('idAssure')->references('idAssure')->on('assures')->onDelete('cascade');
            $table->foreign(['Mut_idAssure', 'idMutualiste'])->references(['idAssure', 'idMutualiste'])->on('mutualistes')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('personnes_a_charge', function (Blueprint $table) {
            $table->dropForeign(['idAssure']);
            $table->dropForeign(['Mut_idAssure', 'idMutualiste']);
        });
    }
};
