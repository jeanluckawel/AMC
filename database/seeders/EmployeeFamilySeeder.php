<?php

namespace Database\Seeders;

use App\Enums\FamilyMemberType;
use App\Enums\LifeStatus;
use App\Models\Employee;
use App\Models\EmployeeFamily;
use Illuminate\Database\Seeder;

class EmployeeFamilySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $employees = Employee::query()->get();



        foreach ($employees as $employee) {

            EmployeeFamily::updateOrCreate(
                [
                    'employee_id' => $employee->ulid,
                    'type' => FamilyMemberType::PERE->value,
                ],
                [
                    'nom' => $employee->nom,
                    'prenom' => 'Pierre',
                    'post_nom' => null,
                    'date_naissance' => '1968-05-15',
                    'telephone' => '+243 999 111 222',
                    'profession' => 'Commerçant',
                    'statut_vie' => LifeStatus::EN_VIE->value,
                ]
            );


            EmployeeFamily::updateOrCreate(
                [
                    'employee_id' => $employee->ulid,
                    'type' => FamilyMemberType::MERE->value,
                ],
                [
                    'nom' => $employee->nom,
                    'prenom' => 'Marie',
                    'post_nom' => null,
                    'date_naissance' => '1972-08-20',
                    'telephone' => '+243 999 333 444',
                    'profession' => 'Enseignante',
                    'statut_vie' => LifeStatus::EN_VIE->value,
                ]
            );


            EmployeeFamily::updateOrCreate(
                [
                    'employee_id' => $employee->ulid,
                    'type' => FamilyMemberType::CONJOINT->value,
                ],
                [
                    'nom' => $employee->nom,
                    'prenom' => 'Jean',
                    'post_nom' => null,
                    'date_naissance' => '1985-03-12',
                    'telephone' => '+243 999 555 666',
                    'profession' => 'Comptable',
                    'statut_vie' => LifeStatus::EN_VIE->value,
                ]
            );


            EmployeeFamily::updateOrCreate(
                [
                    'employee_id' => $employee->ulid,
                    'type' => FamilyMemberType::PERE_CONJOINT->value,
                ],
                [
                    'nom' => $employee->nom,
                    'prenom' => 'Joseph',
                    'post_nom' => null,
                    'date_naissance' => '1955-11-05',
                    'telephone' => '+243 999 777 888',
                    'profession' => 'Retraité',
                    'statut_vie' => LifeStatus::EN_VIE->value,
                ]
            );


            EmployeeFamily::updateOrCreate(
                [
                    'employee_id' => $employee->ulid,
                    'type' => FamilyMemberType::MERE_CONJOINT->value,
                ],
                [
                    'nom' => $employee->nom,
                    'prenom' => 'Jeanne',
                    'post_nom' => null,
                    'date_naissance' => '1960-02-18',
                    'telephone' => '+243 999 888 999',
                    'profession' => 'Ménagère',
                    'statut_vie' => LifeStatus::EN_VIE->value,
                ]
            );
        }


    }
}
