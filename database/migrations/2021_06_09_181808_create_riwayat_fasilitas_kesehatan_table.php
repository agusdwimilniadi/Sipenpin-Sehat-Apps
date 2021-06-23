<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRiwayatFasilitasKesehatanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('riwayat_fasilitas_kesehatan', function (Blueprint $table) {
            $table->id();
            $table->integer('user_detail_id');
            $table->boolean('t_rumah_sakit');
            $table->boolean('t_rumah_sakit_bersalin');
            $table->boolean('t_puskesmas_rawat_inap');
            $table->boolean('t_puskesmas_rawat_tanpa_inap');
            $table->boolean('t_puskesmas_pembantu');
            $table->boolean('t_poliklinik');
            $table->boolean('t_praktik_dokter');
            $table->boolean('t_rumah_bersalin');
            $table->boolean('t_praktik_bidan');
            $table->boolean('t_poskesdes');
            $table->boolean('t_polindes');
            $table->boolean('t_apotik');
            $table->boolean('t_khusus_obat_jamu');
            $table->boolean('t_posyandu');
            $table->boolean('t_posbindu');
            $table->boolean('t_praktik_dukun_bayi_bersalin');
            $table->boolean('asi_ibu_ekslusif');
            $table->string('konsumsi_obat')->nullable();
            $table->string('konsumsi_jamu')->nullable();
            $table->string('bpjs')->nullable();
            $table->string('jaminan_asuransi_kesehatan');
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
        Schema::dropIfExists('riwayat_fasilitas_kesehatan');
    }
}
