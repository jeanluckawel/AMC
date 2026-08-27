<?php

namespace App\Models;

use App\Enums\Genre;
use App\Enums\LifeStatus;
use App\Enums\MaritalStatus;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{
    use HasUlids, SoftDeletes;

    protected $primaryKey = 'ulid';

    public $incrementing = false;

    protected $keyType = 'string';

    protected $fillable = [
        'ulid',
        'matricule',
        'nom',
        'prenom',
        'post_nom',
        'situation_familiale',
        'genre',
        'statut_vie',
        'date_naissance',
        'lieu_naissance',
        'telephone',
        'adresse_complete',
        'nationalite',
        'numero_cnss',
        'numero_piece_identite',
        'date_expiration_piece',
        'department_id',
    ];

    protected $casts = [
        'situation_familiale' => MaritalStatus::class,
        'statut_vie' => LifeStatus::class,
        'date_naissance' => 'date',
        'date_expiration_piece' => 'date',
        'genre' => Genre::class,
    ];

    public function department(): BelongsTo
    {
        return $this->belongsTo(Department::class, 'department_id', 'id');
    }

    public function families(): HasMany
    {
        return $this->hasMany(
            EmployeeFamily::class,
            'employee_id',
            'ulid'
        );
    }

    public function children(): HasMany
    {
        return $this->hasMany(EmployeeChild::class, 'employee_id', 'ulid');
    }

    public function emergencyContacts(): HasMany
    {
        return $this->hasMany(EmployeeEmergencyContact::class, 'employee_id', 'ulid');
    }

    public function assignments(): HasMany
    {
        return $this->hasMany(EmployeeAssignment::class, 'employee_id', 'ulid');
    }

    public function salaries(): HasMany
    {
        return $this->hasMany(EmployeeSalary::class, 'employee_id', 'ulid');
    }

    public function getFullNameAttribute(): string
    {
        return trim(
            $this->prenom.' '.
            $this->nom.' '.
            ($this->post_nom ?? '')
        );
    }
    public function calculerAge(): ?int
    {
        return $this->date_naissance?->age;
    }
}
