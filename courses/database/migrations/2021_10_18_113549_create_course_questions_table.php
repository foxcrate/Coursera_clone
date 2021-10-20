<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourseQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_questions', function (Blueprint $table) {
            $table->id();

            $table->mediumText('question');
            $table->mediumText('first_answer');
            $table->mediumText('second_answer');
            $table->mediumText('third_answer')->default('0');
            $table->mediumText('fourth_answer')->default('0');
            $table->integer('correct_answer');

            $table->bigInteger('course_id')->default(0) ;

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
        Schema::dropIfExists('course_questions');
    }
}
