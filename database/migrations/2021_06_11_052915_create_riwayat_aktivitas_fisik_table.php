<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRiwayatAktivitasFisikTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('riwayat_aktivitas_fisik', function (Blueprint $table) {
            $table->id();
            $table->integer('user_detail_id');
            $table->boolean('f_berjalan');
            $table->boolean('f_olahraga');
            $table->boolean('f_sepeda');
            $table->boolean('f_berpergian');
            $table->boolean('f_beban_ringan');
            $table->boolean('f_beban_berat');
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
        Schema::dropIfExists('riwayat_aktivitas_fisik');
    }
}
