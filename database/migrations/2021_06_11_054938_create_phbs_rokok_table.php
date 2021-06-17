<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhbsRokokTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('phbs_rokok', function (Blueprint $table) {
            $table->id();
            $table->integer('user_detail_id');
            $table->boolean('r_dalam_rumah');
            $table->boolean('r_asbak_rokok');
            $table->boolean('r_tanpa_rokok');
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
        Schema::dropIfExists('phbs_rokok');
    }
}
