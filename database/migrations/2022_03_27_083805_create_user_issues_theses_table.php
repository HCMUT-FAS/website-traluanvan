<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserIssuesThesesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_issues_theses', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->date('issue_date')->nullable();
            $table->date('expect_issue_date');
            $table->date('return_date')->nullable();
            $table->date('expect_return_date')->nullable();
            // user_id (FK)
            $table->string('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            // user_faculty_id (FK)
            $table->unsignedBigInteger('user_faculty_id');
            $table->foreign('user_faculty_id')->references('user_faculty_id')->on('users');
            // user_role_id (FK)
            $table->unsignedBigInteger('user_role_id');
            $table->foreign('user_role_id')->references('user_role_id')->on('users');
            // thesis_id (FK)
            $table->string('thesis_id');
            $table->foreign('thesis_id')->references('id')->on('theses');
            // thesis_status_id (FK)
            $table->unsignedBigInteger('thesis_status_id');
            $table->foreign('thesis_status_id')->references('thesis_status_id')->on('theses');
            // thesis_role_id (FK)
            $table->unsignedBigInteger('thesis_role_id');
            $table->foreign('thesis_role_id')->references('thesis_role_id')->on('theses');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_issues_theses');
    }
}
