<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCyclePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cycle_payments', function (Blueprint $table) {
            $table->id();

            $table->date('due_date');
            $table->integer('amount_paid');
            $table->integer('amount_left');
            $table->text('note');
            $table->enum('status', array('accepted', 'refused','pending')); 
            $table->string('file');

            $table->bigInteger('student_id')->default(0);
            $table->bigInteger('cycle_id')->default(0);

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
        Schema::dropIfExists('cycle_payments');
    }
}
