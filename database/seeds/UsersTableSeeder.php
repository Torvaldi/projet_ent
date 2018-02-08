<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class UsersTableSeeder extends Seeder
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

        DB::table('users')->insert([
            'username' => 'laurentq',
            'email' => 'quentin.laurent@etu.univ-grenoble-alpes.fr',
            'password' => bcrypt('password'),
            'firstName' => 'Quentin',
            'lastName' => 'Laurent',
            'created_at' => $dateNow
        ]);

        DB::table('users')->insert([
            'username' => 'gontardg',
            'email' => 'geoffrey.gontard@etu.univ-grenoble-alpes.fr',
            'password' => bcrypt('password'),
            'firstName' => 'Geoffrey',
            'lastName' => 'Gontard',
            'created_at' => $dateNow
        ]);

        DB::table('users')->insert([
            'username' => 'muckep',
            'email' => 'pierre.mucke@etu.univ-grenoble-alpes.fr',
            'password' => bcrypt('password'),
            'firstName' => 'Pierre',
            'lastName' => 'Mucke',
            'created_at' => $dateNow
        ]);

        DB::table('users')->insert([
            'username' => 'jamontjp',
            'email' => 'jean-paul.jamont@iut-valence.fr',
            'password' => bcrypt('password'),
            'firstName' => 'Jean-Paul',
            'lastName' => 'Jamont',
            'created_at' => $dateNow
        ]);

        DB::table('users')->insert([
            'username' => 'duccinic',
            'email' => 'christian.duccini@iut-valence.fr',
            'password' => bcrypt('password'),
            'firstName' => 'Christian',
            'lastName' => 'Duccini',
            'created_at' => $dateNow
        ]);
    }
}
