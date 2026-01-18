<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrganigramesSeeder extends Seeder
{
    public function run()
    {
        DB::table('organigrames')->insert([
            'id' => 2,
            'created_at' => '2025-01-08 12:39:34',
            'updated_at' => '2025-01-08 12:39:34',
            'deleted_at' => null,
            'orgImgUrl' => '/storage/OrganigramImg/wOVpBznJTwszrhDAsMzXicdAwPjQ3k7rYKIfQczm.png',
            'descriptionorgAR' => '<div>ar</div>',
            'descriptionorgFR' => '<div>description</div>',
            'user_id' => 1,
            'isPublished' => 1,
        ]);
    }
}
