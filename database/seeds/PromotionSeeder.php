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
        $promotion_rt1->name = "Réseaux et Télécommunications";
        $promotion_rt1->save();

        $promotion_gea1 = new Promotion();
        $promotion_gea1->name = "Gestion des Entreprises et Administrations";
        $promotion_gea1->save();

        $promotion_rt2 = new Promotion();
        $promotion_rt2->name = "Informatique";
        $promotion_rt2->save();

        $promotion_gea2 = new Promotion();
        $promotion_gea2->name = "Technique de Commercialisation";
        $promotion_gea2->save();
    }
}
