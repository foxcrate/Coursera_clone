<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('book_payments', function (Blueprint $table) {
            $table->id();

            $table->integer('money_paid')->nullable();
            $table->text('note')->nullable();
            $table->enum('status', array('accepted', 'refused','pending'))->default('pending'); 
            $table->string('file')->nullable();

            //$table->bigInteger('student_id')->default(0);
            $table->unsignedBigInteger('student_id')->nullable();
            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');

            //$table->bigInteger('book_id')->default(0);
            $table->unsignedBigInteger('book_id')->nullable();
            $table->foreign('book_id')->references('id')->on('books')->onDelete('cascade');


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
        Schema::dropIfExists('book_payments');
    }
}
