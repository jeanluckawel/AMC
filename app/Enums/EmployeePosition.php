<?php

namespace App\Enums;

enum EmployeePosition: string
{
    //

    case JUNIOR = 'junior';
    case SENIOR = 'senior';
    case MANAGER = 'manager';


    public function label(): string
    {
        return match ($this) {
            self::JUNIOR => 'Junior',
            self::SENIOR => 'Senior',
            self::MANAGER => 'Manager',
        };
    }
}
