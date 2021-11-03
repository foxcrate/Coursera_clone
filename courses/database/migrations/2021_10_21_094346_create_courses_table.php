<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('name');

            // $table->bigInteger('teacher_id')->default(0);
            // $table->bigInteger('lesson_id')->default(0);
            // $table->bigInteger('question_id')->default(0);
            // $table->bigInteger('semester_id')->default(0);
            // $table->unsignedBigInteger('semester_id')->nullable();
            // $table->foreign('semester_id')->references('id')->on('semesters')->onDelete('cascade');

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
        Schema::dropIfExists('courses');
    }
}
