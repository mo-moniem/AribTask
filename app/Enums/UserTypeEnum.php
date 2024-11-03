<?php

namespace App\Enums;

enum UserTypeEnum:int
{
    case MANAGER = 1;
    case EMPLOYEE = 2;

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }

    public function name():string
    {
        return match($this) {
            self::MANAGER => __('Manager'),
            self::EMPLOYEE => __('Employee'),
        };
    }

    public static function getLabels(): array
    {
        return [
            self::MANAGER->value => __('Manager'),
            self::EMPLOYEE->value => __('Employee'),
        ];
    }

}
