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
        Schema::table('mutualistes', function (Blueprint $table) {
            $table->foreign('idAssure')->references('idAssure')->on('assures')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('mutualistes', function (Blueprint $table) {
            $table->dropForeign(['idAssure']);
        });
    }
};
