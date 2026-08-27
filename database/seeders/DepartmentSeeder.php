<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DepartmentSeeder extends Seeder
{
    public function run(): void
    {
        $departments = [
            [
                'name' => 'Administration',
                'code' => 'ADM',
                'description' => 'Gestion administrative et organisation générale de l’entreprise.',
            ],
            [
                'name' => 'Ressources Humaines',
                'code' => 'RH',
                'description' => 'Gestion du personnel, recrutement, contrats et administration des employés.',
            ],
            [
                'name' => 'Finance et Comptabilité',
                'code' => 'FIN',
                'description' => 'Gestion financière, comptabilité, budgets et opérations financières.',
            ],
            [
                'name' => 'Informatique',
                'code' => 'IT',
                'description' => 'Gestion des systèmes informatiques, réseaux, logiciels et support technique.',
            ],
            [
                'name' => 'Logistique',
                'code' => 'LOG',
                'description' => 'Gestion des stocks, transports, équipements et approvisionnements.',
            ],
            [
                'name' => 'Achats',
                'code' => 'ACH',
                'description' => 'Gestion des achats, fournisseurs et approvisionnements.',
            ],
            [
                'name' => 'Juridique',
                'code' => 'JUR',
                'description' => 'Gestion des questions juridiques et conformité de l’entreprise.',
            ],
            [
                'name' => 'Commercial',
                'code' => 'COM',
                'description' => 'Gestion commerciale, clients, ventes et développement des affaires.',
            ],
            [
                'name' => 'Production',
                'code' => 'PROD',
                'description' => 'Gestion des activités et opérations de production.',
            ],
            [
                'name' => 'Maintenance',
                'code' => 'MAINT',
                'description' => 'Maintenance des équipements, installations et infrastructures.',
            ],
        ];

        foreach ($departments as $department) {
            Department::updateOrCreate(
                [
                    'code' => $department['code'],
                ],
                [
                    'name' => $department['name'],
                    'code' => $department['code'],
                    'description' => $department['description'],
                ]
            );
        }
    }
}
