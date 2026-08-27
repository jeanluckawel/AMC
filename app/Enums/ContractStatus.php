<?php

namespace App\Enums;

enum ContractStatus: string
{
    case ACTIF = 'actif';
    case EXPIRE = 'expire';
    case RESILIE = 'resilie';
    case SUSPENDU = 'suspendu';

    public function label(): string
    {
        return match ($this) {
            self::ACTIF => 'Actif',
            self::EXPIRE => 'Expiré',
            self::RESILIE => 'Résilié',
            self::SUSPENDU => 'Suspendu',
        };
    }
}
