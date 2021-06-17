<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRiwayatAktivitasPsikisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('riwayat_aktivitas_psikis', function (Blueprint $table) {
            $table->id();
            $table->integer('user_detail_id');
            $table->boolean('p_marah');
            $table->boolean('p_kesal');
            $table->boolean('p_cemas');
            $table->boolean('p_tersinggung');
            $table->boolean('p_sulit_tidur_istirahat');
            $table->boolean('p_gelisah');
            $table->boolean('p_mengantuk');
            $table->boolean('p_tidak_sabar');
            $table->boolean('p_bahagia');
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
        Schema::dropIfExists('riwayat_aktivitas_psikis');
    }
}
