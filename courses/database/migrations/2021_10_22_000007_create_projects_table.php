<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->string('image');
            $table->enum('type', array('phd', 'master', 'diploma', 'fellowship')); 
            $table->string('video');
            $table->integer('price');
            $table->mediumText('summery');

            // $table->bigInteger('semester_id')->default(0);
            
            $table->unsignedBigInteger('cycle_id')->nullable();
            $table->foreign('cycle_id')->references('id')->on('cycles')->onDelete('cascade');

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
        Schema::dropIfExists('projects');
    }
}
