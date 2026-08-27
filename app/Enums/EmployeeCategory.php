<?php

namespace App\Enums;

enum EmployeeCategory: string
{
    //
    case CADRE = 'cadre';
    case AGENT_MAITRISE = 'agent_maitrise';
    case EMPLOYE = 'employe';
    case OUVRIER = 'ouvrier';

    public function label(): string
    {
        return match ($this) {
            self::CADRE => 'Cadre',
            self::AGENT_MAITRISE => 'Agent de maîtrise',
            self::EMPLOYE => 'Employé',
            self::OUVRIER => 'Ouvrier',
        };
    }
}
