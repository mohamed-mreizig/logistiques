<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServiceTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('servicetypes')->insert([
            [
                'id' => 1,
                'created_at' => '2025-01-22 13:47:36',
                'updated_at' => '2025-01-27 09:14:11',
                'deleted_at' => null,
                'type' => 'collecte de données',
                'isPublished' => 1,
                'user_id' => 1,
            ],
            [
                'id' => 2,
                'created_at' => '2025-01-26 02:39:41',
                'updated_at' => '2025-01-26 03:08:41',
                'deleted_at' => null,
                'type' => 'newt',
                'isPublished' => 1,
                'user_id' => 1,
            ],
        ]);
    }
}
