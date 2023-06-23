<?php

namespace App\Enums;

enum OrderStatus: string
{
    case NEW = 'new';
    case VIEWED = 'viewed';
    case AT_WORK = 'at_work';
    case DONE = 'done';

    public static function forSelect()
    {
        return collect(self::cases())->pluck('value', 'value');
    }
}
