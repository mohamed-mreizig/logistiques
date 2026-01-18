<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RessourcesSeeder extends Seeder
{
    public function run()
    {
        DB::table('ressources')->insert([
            [
                'id' => 1,
                'created_at' => '2024-12-30 21:24:38',
                'updated_at' => '2024-12-30 21:37:00',
                'deleted_at' => null,
                'titleAr' => 'arrr',
                'titleFr' => 'BULLETIN D’INFORMATION T2 2025',
                'descriptionAr' => '<p>hjbuyh</p>',
                'descriptionFr' => '<p>vyyuvy</p>',
                'linkurl' => 'ggbbtt.com',
                'isPublished' => 1,
                'user_id' => 1,
            ],
        ]);
    }
}
