<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAcademicPeriodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('academic_periods', function (Blueprint $table) {
            $table->increments('id');
            $table->string('academic_period');
            $table->enum('status', ['active', 'deactivated'])->default('active');
            $table->integer('min_section')->default(10);
            $table->integer('max_section')->default(20);
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
        Schema::dropIfExists('academic_periods');
    }
}
