<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('image')->nullable();
            $table->integer('age')->nullable();
            $table->mediumText('bio');
            $table->enum('case', array('normal', 'special'))->nullable();
            $table->string('phone1')->nullable();
            $table->string('phone2')->nullable();
            $table->enum('status', array('allowed', 'blocked'))->default('allowed');
            $table->string('passport')->nullable();
            $table->string('job')->nullable();
            $table->string('country')->nullable();
            $table->mediumText('general_note')->nullable();
            $table->mediumText('payment_note')->nullable();
            $table->date('due_date')->nullable();
            $table->integer('money_paid')->nullable();
            $table->integer('money_to_pay')->nullable();

            $table->unsignedBigInteger('cycle_id')->nullable();
            $table->foreign('cycle_id')->references('id')->on('cycles')->onDelete('cascade');

            $table->rememberToken();
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
        Schema::dropIfExists('students');
    }
}
