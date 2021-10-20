<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDiscussionIdToStudents extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('students', function (Blueprint $table) {
            $table->bigInteger('discussion_id')->default(0);
            $table->bigInteger('cycle_payment_id')->default(0);
            $table->bigInteger('service_payment_id')->default(0);
            $table->bigInteger('request_to_project_id')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('_students', function (Blueprint $table) {
            //
        });
    }
}
