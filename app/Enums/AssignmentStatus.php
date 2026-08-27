<?php

namespace App\Enums;

enum AssignmentStatus: string
{
    //

    case ACTIVE = 'active';
    case TERMINEE = 'terminee';
    case SUSPENDUE = 'suspendue';

    public function label(): string
    {
        return match ($this) {
            self::ACTIVE => 'Active',
            self::TERMINEE => 'Terminée',
            self::SUSPENDUE => 'Suspendue',
        };
    }
}
