<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhbsJentikNyamukTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('phbs_jentik_nyamuk', function (Blueprint $table) {
            $table->id();
            $table->integer('user_detail_id');
            $table->boolean('jn_menguras');
            $table->boolean('jn_menutup');
            $table->boolean('jn_mengubur');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('phbs_jentik_nyamuk');
    }
}
