<?php

namespace App\Enums;

enum MaritalStatus: string
{
    //
    case CELIBATAIRE = 'celibataire';
    case MARIE = 'marie';
    case DIVORCE = 'divorce';
    case VEUF = 'veuf';


    public function label(): string
    {
        return match ($this) {
            self::CELIBATAIRE => 'Célibataire',
            self::MARIE => 'Marié(e)',
            self::DIVORCE => 'Divorcé(e)',
            self::VEUF => 'Veuf(ve)'
        };
    }
}
