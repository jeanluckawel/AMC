<?php

namespace App\Models;

use App\Enums\AssignmentStatus;
use App\Enums\EmployeeCategory;
use App\Enums\EmployeeGrade;
use App\Enums\EmployeeLevel;
use App\Enums\EmployeePosition;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class EmployeeAssignment extends Model
{
    //
    protected $fillable = [
        'employee_id',
        'department_id',
        'job_id',
        'contract_type_id',
        'work_schedule_id',

        'categorie',
        'niveau',
        'grade',
        'echelon',
        'coefficient',
        'position',

        'date_embauche',
        'date_debut',
        'date_fin',

        'situation_avant_embauche',
        'statut',
    ];

    protected $casts = [
        'categorie' => EmployeeCategory::class,
        'niveau' => EmployeeLevel::class,
        'grade' => EmployeeGrade::class,
        'position' => EmployeePosition::class,
        'statut' => AssignmentStatus::class,

        'coefficient' => 'decimal:4',

        'date_embauche' => 'date',
        'date_debut' => 'date',
        'date_fin' => 'date',
    ];

    public function employee(): BelongsTo
    {
        return $this->belongsTo(Employee::class);
    }

    public function department(): BelongsTo
    {
        return $this->belongsTo(Department::class);
    }

    public function jobTitle(): BelongsTo
    {
        return $this->belongsTo(JobTitle::class);
    }

    public function contractType(): BelongsTo
    {
        return $this->belongsTo(ContractType::class);
    }

    public function workSchedule(): BelongsTo
    {
        return $this->belongsTo(WorkSchedule::class);
    }

    public function salaries(): HasMany
    {
        return $this->hasMany(EmployeeSalary::class);
    }
}
