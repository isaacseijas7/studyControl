<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class MateriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $materias = [
        	'Lenguaje y Comunicación', 
        	'Ciencias Sociales',
        	'Ciencias Naturales',
        	'Matematica',
        	'Educación Fisica',
        ];

        $grades = ['1er', '2do', '3ero', '4to', '5to', '6to'];

    	foreach ($grades as $grade_key => $grade_value) {

	    	foreach ($materias as $materia_key => $materia_value) {
		        App\Materia::create([
					'materia' => $materia_value,
					'grade_id' => ($grade_key + 1),
					'created_at' => carbon::now(),
					'updated_at' => carbon::now()
				]);
	    	}
    	}

    }
}
