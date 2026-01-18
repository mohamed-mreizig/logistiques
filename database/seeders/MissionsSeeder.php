<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MissionsSeeder extends Seeder
{
    public function run()
    {
        DB::table('missions')->insert([
            [
                'id' => 2,
                'created_at' => '2024-12-30 03:14:44',
                'updated_at' => '2024-12-30 03:28:00',
                'deleted_at' => null,
                'titleAr' => 'ar',
                'titleFr' => 'Arrêté n°00100/MSP/CAB du 29/08/1994 Portant Attributions et Organisation de la Direction du système National d´Information Sanitaire (DSNIS)',
                'descriptionWAr' => 'desc arb',
                'descriptionWFr' => 'LE MINISTERE DE LA SANTE PUBLIQUE
Vu La Constitution du 26 Décembre 1992:
Vu Le Décret N°93-003/PRN du 17 Avril 1993 portant nomination du Premier Ministre;
Vu Le Décret N°93-004/PRN du 23 Avril 1993, fixant la composition du Gouvernement;
Vu Le Décret N°93-172/PRN/MSP du 3 Décembre 1993, portant Organisation du Ministère de la santé Publique;
Vu Le Décret N°74-57/PCMS du 24 Avril 1974 portant création des Secrétariats Généraux des Ministères et fixant les attributions de leurs titulaires;

La Direction du système National d´Information Sanitaire (DSNIS) a pour mission d´appliquer la Politique Nationale du Ministère de la Santé Publique (MSP) en matière de gestion de l´information sanitaire et de jouer le rôle d´un centre de ressource en information sur le plan épidémiologique notamment, pour le MSP et ses partenaires.

A ce titre, elle a pour tâche de:

recueillir les données utiles pour l´analyse de la situation sanitaire du Pays;
améliorer la qualité des données collectées par la standardisation des définitions de chaque maladie ou symptôme;
assurer la rétro-information à tous les niveaux;
assurer l´accès à la banque de données aux différentes structures du MSP et ses partenaires;
assurer la surveillance épidémiologique et la police sanitaire.

OBJECTIFS GENERAUX
Recueillir des données utiles pour l´analyse de la situation sanitaire en vue de permettre l’élaboration de plan d’action adapté et améliorer la qualité des données collectées par la standardisation de la définition de cas de chaque maladie ou groupe de maladies.
Faciliter la communication entre les différents échelons de la pyramide sanitaire par l´information et la rétro information.
Analyser les données à chaque niveau du système de santé et prendre des décisions adaptées et fournir des informations fiables aux décideurs.

OBJECTIFS SPECIFIQUES
Recueillir des données utiles pour l´analyse de la situation sanitaire du pays.
Améliorer la qualité des données collectées par la standardisation de la définition de chaque maladie ou symptôme.
Analyser les données à chaque niveau du système de santé et prendre des décisions adaptées.
Assurer la retro information à tous les niveaux.
Assurer l´accès à la banque de données aux différentes structures du MSP et à ses partenaires.
Assurer la surveillance épidémiologique et la police sanitaire.',
                'isPublished' => 1
            ],
        ]);
    }
}
