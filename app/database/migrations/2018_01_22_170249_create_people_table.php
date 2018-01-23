<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePeopleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('people', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('identification')->nullable();
            $table->enum('gender', ['Female', 'Male'])->nullable();
            $table->date('birthdate')->nullable();
            $table->string('location')->nullable();
            $table->string('domicile')->nullable();
            $table->string('phone_local')->nullable();
            $table->string('phone_movil')->nullable();
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
        Schema::dropIfExists('people');
    }
}
