<?php

namespace App\Models;

use App\Enums\FamilyMemberType;
use App\Enums\LifeStatus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class EmployeeFamily extends Model
{
    //

    protected $fillable = [
        'employee_id',
        'type',
        'nom',
        'prenom',
        'post_nom',
        'date_naissance',
        'telephone',
        'profession',
        'statut_vie',
    ];

    protected $casts = [
        'type' => FamilyMemberType::class,
        'statut_vie' => LifeStatus::class,
        'date_naissance' => 'date',
    ];

    public function employee(): BelongsTo
    {
        return $this->belongsTo(Employee::class);
    }
}
