<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIssuesThesesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('issues_theses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('issuesDate')->nullable();
            $table->date('expectedIssuesDate');
            $table->date('returnDate')->nullable();
            $table->date('expectedReturnDate')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->string('thesis_id');
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('issues_theses');
    }
}
