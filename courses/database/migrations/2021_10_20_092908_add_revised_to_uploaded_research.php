<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRevisedToUploadedResearch extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('uploaded_research', function (Blueprint $table) {
            
            $table->enum('status', array('accepted', 'refused','pending'))->default('pending');
            
            $table->text('comment')->default('0'); 

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('uploaded_research', function (Blueprint $table) {
            //
        });
    }
}
