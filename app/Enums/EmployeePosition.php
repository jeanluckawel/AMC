<?php

namespace App\Enums;

enum EmployeePosition: string
{
    //

    case JUNIOR = 'junior';
    case SENIOR = 'senior';
    case EXECUTIF = 'executif';



    public function label(): string
    {
        return match ($this) {
            self::JUNIOR => 'Junior',
            self::SENIOR => 'Senior',
            self::EXECUTIF => 'executif',
        };
    }
}


