<?php

namespace App\Models;

use App\Enums\LifeStatus;
use App\Enums\MaritalStatus;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{
    //

    use HasUlids, SoftDeletes;

    protected $fillable = [
        'matricule',
        'nom',
        'prenom',
        'post_nom',
        'situation_familiale',
        'statut_vie',
        'date_naissance',
        'lieu_naissance',
        'telephone',
        'adresse_complete',
        'nationalite',
        'numero_cnss',
        'numero_piece_identite',
        'date_expiration_piece',
        'nombre_enfants',
        'nombre_personnes_charge',
        'department_id',
    ];

    protected $casts = [
        'situation_familiale' => MaritalStatus::class,
        'statut_vie' => LifeStatus::class,

        'date_naissance' => 'date',
        'date_expiration_piece' => 'date',
    ];

    public function department(): BelongsTo
    {
        return $this->belongsTo(Department::class);
    }

    public function families(): HasMany
    {
        return $this->hasMany(EmployeeFamily::class);
    }

    public function children(): HasMany
    {
        return $this->hasMany(EmployeeChild::class);
    }

    public function emergencyContacts(): HasMany
    {
        return $this->hasMany(EmployeeEmergencyContact::class);
    }

    public function assignments(): HasMany
    {
        return $this->hasMany(EmployeeAssignment::class);
    }

    public function salaries(): HasMany
    {
        return $this->hasMany(EmployeeSalary::class);
    }
}
