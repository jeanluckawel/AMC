<?php

namespace App\Enums;

enum FamilyMemberType: string
{
    case PERE = 'pere';
    case MERE = 'mere';
    case CONJOINT = 'conjoint';
    case PERE_CONJOINT = 'pere_conjoint';
    case MERE_CONJOINT = 'mere_conjoint';

    public function label(): string
    {
        return match ($this) {
            self::PERE => 'Père',
            self::MERE => 'Mère',
            self::CONJOINT => 'Conjoint(e)',
            self::PERE_CONJOINT => 'Père du conjoint',
            self::MERE_CONJOINT => 'Mère du conjoint',
        };
    }
}
