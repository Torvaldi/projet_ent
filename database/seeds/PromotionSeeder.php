<?php

use Illuminate\Database\Seeder;

use App\Promotion;

class PromotionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $promotion_rt1 = new Promotion();
        $promotion_rt1->name = "Réseaux et Télécommunications 1ère année";
        $promotion_rt1->save();

        $promotion_gea1 = new Promotion();
        $promotion_gea1->name = "Gestion des Entreprises et Administrations 1ère année";
        $promotion_gea1->save();

        $promotion_rt2 = new Promotion();
        $promotion_rt2->name = "Réseaux et Télécommunications 2ème année";
        $promotion_rt2->save();

        $promotion_gea2 = new Promotion();
        $promotion_gea2->name = "Gestion des Entreprises et Administrations 2ème année";
        $promotion_gea2->save();
    }
}
