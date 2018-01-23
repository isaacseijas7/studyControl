<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class SectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sections = ['A', 'B', 'C'];

    	foreach ($sections as $key => $value) {
	        App\Section::create([
				'section' => $value, 
				'created_at' => carbon::now(),
				'updated_at' => carbon::now()
			]);
    	}
    }
}
