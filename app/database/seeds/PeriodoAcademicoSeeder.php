<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class PeriodoAcademicoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\AcademicPeriod::create([
			'academic_period' => '2017-2018', 
			'created_at' => carbon::now(),
			'updated_at' => carbon::now()
		]);
    }
}
