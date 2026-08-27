<?php

namespace App\Models;

use App\Enums\LifeStatus;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class EmployeeChild extends Model
{
    //
    use HasUlids;

    protected $fillable = [
        'employee_id',
        'nom',
        'prenom',
        'post_nom',
        'date_naissance',
        'statut_vie',
    ];

    protected $casts = [
        'date_naissance' => 'date',
        'statut_vie' => LifeStatus::class,
    ];

    public function employee(): BelongsTo
    {
        return $this->belongsTo(Employee::class);
    }
}
