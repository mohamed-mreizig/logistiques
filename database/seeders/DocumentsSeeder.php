<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class DocumentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('documents')->insert([
            [
                'id' => 1,
                'created_at' => '2024-12-30 02:06:58',
                'updated_at' => '2024-12-30 12:27:17',
                'deleted_at' => null,
                'titleAr' => 'arbeeee',
                'titleFr' => 'BULLETIN D’INFORMATION T2 2025',
                'fileUrl' => '/storage/directeurFile/DgGqCVTi0LxCXI0X4MjYROEKgh2RFcmrJ2hCYdBR.docx',
                'isPublished' => 1,
                'doctype_id' => 1,
                'user_id' => 1,
            ],
            [
                'id' => 2,
                'created_at' => '2024-12-30 02:36:43',
                'updated_at' => '2024-12-30 02:36:43',
                'deleted_at' => null,
                'titleAr' => 'arabe',
                'titleFr' => 'BULLETIN d’INFORMATION T1 2024',
                'fileUrl' => '/storage/directeurFile/jYAhEyZv9j3OhWIuQceWGwB0K7EgFxzuQ7dvd6NH.docx',
                'isPublished' => 1,
                'doctype_id' => 1,
                'user_id' => 1,
            ],
            [
                'id' => 3,
                'created_at' => '2024-12-30 12:23:08',
                'updated_at' => '2024-12-30 12:23:08',
                'deleted_at' => null,
                'titleAr' => 'dvds',
                'titleFr' => 'vdsvd',
                'fileUrl' => '/storage/directeurFile/gUU9UblhHSiT7rfql0JY9Tr986NpQAKc0kW11Xl5.docx',
                'isPublished' => 0,
                'doctype_id' => 2,
                'user_id' => 1,
            ],
        ]);
    }
}