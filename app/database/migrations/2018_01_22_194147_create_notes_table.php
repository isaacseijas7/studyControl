<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_lapse_note')->default('0.1');
            $table->string('first_second_note')->default('0.1');
            $table->string('first_third_note')->default('0.1');
            $table->integer('inscription_id')->unsigned();
            $table->timestamps();

            $table->foreign('inscription_id')->references('id')->on('inscriptions')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('notes');
    }
}
