<?php

use Illuminate\Database\Seeder;

use App\Tdgroup;
use App\Promotion;

class TdgroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //R&T
        $groupTd1_rt1 = new Tdgroup();
        $groupTd1_rt1->name = "TD1";
        $groupTd1_rt1->promotion_id = Promotion::where('name', "Réseaux et Télécommunications")->first()->id;
        $groupTd1_rt1->save();

        $groupTd2_rt1 = new Tdgroup();
        $groupTd2_rt1->name = "TD2";
        $groupTd2_rt1->promotion_id = Promotion::where('name', "Réseaux et Télécommunications")->first()->id;
        $groupTd2_rt1->save();

        $groupTd1_rt2 = new Tdgroup();
        $groupTd1_rt2->name = "TD1";
        $groupTd1_rt2->promotion_id = Promotion::where('name', "Gestion des Entreprises et Administrations")->first()->id;
        $groupTd1_rt2->save();

        $groupTd2_rt2 = new Tdgroup();
        $groupTd2_rt2->name = "TD2";
        $groupTd2_rt2->promotion_id = Promotion::where('name', "Gestion des Entreprises et Administrations")->first()->id;
        $groupTd2_rt2->save();

        // GEA
        $groupTd1_gea1 = new Tdgroup();
        $groupTd1_gea1->name = "TD1";
        $groupTd1_gea1->promotion_id = Promotion::where('name', "Informatique")->first()->id;
        $groupTd1_gea1->save();

        $groupTd2_gea1 = new Tdgroup();
        $groupTd2_gea1->name = "TD2";
        $groupTd2_gea1->promotion_id = Promotion::where('name', "Informatique")->first()->id;
        $groupTd2_gea1->save();

        $groupTd1_gea2 = new Tdgroup();
        $groupTd1_gea2->name = "TD1";
        $groupTd1_gea2->promotion_id = Promotion::where('name', "Technique de Commercialisation")->first()->id;
        $groupTd1_gea2->save();

        $groupTd2_gea2 = new Tdgroup();
        $groupTd2_gea2->name = "TD2";
        $groupTd2_gea2->promotion_id = Promotion::where('name', "Technique de Commercialisation")->first()->id;
        $groupTd2_gea2->save();
    }
}
