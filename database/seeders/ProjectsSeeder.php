<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProjectsSeeder extends Seeder
{
    public function run()
    {
        DB::table('projects')->insert([
            [
                'id' => 5,
                'created_at' => '2025-01-06 10:42:37',
                'updated_at' => null,
                'deleted_at' => null,
                'date_debut' => '2025-01-06',
                'date_fin' => '2025-01-07',
                'titleAr' => 'ar',
                'titleFr' => 'Vaccination des Enfants',
                'descriptionAr' => 'ar',
                'descriptionFR' => 'Augmenter le taux de vaccination des enfants en organisant des cliniques de vaccination dans les communautés éloignées.',
                'imgUrl' => 'assets_home/vac1.png',
                'isPublished' => 1,
                'user_id' => 1,
            ],
            [
                'id' => 6,
                'created_at' => '2025-01-06 10:42:37',
                'updated_at' => null,
                'deleted_at' => null,
                'date_debut' => '2025-01-06',
                'date_fin' => '2025-01-07',
                'titleAr' => 'ar',
                'titleFr' => 'Santé Mentale Communautaire',
                'descriptionAr' => 'ar',
                'descriptionFR' => 'Ce projet se concentre sur la sensibilisation à la santé mentale, en offrant des ressources et un soutien aux personnes vulnérables.',
                'imgUrl' => 'assets_home/vac2.png',
                'isPublished' => 1,
                'user_id' => 1,
            ],
            [
                'id' => 7,
                'created_at' => '2025-01-06 10:45:04',
                'updated_at' => null,
                'deleted_at' => null,
                'date_debut' => '2025-01-07',
                'date_fin' => '2025-01-06',
                'titleAr' => 'ar',
                'titleFr' => 'Programmes de Nutrition',
                'descriptionAr' => 'ar',
                'descriptionFR' => 'Promouvoir une alimentation saine à travers des ateliers sur la nutrition et la distribution de repas équilibrés aux familles à faible revenu.',
                'imgUrl' => 'assets_home/vac3.png',
                'isPublished' => 1,
                'user_id' => 1,
            ],
            [
                'id' => 8,
                'created_at' => '2025-01-06 10:45:04',
                'updated_at' => null,
                'deleted_at' => null,
                'date_debut' => '2025-01-07',
                'date_fin' => '2025-01-06',
                'titleAr' => 'ar',
                'titleFr' => 'Programmes de Nutrition',
                'descriptionAr' => 'ar',
                'descriptionFR' => 'Promouvoir une alimentation saine à travers des ateliers sur la nutrition et la distribution de repas équilibrés aux familles à faible revenu.',
                'imgUrl' => 'assets_home/vac3.png',
                'isPublished' => 1,
                'user_id' => 1,
            ],
        ]);
    }
}
