<?php

use Illuminate\Database\Seeder;
use App\Module;
use App\Semester;

class ModuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $module = new Module();
        $module->name = "Stats";
        $module->number = "1101";
        $module->semester_id = Semester::where('name', 'Semestre 1')->firstOrFail()->id;
        $module->save();

        $module = new Module();
        $module->name = "Téléphonie";
        $module->number = "2101";
        $module->semester_id = Semester::where('name', 'Semestre 1')->firstOrFail()->id;
        $module->save();


        $module = new Module();
        $module->name = "Réseaux sans fils";
        $module->number = "3101";
        $module->semester_id = Semester::where('name', 'Semestre 1')->firstOrFail()->id;
        $module->save();


        $module = new Module();
        $module->name = "Java";
        $module->number = "4101";
        $module->semester_id = Semester::where('name', 'Semestre 1')->firstOrFail()->id;
        $module->save();
    }
}
