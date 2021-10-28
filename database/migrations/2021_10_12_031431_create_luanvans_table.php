<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLuanvansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('luanvans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('ma_lv');
            $table->string('ten_lv');
            $table->string('ten_lv_e');
            $table->string('ten_sv1');
            $table->string('mssv_sv1');
            $table->string('ten_sv2');
            $table->string('mssv_sv2');
            $table->string('ten_gv1');
            $table->string('ten_gv2');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('luanvans');
    }
}
