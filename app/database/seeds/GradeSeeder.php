<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class GradeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
    	$grades = ['1er', '2do', '3ero', '4to', '5to', '6to'];

    	foreach ($grades as $key => $value) {
	        App\Grade::create([
				'grade' => $value, 
				'created_at' => carbon::now(),
				'updated_at' => carbon::now()
			]);
    	}

    }
}
