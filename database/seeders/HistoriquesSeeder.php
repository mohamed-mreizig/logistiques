<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class HistoriquesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('historiques')->insert([
            [
                'id' => 1,
                'created_at' => '2024-12-29 23:49:03',
                'updated_at' => '2024-12-30 00:15:43',
                'deleted_at' => null,
                'histoAr' => 'some ar',
                'histoFR' => "La nécessité d´avoir une structure capable de gérer, traiter et diffuser toutes les informations au niveau national a conduit en 1986 à la tenue d´un atelier sur le processus gestionnaire.\r\nLes recommandations issues de cet atelier ont donné suite la signature d’un contrat entre USAID, l’Université de Tula et le gouvernement du Niger en 1987, puis dans la même lancée un séminaire national sur le SNIS a été organisé.\r\n\r\nEnsuite a eu lieu en 1989 la formation des formateurs sur le système d´Information Sanitaire, puis en 1992 la définition des indicateurs de santé.",
                'logoUrl' => 'img',
                'isPublished' => 0,
                'user_id' => 3,
            ],
            [
                'id' => 2,
                'created_at' => '2024-12-29 23:49:03',
                'updated_at' => '2024-12-31 16:06:40',
                'deleted_at' => null,
                'histoAr' => '<p>some ar</p>',
                'histoFR' => '<p>La n&eacute;cessit&eacute; d&acute;avoir une structure capable de g&eacute;rer, traiter et diffuser toutes les informations au niveau national a conduit en 1986 &agrave; la tenue d&acute;un atelier sur le processus gestionnaire. Les recommandations issues de cet atelier ont donn&eacute; suite la signature d&rsquo;un contrat entre USAID, l&rsquo;Universit&eacute; de Tula et le gouvernement du Niger en 1987, puis dans la m&ecirc;me lanc&eacute;e un s&eacute;minaire national sur le SNIS a &eacute;t&eacute; organis&eacute;. Ensuite a eu lieu en 1989 la formation des formateurs sur le syst&egrave;me d&acute;Information Sanitaire, puis en 1992 la d&eacute;finition des indicateurs de sant&eacute;.</p>',
                'logoUrl' => '/storage/logoImg/GCUE9VC1ctWW3Cei1c7WJwdJjiARnzZvrzHuZXej.png',
                'isPublished' => 0,
                'user_id' => 1,
            ],
            [
                'id' => 3,
                'created_at' => '2024-12-29 23:49:03',
                'updated_at' => '2024-12-31 16:07:48',
                'deleted_at' => null,
                'histoAr' => '<p>some ar</p>',
                'histoFR' => '<div>LE MINISTERE DE LA SANTE PUBLIQUE Vu La Constitution du 26 D&eacute;cembre 1992: Vu Le D&eacute;cret N&deg;93-003/PRN du 17 Avril 1993 portant nomination du Premier Ministre; Vu Le D&eacute;cret N&deg;93-004/PRN du 23 Avril 1993, fixant la composition du Gouvernement; Vu Le D&eacute;cret N&deg;93-172/PRN/MSP du 3 D&eacute;cembre 1993, portant Organisation du Minist&egrave;re de la sant&eacute; Publique Vu Le D&eacute;cret N&deg;74-57/PCMS du 24 Avril 1974 portant cr&eacute;ation des Secr&eacute;tariats G&eacute;n&eacute;raux des Minist&egrave;res et fixant les attributions de leurs titulaires; La Direction du syst&egrave;me National d&acute;Information Sanitaire (DSNIS) a pour mission d&acute;appliquer la Politique Nationale du Minist&egrave;re de la Sant&eacute; Publique (MSP) en mati&egrave;re de gestion de l&acute;information sanitaire et de jouer le r&ocirc;le d&acute;un centre de ressource en information sur le plan &eacute;pid&eacute;miologique notamment, pour le MSP et ses partenaires. A ce titre, elle a pour t&acirc;che de: - recueillir les donn&eacute;es utiles pour l&acute;analyse de la situation sanitaire du Pays; - am&eacute;liorer la qualit&eacute; des donn&eacute;es collect&eacute;es par la standardisation des d&eacute;finitions de chaque maladie ou sympt&ocirc;me; - assurer la r&eacute;tro-information &agrave; tous les niveaux; - assurer l&acute;acc&egrave;s &agrave; la banque de donn&eacute;es aux diff&eacute;rentes structures du MSP et ses partenaires; OBJECTIFS GENERAUX Recueillir des donn&eacute;es utiles pour l&acute;analyse de la situation sanitaire en vue de permettre l&rsquo;&eacute;laboration de plan d&rsquo;action adapt&eacute; et am&eacute;liorer la qualit&eacute; des donn&eacute;es collect&eacute;es par la standardisation de la d&eacute;finition de cas de chaque maladie ou groupe de maladies. Faciliter la communication entre les diff&eacute;rents &eacute;chelons de la pyramide sanitaire par l&acute;information et la r&eacute;tro information. Analyser les donn&eacute;es &agrave; chaque niveau du syst&egrave;me de sant&eacute; et prendre des d&eacute;cisions adapt&eacute;es et fournir des informations fiables aux d&eacute;cideurs. OBJECTIFS SPECIFIQUES - Recueillir des donn&eacute;es utiles pour l&acute;analyse de la situation sanitaire du pays. - Am&eacute;liorer la qualit&eacute; des donn&eacute;es collect&eacute;es par la standardisation de la d&eacute;finition de chaque maladie ou sympt&ocirc;me. - Analyser les donn&eacute;es &agrave; chaque niveau du syst&egrave;me de sant&eacute; et prendre des d&eacute;cisions adapt&eacute;es. - Assurer la retro information &agrave; tous les niveaux. - Assurer l&acute;acc&egrave;s &agrave; la banque de donn&eacute;es aux diff&eacute;rentes structures du MSP et &agrave; ses partenaires. - Assurer la surveillance &eacute;pid&eacute;miologique et la police sanitaire.</div>',
                'logoUrl' => '/storage/logoImg/GCUE9VC1ctWW3Cei1c7WJwdJjiARnzZvrzHuZXej.png',
                'isPublished' => 0,
                'user_id' => 1,
            ],
            [
                'id' => 4,
                'created_at' => '2024-12-29 23:49:03',
                'updated_at' => '2024-12-31 16:07:48',
                'deleted_at' => null,
                'histoAr' => '<p>some ar</p>',
                'histoFR' => '<div><span style=\"font-size: 8pt;\">LE MINISTERE DE LA SANTE PUBLIQUE</span><br>Vu La Constitution du 26 D&eacute;cembre 1992: Vu Le D&eacute;cret N&deg;93-003/PRN du 17 Avril 1993 portant nomination du Premier Ministre; Vu Le D&eacute;cret N&deg;93-004/PRN du 23 Avril 1993, fixant la composition du Gouvernement; Vu Le D&eacute;cret N&deg;93-172/PRN/MSP du 3 D&eacute;cembre 1993, portant Organisation du Minist&egrave;re de la sant&eacute; Publique Vu Le D&eacute;cret N&deg;74-57/PCMS du 24 Avril 1974 portant cr&eacute;ation des Secr&eacute;tariats G&eacute;n&eacute;raux des Minist&egrave;res et fixant les attributions de leurs titulaires; La Direction du syst&egrave;me National d&acute;Information Sanitaire (DSNIS) a pour mission d&acute;appliquer la Politique Nationale du Minist&egrave;re de la Sant&eacute; Publique (MSP) en mati&egrave;re de gestion de l&acute;information sanitaire et de jouer le r&ocirc;le d&acute;un centre de ressource en information sur le plan &eacute;pid&eacute;miologique notamment, pour le MSP et ses partenaires. A ce titre, elle a pour t&acirc;che de: - recueillir les donn&eacute;es utiles pour l&acute;analyse de la situation sanitaire du Pays; - am&eacute;liorer la qualit&eacute; des donn&eacute;es collect&eacute;es par la standardisation des d&eacute;finitions de chaque maladie ou sympt&ocirc;me; - assurer la r&eacute;tro-information &agrave; tous les niveaux; - assurer l&acute;acc&egrave;s &agrave; la banque de donn&eacute;es aux diff&eacute;rentes structures du MSP et ses partenaires; OBJECTIFS GENERAUX Recueillir des donn&eacute;es utiles pour l&acute;analyse de la situation sanitaire en vue de permettre l&rsquo;&eacute;laboration de plan d&rsquo;action adapt&eacute; et am&eacute;liorer la qualit&eacute; des donn&eacute;es collect&eacute;es par la standardisation de la d&eacute;finition de cas de chaque maladie ou groupe de maladies. Faciliter la communication entre les diff&eacute;rents &eacute;chelons de la pyramide sanitaire par l&acute;information et la r&eacute;tro information. Analyser les donn&eacute;es &agrave; chaque niveau du syst&egrave;me de sant&eacute; et prendre des d&eacute;cisions adapt&eacute;es et fournir des informations fiables aux d&eacute;cideurs. OBJECTIFS SPECIFIQUES - Recueillir des donn&eacute;es utiles pour l&acute;analyse de la situation sanitaire du pays. - Am&eacute;liorer la qualit&eacute; des donn&eacute;es collect&eacute;es par la standardisation de la d&eacute;finition de chaque maladie ou sympt&ocirc;me. - Analyser les donn&eacute;es &agrave; chaque niveau du syst&egrave;me de sant&eacute; et prendre des d&eacute;cisions adapt&eacute;es. - Assurer la retro information &agrave; tous les niveaux. - Assurer l&acute;acc&egrave;s &agrave; la banque de donn&eacute;es aux diff&eacute;rentes structures du MSP et &agrave; ses partenaires. - Assurer la surveillance &eacute;pid&eacute;miologique et la police sanitaire.</div>',
                'logoUrl' => '/storage/logoImg/GCUE9VC1ctWW3Cei1c7WJwdJjiARnzZvrzHuZXej.png',
                'isPublished' => 1,
                'user_id' => 1,
            ],
        ]);
    }
}
