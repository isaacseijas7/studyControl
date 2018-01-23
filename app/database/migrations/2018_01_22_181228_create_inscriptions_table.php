<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInscriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inscriptions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('student_id')->unsigned();
            $table->integer('academic_period_id')->unsigned();
            $table->integer('grade_id')->unsigned();
            $table->integer('section_id')->unsigned();
            $table->timestamps();

            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');
            $table->foreign('academic_period_id')->references('id')->on('academic_periods')->onDelete('cascade');
            $table->foreign('grade_id')->references('id')->on('grades')->onDelete('cascade');
            $table->foreign('section_id')->references('id')->on('sections')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inscriptions');
    }
}
