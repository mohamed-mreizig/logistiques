<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class ActualitesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('actualites')->insert([
            [
                'id' => 3,
                'titleAR' => 'ar',
                'titleFR' => 'Visite du Ministère de la Santé',
                'descriptionAR' => '<div>at</div>',
                'descriptionFR' => 'Le Ministre de la Sant&eacute; a r&eacute;cemment visit&eacute; plusieurs centres de sant&eacute; pour promouvoir lan au diab&egrave;te. Cette initiative vise &agrave; informer le public sur les risques associ&eacute;s &agrave; cette maladie, avec des brochures et des ateliers &agrave; venir.',
                'imgUrl' => '/assets_home/art1.png',
                'created_at' => '2025-01-05 05:44:25',
                'updated_at' => '2025-01-21 15:43:51',
                'deleted_at' => null,
                'user_id' => 1,
                'isPublished' => 1,
            ],
            [
                'id' => 4,
                'titleAR' => 'ar',
                'titleFR' => 'Webinaire Santé Mentale',
                'descriptionAR' => 'ar',
                'descriptionFR' => 'Un webinaire se tiendra le lle 15 novembre avec des experts pour partager de des des conseils sur la santé mentale.Un webinaire se tiendra tiendra le 15 novembre avec des experts a pour partager des conseils sur la santé mentale.',
                'imgUrl' => '/assets_home/art2.png',
                'created_at' => '2025-01-05 05:44:25',
                'updated_at' => null,
                'deleted_at' => null,
                'user_id' => 1,
                'isPublished' => 1,
            ],
            [
                'id' => 5,
                'titleAR' => 'ar',
                'titleFR' => 'Vaccination Grippe',
                'descriptionAR' => 'ar',
                'descriptionFR' => 'Le SNIS s\'associe à des organisations lorm locales pour offrir des sessions lorem de de vaccination gratuites contre la grippe. c´est Le SNIS s\'associe à des organisations locales pour offrir des sessions de vaccination gratuites contre la grippe.',
                'imgUrl' => '/assets_home/art3.png',
                'created_at' => '2025-01-05 05:48:00',
                'updated_at' => null,
                'deleted_at' => null,
                'user_id' => 1,
                'isPublished' => 1,
            ],
            [
                'id' => 6,
                'titleAR' => 'ar',
                'titleFR' => 'Nouvelles Reco Alimentaires',
                'descriptionAR' => 'ar',
                'descriptionFR' => 'Le SNIS met à jour ses recommandations pour promouvoir une alimentation saine, favorisant fruits et légumes.Le SNIS met à jour ses recommandations pour promouvoir une alimentation saine, favorisant fruits et légumes.',
                'imgUrl' => '/assets_home/art4.png',
                'created_at' => '2025-01-05 05:48:00',
                'updated_at' => null,
                'deleted_at' => null,
                'user_id' => 1,
                'isPublished' => 1,
            ],
        ]);
    }
}
