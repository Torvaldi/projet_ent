<?php

use Illuminate\Database\Seeder;

use App\Semester;

class SemesterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $array = array(1, 2, 3, 4);
        foreach ($array as $value) {
            $semester = new Semester();
            $semester->name = "Semestre " . $value;
            $semester->description = "Tous les étudiants du semestre " . $value;
            $semester->save();
        }
    }
}
