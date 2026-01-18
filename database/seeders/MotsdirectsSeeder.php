<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MotsdirectsSeeder extends Seeder
{
    public function run()
    {
        DB::table('motsdirects')->insert([
            'id' => 1,
            'created_at' => '2024-12-29 17:59:11',
            'updated_at' => '2024-12-29 18:07:32',
            'deleted_at' => null,
            'NameWAr' => 'ar',
            'NameWFr' => 'Dr . Ahmed Salem',
            'descriptionWAr' => 'ardesc',
            'descriptionWFr' => 'Fast 30 Jahre lang führte er es als Alleininhaber. 1998 trat Sohn Klaus weiss als Stellvertreter an die die Seit seines Vaters. Seit 2006 ist Diplom-Ingenieur lorKlaus Weiss alleiniger Geschäftsführer Fast 30 Jahrelor lang führte er es als Alleininhaber. 1998 trat Sohnlor Klaus weiss als Stellvertreter an die Seite seines Vaters. eite 2006 ist Diplom-Ingenieur Klaus Weiss loremalleiniger Geschäftsführer führte er es als Alleininhaber. 1998 trat Sohnlor Klaus weiss als Stellvertreter an die Seite seines Vaters. eite 2006 ist Diplom-Ingenieur Klaus Weiss loremalleiniger Geschäftsführer',
            'isPublished' => 1,
            'imgUrl' => 'storage/directeurImg/U2qYEY6ghzyzupaN7M4GYoTF7T4JTppFQrxw459J.png',
            'user_id' => 1,
        ]);
    }
}
