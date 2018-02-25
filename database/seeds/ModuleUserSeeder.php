<?php

use Illuminate\Database\Seeder;

class ModuleUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('module_user')->insert([
            'module_id' => 1,
            'user_id' => 37
        ]);

        DB::table('module_user')->insert([
            'module_id' => 2,
            'user_id' => 36
        ]);

        DB::table('module_user')->insert([
            'module_id' => 3,
            'user_id' => 37
        ]);
    }
}
