<?php

use Illuminate\Database\Seeder;

class ModuleTdGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('module_tdgroup')->insert([
            'module_id' => 1,
            'tdgroup_id' => 1
        ]);

        DB::table('module_tdgroup')->insert([
            'module_id' => 1,
            'tdgroup_id' => 2
        ]);

        DB::table('module_tdgroup')->insert([
            'module_id' => 2,
            'tdgroup_id' => 3
        ]);

        DB::table('module_tdgroup')->insert([
            'module_id' => 1,
            'tdgroup_id' => 4
        ]);
    }
}
