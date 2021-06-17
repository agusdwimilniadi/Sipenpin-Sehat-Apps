<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhbsBuahSayurTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('phbs_buah_sayur', function (Blueprint $table) {
            $table->id();
            $table->integer('user_detail_id');
            $table->boolean('bs_mengkonsumsi');
            $table->boolean('bs_segar_sehat');
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
        Schema::dropIfExists('phbs_buah_sayur');
    }
}
