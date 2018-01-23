<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeacherMateriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teacher_materias', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('teacher_id')->unsigned();
            $table->integer('materia_id')->unsigned();
            $table->timestamps();

            $table->foreign('teacher_id')->references('id')->on('teachers')->onDelete('cascade');
            $table->foreign('materia_id')->references('id')->on('materias')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('teacher_materias');
    }
}
