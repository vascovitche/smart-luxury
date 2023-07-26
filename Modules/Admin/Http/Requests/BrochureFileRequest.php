<?php

namespace Modules\Admin\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\File;

class BrochureFileRequest extends FormRequest
{
    public function rules()
    {
        return [
            'brochure' => [
                'required',
                'file',
                'mimetypes:application/pdf,image/jpeg,image/png,application/zip'
            ]
        ];
    }
}