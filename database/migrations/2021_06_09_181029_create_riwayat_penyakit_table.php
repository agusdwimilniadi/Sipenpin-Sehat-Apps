<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRiwayatPenyakitTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('riwayat_penyakit', function (Blueprint $table) {
            $table->id();
            $table->integer('user_detail_id');
            $table->boolean('p_ispa');
            $table->boolean('p_muntaber');
            $table->boolean('p_demam_berdarah');
            $table->boolean('p_campak');
            $table->boolean('p_malaria');
            $table->boolean('p_flu_burung');
            $table->boolean('p_covid19');
            $table->boolean('p_hepatitis_b');
            $table->boolean('p_leptopspirosis');
            $table->boolean('p_kolera');
            $table->boolean('p_gizi_buruk');
            $table->boolean('p_jantung');
            $table->boolean('p_tbc_paru');
            $table->boolean('p_kanker');
            $table->boolean('p_diabetes');
            $table->boolean('p_hepatitis_e');
            $table->boolean('p_difteri');
            $table->boolean('p_chikungunya');
            $table->boolean('p_lumpuh');
            $table->boolean('p_lainnya');
            $table->text('keterangan_p_lainnya')->nullable();
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
        Schema::dropIfExists('riwayat_penyakit');
    }
}
