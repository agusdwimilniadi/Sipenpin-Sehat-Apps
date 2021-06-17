<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhbsMencuciTanganTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('phbs_mencuci_tangan', function (Blueprint $table) {
            $table->id();
            $table->integer('user_detail_id');
            $table->boolean('mt_sebelum_sesudah_makan');
            $table->boolean('mt_menggunakan_air_sabun');
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
        Schema::dropIfExists('phbs_mencuci_tangan');
    }
}
