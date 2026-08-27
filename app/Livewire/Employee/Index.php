<?php

namespace App\Livewire\Employee;

use App\Enums\Genre;
use App\Enums\LifeStatus;
use App\Enums\MaritalStatus;
use App\Models\Department;
use App\Models\Employee;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public string $search = '';

    public string $departmentId = '';

    public string $genre = '';

    public string $situationFamiliale = '';

    public string $statutVie = '';

    public int $perPage = 50;

    public function updatedSearch(): void
    {
        $this->resetPage();
    }

    public function updatedDepartmentId(): void
    {
        $this->resetPage();
    }

    public function updatedGenre(): void
    {
        $this->resetPage();
    }

    public function updatedSituationFamiliale(): void
    {
        $this->resetPage();
    }

    public function updatedStatutVie(): void
    {
        $this->resetPage();
    }

    public function resetFilters(): void
    {
        $this->reset([
            'search',
            'departmentId',
            'genre',
            'situationFamiliale',
            'statutVie',
        ]);

        $this->resetPage();
    }

    public function render()
    {
        $employees = Employee::query()
            ->with('department')


            ->when(
                filled($this->search),
                function ($query) {
                    $search = '%' . trim($this->search) . '%';

                    $query->where(function ($query) use ($search) {
                        $query
                            ->where('matricule', 'like', $search)
                            ->orWhere('nom', 'like', $search)
                            ->orWhere('prenom', 'like', $search)
                            ->orWhere('post_nom', 'like', $search)
                            ->orWhere('telephone', 'like', $search);
                    });
                }
            )


            ->when(
                filled($this->departmentId),
                fn ($query) =>
                $query->where(
                    'department_id',
                    $this->departmentId
                )
            )


            ->when(
                filled($this->genre),
                fn ($query) =>
                $query->where(
                    'genre',
                    $this->genre
                )
            )


            ->when(
                filled($this->situationFamiliale),
                fn ($query) =>
                $query->where(
                    'situation_familiale',
                    $this->situationFamiliale
                )
            )


            ->when(
                filled($this->statutVie),
                fn ($query) =>
                $query->where(
                    'statut_vie',
                    $this->statutVie
                )
            )

            ->latest()
            ->paginate($this->perPage);

        $departments = Department::query()
            ->orderBy('name')
            ->get();

        return view('livewire.employee.index', [
            'employees' => $employees,
            'departments' => $departments,
            'genres' => Genre::cases(),
            'maritalStatuses' => MaritalStatus::cases(),
            'lifeStatuses' => LifeStatus::cases(),
        ]);
    }
}
