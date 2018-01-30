<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $this->call(UserSeeder::class);
        $this->call(PeriodoAcademicoSeeder::class);
        $this->call(GradeSeeder::class);
        $this->call(SectionSeeder::class);
        $this->call(MateriaSeeder::class);
        $this->call(StudentsSeeder::class);
        $this->call(RepresentativeSeeder::class);
    }
}
