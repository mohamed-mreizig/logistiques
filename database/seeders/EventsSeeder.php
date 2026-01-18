<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class EventsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('events')->insert([
            [
                'id' => 2,
                'created_at' => '2025-01-06 09:12:02',
                'updated_at' => '2025-01-06 09:12:02',
                'deleted_at' => null,
                'start_at' => '2025-01-11',
                'ends_at' => '2025-01-12',
                'titleAr' => 'ar',
                'titleFR' => 'MEDEX',
                'descriptionAr' => '<div>ar</div>',
                'descriptionfr' => '<div>Explorez les derni&egrave;res innovations et opportunit&eacute;s dans le secteur de la sant&eacute; en Afrique</div>',
                'imageurl' => '/storage/eventFiles/aPIwK6TwttKvR9r9CmY7ltH3QIYS8q34IkBnGhis.png',
                'isPublished' => 1,
                'user_id' => 1,
            ],
            [
                'id' => 3,
                'created_at' => '2025-01-06 09:12:02',
                'updated_at' => '2025-01-06 09:12:02',
                'deleted_at' => null,
                'start_at' => '2025-01-11',
                'ends_at' => '2025-01-12',
                'titleAr' => 'ar',
                'titleFR' => 'MEDEX',
                'descriptionAr' => '<div>ar</div>',
                'descriptionfr' => '<div>Explorez les derni&egrave;res innovations et opportunit&eacute;s dans le secteur de la sant&eacute; en Afrique</div>',
                'imageurl' => '/storage/eventFiles/aPIwK6TwttKvR9r9CmY7ltH3QIYS8q34IkBnGhis.png',
                'isPublished' => 1,
                'user_id' => 1,
            ],
            [
                'id' => 4,
                'created_at' => '2025-01-06 09:12:02',
                'updated_at' => '2025-01-06 09:12:02',
                'deleted_at' => null,
                'start_at' => '2025-01-11',
                'ends_at' => '2025-01-12',
                'titleAr' => 'ar',
                'titleFR' => 'MEDEX',
                'descriptionAr' => '<div>ar</div>',
                'descriptionfr' => '<div>Explorez les derni&egrave;res innovations et opportunit&eacute;s dans le secteur de la sant&eacute; en Afrique</div>',
                'imageurl' => '/storage/eventFiles/aPIwK6TwttKvR9r9CmY7ltH3QIYS8q34IkBnGhis.png',
                'isPublished' => 1,
                'user_id' => 1,
            ],
            [
                'id' => 5,
                'created_at' => '2025-01-06 09:12:02',
                'updated_at' => '2025-01-06 09:12:02',
                'deleted_at' => null,
                'start_at' => '2025-01-11',
                'ends_at' => '2025-01-12',
                'titleAr' => 'ar',
                'titleFR' => 'MEDEX',
                'descriptionAr' => '<div>ar</div>',
                'descriptionfr' => '<div>Explorez les derni&egrave;res innovations et opportunit&eacute;s dans le secteur de la sant&eacute; en Afrique</div>',
                'imageurl' => '/storage/eventFiles/aPIwK6TwttKvR9r9CmY7ltH3QIYS8q34IkBnGhis.png',
                'isPublished' => 1,
                'user_id' => 1,
            ],
        ]);
    }
}
