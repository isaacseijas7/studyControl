<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');

            $table->string('diseases');// enfermedades

            $table->integer('people_id')->unsigned();
            $table->integer('mother_id')->unsigned();
            $table->integer('father_id')->unsigned();
            $table->integer('auxiliary_id')->unsigned()->nullable();
            $table->timestamps();

            $table->foreign('people_id')->references('id')->on('people')->onDelete('cascade');

            $table->foreign('mother_id')->references('id')->on('representatives')->onDelete('cascade');
            $table->foreign('father_id')->references('id')->on('representatives')->onDelete('cascade');
            $table->foreign('auxiliary_id')->references('id')->on('representatives')->onDelete('cascade');

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
