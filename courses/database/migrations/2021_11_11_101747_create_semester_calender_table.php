<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSemesterCalenderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('semester_calender', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('project_id')->nullable();
            $table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade');

            $table->unsignedBigInteger('semester1_id')->nullable();
            $table->foreign('semester1_id')->references('id')->on('semesters')->onDelete('cascade');

            $table->unsignedBigInteger('semester2_id')->nullable();
            $table->foreign('semester2_id')->references('id')->on('semesters')->onDelete('cascade');

            $table->unsignedBigInteger('semester3_id')->nullable();
            $table->foreign('semester3_id')->references('id')->on('semesters')->onDelete('cascade');

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
        Schema::dropIfExists('semester_calender');
    }
}
