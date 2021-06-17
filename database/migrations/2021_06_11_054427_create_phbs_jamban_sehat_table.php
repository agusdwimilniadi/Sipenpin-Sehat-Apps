<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhbsJambanSehatTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('phbs_jamban_sehat', function (Blueprint $table) {
            $table->id();
            $table->integer('user_detail_id');
            $table->boolean('js_bab_bak');
            $table->boolean('js_mudah_dibersihkan');
            $table->boolean('js_membersihkan_setiap_hari');
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
        Schema::dropIfExists('phbs_jamban_sehat');
    }
}
