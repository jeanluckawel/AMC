<?php

namespace Database\Seeders;

use App\Enums\Charge;
use App\Enums\LifeStatus;
use App\Models\Employee;
use App\Models\EmployeeChild;
use Illuminate\Database\Seeder;

class EmployeeChildSeeder extends Seeder
{
    public function run(): void
    {
        $employees = Employee::all();

        foreach ($employees as $employee) {
            $numberOfChildren = rand(0, 4);

            for ($i = 0; $i < $numberOfChildren; $i++) {

                EmployeeChild::create([
                    'employee_id' => $employee->ulid,

                    'nom' => fake()->lastName(),

                    'prenom' => fake()->firstName(),

                    'post_nom' => fake()->optional()->lastName(),

                    'date_naissance' => fake()
                        ->dateTimeBetween('-25 years', '-1 year')
                        ->format('Y-m-d'),

                    'charge' => fake()->randomElement(Charge::cases()),

                    'statut_vie' => fake()->randomElement(LifeStatus::cases()),
                ]);
            }
        }
    }
}
