<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Faker\Factory as Faker;

class StudentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $faker = Faker::create();

        for ($i=0; $i <= 100 ; $i++) { 

			$gender = $faker->randomElement(['Female', 'Male']);
			
			$people = App\People::create([
				'name' => $faker->firstName,
				'last_name' => $faker->lastName,
				'identification' => rand(1111111,99999999),
				'gender' => $gender,
				'birthdate' => $faker->dateTimeBetween('-12 years', '-6 years')->format('Y-m-d'),
				'created_at' => carbon::now(),
				'updated_at' => carbon::now(),
			]);


			$student = App\Student::create([
				'people_id' => $people->id,
				'diseases' => '',
				'created_at' => carbon::now(),
				'updated_at' => carbon::now(),
			]);

		}        

    }
}
