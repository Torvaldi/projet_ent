<?php

use Illuminate\Database\Seeder;

use App\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_student = new Role();
        $role_student->name = 'Étudiant';
        $role_student->active = true;
        $role_student->save();
    
        $role_professor = new Role();
        $role_professor->name = 'Professeur';
        $role_professor->active = true;
        $role_professor->save();

        $role_administrator = new Role();
        $role_administrator->name = 'Administrateur';
        $role_administrator->active = true;
        $role_administrator->save();
    }
}
