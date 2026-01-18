<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class ContactsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('contacts')->insert([
            [
                'id' => 1,
                'created_at' => '2024-12-29 18:22:29',
                'updated_at' => '2024-12-29 22:46:32',
                'deleted_at' => null,
                'telephone' => '44550666',
                'adressAr' => 'adrarb',
                'adressFR' => 'Niamey, Niger virage en face de la primature a côté de la pharmacie de la nation',
                'boitePostaleFR' => '13 378 ',
                'boitePostaleAR' => 'ar',
                'longe' => '-15.9744849',
                'alt' => '18.0885743',
                'email' => 'ds.msp.ne@gmail.com',
                'user_id' => 1,
                'isPublished' => 0,
            ],
            [
                'id' => 2,
                'created_at' => '2024-12-29 18:22:29',
                'updated_at' => '2024-12-29 22:46:32',
                'deleted_at' => null,
                'telephone' => '44550666',
                'adressAr' => 'adrarbe',
                'adressFR' => 'Niamey, Niger virage en face de la primature a côté de la pharmacie de la nation',
                'boitePostaleFR' => '13 378',
                'boitePostaleAR' => 'ar',
                'longe' => '-15.9744849',
                'alt' => '18.0885743',
                'email' => 'ds.msp.ne@gmail.com',
                'user_id' => 1,
                'isPublished' => 1,
            ],
        ]);
    }
}