<?php

namespace App\Enums;

enum Lang: string
{
    case EN = 'en';

    case RU = 'ru';

    case DE = 'de';

    case SP = 'sp';

    public static function names()
    {
        return array_column(self::cases(), 'value');
    }

    public static function default()
    {
        return self::EN->value;
    }

}
