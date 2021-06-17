<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhbsAirBersihTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('phbs_air_bersih', function (Blueprint $table) {
            $table->id();
            $table->integer('user_detail_id');
            $table->boolean('ab_memasak_air');
            $table->boolean('ab_air_sehat');
            $table->boolean('ab_sumber_air');
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
        Schema::dropIfExists('phbs_air_bersih');
    }
}
