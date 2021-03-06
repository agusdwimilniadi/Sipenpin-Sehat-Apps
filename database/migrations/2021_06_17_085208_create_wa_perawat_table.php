<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWaPerawatTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wa_perawat', function (Blueprint $table) {
            $table->increments('id', 10);
            $table->string('nama_perawat');
            $table->string('nomor_perawat');
            $table->boolean('is_perawat');
            $table->time('jam_awal');
            $table->time('jam_akhir');
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
        Schema::dropIfExists('wa_perawat');
    }
}
