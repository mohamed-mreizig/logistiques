<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class PolitiquesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('politiques')->insert([
            [
                'id' => 1,
                'created_at' => '2024-12-30 03:14:44',
                'updated_at' => '2024-12-30 03:28:00',
                'deleted_at' => null,
                'titleAr' => 'ar',
                'titleFr' => 'Politique de Confidentialité',
                'descriptionWAr' => 'desc arb',
                'descriptionWFr' => 'Votre confidentialité est importante pour nous. Cette politique explique comment nous collectons, utilisons, partageons et protégeons vos données personnelles lorsque vous utilisez notre site web ou nos services. Nous pouvons collecter différentes catégories de données, notamment des informations personnelles telles que votre nom, prénom, adresse e-mail, ainsi que des données de navigation comme votre adresse IP, le type de navigateur utilisé et les pages visitées. Certaines informations peuvent être fournies volontairement via nos formulaires de contact ou dinscription. Les données collectées sont utilisées pour fournir et améliorer nos services, gérer votre compte et vos préférences, répondre à vos demandes, analyser lutilisation de notre site et respecter nos obligations légales et réglementaires. Nous ne vendons ni ne louons vos données personnelles. Cependant, elles peuvent être partagées avec nos prestataires de services pour assurer le bon fonctionnement du site, 
                ainsi qu’avec les autorités compétentes en cas dobligation légale. 
                Des mesures de sécurité sont mises en place pour protéger vos informations contre tout accès, modification ou divulgation
                 non autorisés. Nous nous engageons à assurer la confidentialité et lintégrité de vos données. 
                 Conformément à la réglementation en vigueur,
                  vous disposez de droits sur vos données personnelles, notamment le droit d’accès, 
                  de rectification, de suppression, de limitation du traitement, ainsi que d’opposition 
                  et de portabilité. Vous pouvez également retirer votre consentement à tout moment en nous contactant à <strong>[adresse de contact]</strong>. Notre site utilise des cookies afin daméliorer votre expérience de navigation. Vous pouvez les gérer ou les désactiver via les paramètres de votre navigateur. 
                  Cette politique de confidentialité peut être mise à jour à tout moment. 
                  Nous vous recommandons de la consulter régulièrement afin de rester informé des éventuelles modifications. 
                  Pour toute question ou demande relative à cette politique, vous pouvez nous contacter à <strong>[adresse de contact]</strong>',
                'isPublished' => 1
            ],
        ]);
    }
}
