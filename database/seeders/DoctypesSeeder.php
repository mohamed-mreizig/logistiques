<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class DoctypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('doctypes')->insert([
            [
                'id' => 1,
                'created_at' => '2024-12-30 02:03:06',
                'updated_at' => null,
                'deleted_at' => null,
                'type' => "Bulletins d'informations",
                'isPublished' => 1,
                'user_id' => 1,
            ],
            [
                'id' => 2,
                'created_at' => '2024-12-30 02:03:36',
                'updated_at' => null,
                'deleted_at' => null,
                'type' => 'Annuaires statistiques',
                'isPublished' => 1,
                'user_id' => 1,
            ],
            [
                'id' => 3,
                'created_at' => '2024-12-30 02:03:36',
                'updated_at' => null,
                'deleted_at' => null,
                'type' => " Rapports d'enquête",
                'isPublished' => 1,
                'user_id' => 1,
            ],
            [
                'id' => 4,
                'created_at' => '2024-12-30 12:27:50',
                'updated_at' => null,
                'deleted_at' => null,
                'type' => 'cdfgfvsd',
                'isPublished' => 1,
                'user_id' => 1,
            ],
        ]);
    }
}
