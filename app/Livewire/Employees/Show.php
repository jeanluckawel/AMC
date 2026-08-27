<?php

namespace App\Livewire\Employees;

use App\Models\Employee;
use Livewire\Component;

class Show extends Component
{
    public Employee $employee;

    public function mount(Employee $employee): void
    {
        $this->employee = $employee->load([
            'department',
//            'assignment',
            'children',
//            'salaries',
            'emergencyContacts',
            'families'
        ]);
    }

    public function render()
    {
        return view('livewire.employees.show');
    }
}
