<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourseCalenderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_calender', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('semester_id')->nullable();
            $table->foreign('semester_id')->references('id')->on('semesters')->onDelete('cascade');

            $table->unsignedBigInteger('course1_id')->nullable();
            $table->foreign('course1_id')->references('id')->on('courses')->onDelete('cascade');

            $table->unsignedBigInteger('course2_id')->nullable();
            $table->foreign('course2_id')->references('id')->on('courses')->onDelete('cascade');

            $table->unsignedBigInteger('course3_id')->nullable();
            $table->foreign('course3_id')->references('id')->on('courses')->onDelete('cascade');

            $table->unsignedBigInteger('course4_id')->nullable();
            $table->foreign('course4_id')->references('id')->on('courses')->onDelete('cascade');

            $table->unsignedBigInteger('course5_id')->nullable();
            $table->foreign('course5_id')->references('id')->on('courses')->onDelete('cascade');

            $table->unsignedBigInteger('course6_id')->nullable();
            $table->foreign('course6_id')->references('id')->on('courses')->onDelete('cascade');

            $table->unsignedBigInteger('course7_id')->nullable();
            $table->foreign('course7_id')->references('id')->on('courses')->onDelete('cascade');

            $table->unsignedBigInteger('course8_id')->nullable();
            $table->foreign('course8_id')->references('id')->on('courses')->onDelete('cascade');

            $table->unsignedBigInteger('course9_id')->nullable();
            $table->foreign('course9_id')->references('id')->on('courses')->onDelete('cascade');

            $table->unsignedBigInteger('course10_id')->nullable();
            $table->foreign('course10_id')->references('id')->on('courses')->onDelete('cascade');

            $table->unsignedBigInteger('course11_id')->nullable();
            $table->foreign('course11_id')->references('id')->on('courses')->onDelete('cascade');

            $table->unsignedBigInteger('course12_id')->nullable();
            $table->foreign('course12_id')->references('id')->on('courses')->onDelete('cascade');

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
        Schema::dropIfExists('course_calender');
    }
}
