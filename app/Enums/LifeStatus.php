<?php

namespace App\Enums;

enum LifeStatus: string
{
    //
    case EN_VIE = 'en_vie';
    case DECEDE = 'decede';

    public function label(): string
    {
        return match ($this) {
            self::EN_VIE => 'En vie',
            self::DECEDE => 'Décédé(e)',
        };
    }
}
