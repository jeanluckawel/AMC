<?php

namespace App\Enums;

enum Genre: string
{
    case H = 'homme';
    case F = 'femme';

    public function label(): string
    {
        return match ($this) {
            self::H => 'Homme',
            self::F => 'Femme',
        };
    }
}


