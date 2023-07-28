<?php

namespace Modules\ClientApi\Http\Requests;

use App\Rules\PhoneNumberRule;
use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'phone_number' => ['required', new PhoneNumberRule()],
            'email' => ['nullable', 'email'],
            'flat_id' => ['nullable', 'string', 'max:255'],
        ];
    }

}