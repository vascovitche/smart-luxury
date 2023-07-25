<?php

namespace App\Enums;

enum ImageType: string
{
    case INTERIOR = 'interior';
    case EXTERIOR = 'exterior';
    case CONCEPT = 'concept';
    case PLAN = 'plan';
    case BENEFIT = 'benefit';
    case OTHER = 'other';

    public static function forSelect()
    {
        return collect(self::cases())->pluck('value', 'value');
    }

}
