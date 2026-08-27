<?php

namespace Database\Seeders;

use App\Enums\Genre;
use App\Enums\LifeStatus;
use App\Enums\MaritalStatus;
use App\Models\Department;
use App\Models\Employee;
use Illuminate\Database\Seeder;

class EmployeeSeeder extends Seeder
{
    public function run(): void
    {
        $departments = Department::query()
            ->orderBy('id')
            ->pluck('id');

        if ($departments->isEmpty()) {
            $this->command->error(
                'Aucun département trouvé. Veuillez créer les départements avant les employés.'
            );

            return;
        }

        $employees = [
            [
                'nom' => 'KABILA',
                'prenom' => 'Jean',
                'post_nom' => 'MUKENDI',
                'genre' => Genre::H,
                'situation_familiale' => MaritalStatus::MARIE,
                'statut_vie' => LifeStatus::EN_VIE,
                'date_naissance' => '1988-04-15',
                'lieu_naissance' => 'Lubumbashi',
                'telephone' => '0812345678',
                'adresse_complete' => 'Avenue des Écoles, Lubumbashi',
                'nationalite' => 'Congolaise',
                'numero_cnss' => 'CNSS-000001',
                'numero_piece_identite' => 'ID-001234567',
                'date_expiration_piece' => '2030-04-15',

            ],

            [
                'nom' => 'KALALA',
                'prenom' => 'Marie',
                'post_nom' => 'KASONGO',
                'genre' => Genre::F,
                'situation_familiale' => MaritalStatus::CELIBATAIRE,
                'statut_vie' => LifeStatus::EN_VIE,
                'date_naissance' => '1992-08-21',
                'lieu_naissance' => 'Kolwezi',
                'telephone' => '0823456789',
                'adresse_complete' => 'Quartier Mutoshi, Kolwezi',
                'nationalite' => 'Congolaise',
                'numero_cnss' => 'CNSS-000002',
                'numero_piece_identite' => 'ID-001234568',
                'date_expiration_piece' => '2031-08-21',

            ],

            [
                'nom' => 'MUKENDI',
                'prenom' => 'Patrick',
                'post_nom' => 'KABONGO',
                'genre' => Genre::H,
                'situation_familiale' => MaritalStatus::MARIE,
                'statut_vie' => LifeStatus::EN_VIE,
                'date_naissance' => '1985-11-03',
                'lieu_naissance' => 'Likasi',
                'telephone' => '0834567890',
                'adresse_complete' => 'Quartier Panda, Likasi',
                'nationalite' => 'Congolaise',
                'numero_cnss' => 'CNSS-000003',
                'numero_piece_identite' => 'ID-001234569',
                'date_expiration_piece' => '2029-11-03',

            ],

            [
                'nom' => 'TSHILOMBO',
                'prenom' => 'Grace',
                'post_nom' => 'MWAMBA',
                'genre' => Genre::F,
                'situation_familiale' => MaritalStatus::CELIBATAIRE,
                'statut_vie' => LifeStatus::EN_VIE,
                'date_naissance' => '1995-02-17',
                'lieu_naissance' => 'Lubumbashi',
                'telephone' => '0845678901',
                'adresse_complete' => 'Quartier Golf, Lubumbashi',
                'nationalite' => 'Congolaise',
                'numero_cnss' => 'CNSS-000004',
                'numero_piece_identite' => 'ID-001234570',
                'date_expiration_piece' => '2032-02-17',

            ],

            [
                'nom' => 'KASONGO',
                'prenom' => 'David',
                'post_nom' => 'KALALA',
                'genre' => Genre::H,
                'situation_familiale' => MaritalStatus::DIVORCE,
                'statut_vie' => LifeStatus::EN_VIE,
                'date_naissance' => '1990-06-29',
                'lieu_naissance' => 'Kolwezi',
                'telephone' => '0856789012',
                'adresse_complete' => 'Quartier Manika, Kolwezi',
                'nationalite' => 'Congolaise',
                'numero_cnss' => 'CNSS-000005',
                'numero_piece_identite' => 'ID-001234571',
                'date_expiration_piece' => '2030-06-29',

            ],

            [
                'nom' => 'MBUYI',
                'prenom' => 'Esther',
                'post_nom' => 'KABILA',
                'genre' => Genre::F,
                'situation_familiale' => MaritalStatus::MARIE,
                'statut_vie' => LifeStatus::EN_VIE,
                'date_naissance' => '1987-09-12',
                'lieu_naissance' => 'Lubumbashi',
                'telephone' => '0867890123',
                'adresse_complete' => 'Avenue Lumumba, Lubumbashi',
                'nationalite' => 'Congolaise',
                'numero_cnss' => 'CNSS-000006',
                'numero_piece_identite' => 'ID-001234572',
                'date_expiration_piece' => '2029-09-12',

            ],

            [
                'nom' => 'KABONGO',
                'prenom' => 'Joseph',
                'post_nom' => 'MUKADI',
                'genre' => Genre::H,
                'situation_familiale' => MaritalStatus::VEUF,
                'statut_vie' => LifeStatus::EN_VIE,
                'date_naissance' => '1983-01-25',
                'lieu_naissance' => 'Likasi',
                'telephone' => '0878901234',
                'adresse_complete' => 'Quartier Centre, Likasi',
                'nationalite' => 'Congolaise',
                'numero_cnss' => 'CNSS-000007',
                'numero_piece_identite' => 'ID-001234573',
                'date_expiration_piece' => '2028-01-25',

            ],

            [
                'nom' => 'MUTOMBO',
                'prenom' => 'Chantal',
                'post_nom' => 'KALUME',
                'genre' => Genre::F,
                'situation_familiale' => MaritalStatus::CELIBATAIRE,
                'statut_vie' => LifeStatus::EN_VIE,
                'date_naissance' => '1994-12-08',
                'lieu_naissance' => 'Kolwezi',
                'telephone' => '0889012345',
                'adresse_complete' => 'Quartier Dilala, Kolwezi',
                'nationalite' => 'Congolaise',
                'numero_cnss' => 'CNSS-000008',
                'numero_piece_identite' => 'ID-001234574',
                'date_expiration_piece' => '2031-12-08',

            ],

            [
                'nom' => 'MWAPE',
                'prenom' => 'Michel',
                'post_nom' => 'KASONGO',
                'genre' => Genre::H,
                'situation_familiale' => MaritalStatus::MARIE,
                'statut_vie' => LifeStatus::EN_VIE,
                'date_naissance' => '1989-03-19',
                'lieu_naissance' => 'Lubumbashi',
                'telephone' => '0890123456',
                'adresse_complete' => 'Quartier Kenya, Lubumbashi',
                'nationalite' => 'Congolaise',
                'numero_cnss' => 'CNSS-000009',
                'numero_piece_identite' => 'ID-001234575',
                'date_expiration_piece' => '2030-03-19',

            ],

            [
                'nom' => 'KALONJI',
                'prenom' => 'Sarah',
                'post_nom' => 'MUKENDI',
                'genre' => Genre::F,
                'situation_familiale' => MaritalStatus::CELIBATAIRE,
                'statut_vie' => LifeStatus::EN_VIE,
                'date_naissance' => '1996-07-14',
                'lieu_naissance' => 'Kolwezi',
                'telephone' => '0901234567',
                'adresse_complete' => 'Quartier Kapata, Kolwezi',
                'nationalite' => 'Congolaise',
                'numero_cnss' => 'CNSS-000010',
                'numero_piece_identite' => 'ID-001234576',
                'date_expiration_piece' => '2032-07-14',

            ],
        ];

        foreach ($employees as $index => $data) {
            $number = str_pad($index + 1, 3, '0', STR_PAD_LEFT);

            $data['matricule'] = "AMC-OA{$number}";

            $data['department_id'] =
                $departments[$index % $departments->count()];

            Employee::updateOrCreate(
                [
                    'matricule' => $data['matricule'],
                ],
                $data
            );
        }

        $this->command->info(
            count($employees).' employés ont été créés avec succès.'
        );
    }
}
