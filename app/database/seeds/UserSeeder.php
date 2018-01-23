<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = App\User::create([
			'name' => 'faviola',
			'email' => 'faviola@gmail.com',
			'password' => bcrypt('123456'),
			'rol' => 'admin',
			'remember_token' => '716iyu66e937egiy',
			'created_at' => carbon::now(),
			'updated_at' => carbon::now()
		]);
    }
}
