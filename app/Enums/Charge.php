<?php

namespace App\Enums;

enum Charge: string
{
    case PERSONNE_EN_CHARGE = 'Personne_En_Charge';
    case ENFANT_EN_CHARGE = 'Enfant_En_Charge';

    public function label(): string
    {
        return match ($this) {
            self::PERSONNE_EN_CHARGE => 'Enfant en charge',
            self::ENFANT_EN_CHARGE => 'Personne en charge',
        };
    }
}
