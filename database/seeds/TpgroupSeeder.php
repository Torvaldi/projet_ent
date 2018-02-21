<?php

use Illuminate\Database\Seeder;

use App\Tpgroup;
use App\Tdgroup;

class TpgroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=1; $i <= 8; $i++) {
            $tpGroup = new Tpgroup();
            $tpGroup->name = "TP1";
            $tpGroup->tdgroup_id = Tdgroup::where('id', $i)->first()->id;
            $tpGroup->save();

            $tpGroup = new Tpgroup();
            $tpGroup->name = "TP2";
            $tpGroup->tdgroup_id = Tdgroup::where('id', $i)->first()->id;
            $tpGroup->save();
        }
    }
}
