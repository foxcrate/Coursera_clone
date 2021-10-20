<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPhoneToStudents extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('students', function (Blueprint $table) {

            $table->bigInteger('cycle_id')->default(0);
            $table->enum('case', array('normal', 'special'))->nullable();;
            $table->string('phone1')->nullable();
            $table->string('phone2')->nullable();;
            $table->string('passport')->nullable();;
            $table->string('job')->nullable();;
            $table->string('phone')->nullable();;
            $table->integer('country')->nullable();;
            $table->mediumText('general_note')->nullable();;
            $table->mediumText('payment_note')->nullable();;
            $table->date('due_date')->nullable();;
            $table->integer('money_paid')->nullable();;
            $table->integer('money_to_pay')->nullable();;

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('students', function (Blueprint $table) {
            //
        });
    }
}
