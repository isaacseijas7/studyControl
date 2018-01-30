<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Faker\Factory as Faker;

class RepresentativeSeeder extends Seeder
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
				'birthdate' => $faker->dateTimeBetween('-45 years', '-18 years')->format('Y-m-d'),
				'domicile' => 'Lorem ipsum dolor sit amet.',
				'phone_local' => '02463564765',
				'phone_movil' => '04123524890',
				'created_at' => carbon::now(),
				'updated_at' => carbon::now(),
			]);


			$student = App\Representative::create([
				'people_id' => $people->id,
				'work_place' => '',
				'profession' => '',
				'created_at' => carbon::now(),
				'updated_at' => carbon::now(),
			]);

		}  

    }
}
