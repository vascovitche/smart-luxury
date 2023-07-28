<?php

namespace Modules\Admin\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BrochureFileRequest extends FormRequest
{
    public function rules()
    {
        return [
            'brochure' => [
                'required',
                'file',
                'mimetypes:application/pdf'
            ]
        ];
    }
}