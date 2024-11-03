<?php

namespace App\Enums;

enum StatusEnum:int
{
    case PENDING = 1;
    case APPROVED = 2;


    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }

    public function name():string
    {
        return match($this) {
            self::PENDING => __('PENDING'),
            self::APPROVED => __('APPROVED'),
        };
    }

    public static function getLabels(): array
    {
        return [
            self::PENDING->value => __('PENDING'),
            self::APPROVED->value => __('APPROVED'),
        ];
    }

}
