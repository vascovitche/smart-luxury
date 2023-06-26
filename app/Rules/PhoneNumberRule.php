<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class PhoneNumberRule implements Rule
{
    private string $attribute;

    public function passes($attribute, $value): bool
    {
        $this->attribute = $attribute;

        return preg_match(
                '%^(?:(?:\(?(?:00|\+)([1-4]\d\d|[1-9]\d?)\)?)?[\-. \\\/]?)?((?:\(?\d+\)?[\-. \\\/]?)*)'
                . '(?:[\-. \\\/]?(?:#|ext\.?|extension|x)[\-. \\\/]?(\d+))?$%i',
                $value
            ) && strlen($value) >= 10;
    }

    public function message()
    {
        return 'The ' . $this->attribute . 'must be a valid phone number.';
    }
}
