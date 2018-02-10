<?php

use Illuminate\Database\Seeder;

use Carbon\Carbon;

use App\User;
use App\Role;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dt = Carbon::now();
        $dateNow = $dt->toDateTimeString();

        $role_student = Role::where('name', 'Étudiant')->first();
        $role_professor = Role::where('name', 'Professeur')->first();
        $role_administrator = Role::where('name', 'Administrateur')->first();

        $user = new User();
        $user->username = 'laurentq';
        $user->email = 'quentin.laurent@etu.univ-grenoble-alpes.fr';
        $user->password = bcrypt('password');
        $user->firstName = 'Quentin';
        $user->lastName = 'Laurent';
        $user->isDelegate = true;
        $user->birthday = Carbon::create('1997', '12', '23');
        $user->created_at = $dateNow;
        $user->save();
        $user->roles()->attach($role_student);
        $user->roles()->attach($role_administrator);

        $user = new User();
        $user->username = 'gontardg';
        $user->email = 'geoffrey.gontard@etu.univ-grenoble-alpes.fr';
        $user->password = bcrypt('password');
        $user->firstName = 'Geoffrey';
        $user->lastName = 'Gontard';
        $user->isDelegate = false;
        $user->created_at = $dateNow;
        $user->save();
        $user->roles()->attach($role_student);

        $user = new User();
        $user->username = 'muckep';
        $user->email = 'pierre.mucke@etu.univ-grenoble-alpes.fr';
        $user->password = bcrypt('password');
        $user->firstName = 'Pierre';
        $user->lastName = 'Mucke';
        $user->isDelegate = false;
        $user->created_at = $dateNow;
        $user->save();
        $user->roles()->attach($role_student);

        $user = new User();
        $user->username = 'jamontjp';
        $user->email = 'jean-paul.jamont@iut-valence.fr';
        $user->password = bcrypt('password');
        $user->firstName = 'Jean-Paul';
        $user->lastName = 'Jamont';
        $user->telephone = "0475000000";
        $user->created_at = $dateNow;
        $user->save();
        $user->roles()->attach($role_professor);

        $user = new User();
        $user->username = 'duccinic';
        $user->email = 'christian.duccini@iut-valence.fr';
        $user->password = bcrypt('password');
        $user->firstName = 'Christian';
        $user->lastName = 'Duccini';
        $user->created_at = $dateNow;
        $user->save();
        $user->roles()->attach($role_professor);
    }
}