<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserHasThesesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_has_theses', function (Blueprint $table) {
            $table->id();
            // user_id (FK)
            $table->string('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            // thesis_id (FK)
            $table->string('thesis_id');
            $table->foreign('thesis_id')->references('id')->on('theses');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_has_theses');
    }
}
