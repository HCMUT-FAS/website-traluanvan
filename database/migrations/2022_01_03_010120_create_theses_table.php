<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateThesesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('theses', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('nameVN');
            $table->string('nameEN')->nullable();
            $table->string('student1');
            $table->string('student2')->nullable();
            $table->string('instructor1');
            $table->string('instructor2')->nullable();
            $table->string('description')->nullable();
            $table->integer('status')->default(1);
            $table->timestamps();
            $table->foreign('status')->references('id')->on('theses_status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('theses');
    }
}
