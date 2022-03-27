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
            $table->string('description')->nullable();
            // status_id (FK)
            $table->unsignedBigInteger('thesis_status_id');
            $table->foreign('thesis_status_id')->references('id')->on('thesis_statuses');
            // role_id (FK)
            $table->unsignedBigInteger('thesis_role_id');
            $table->foreign('thesis_role_id')->references('id')->on('thesis_roles');
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
        Schema::dropIfExists('theses');
    }
}
