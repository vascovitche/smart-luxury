<?php

namespace Modules\ClientApi\Http\Controllers\Brochure;

use Illuminate\Support\Facades\Storage;
use Modules\ClientApi\Http\Controllers\ClientApiController;

class BrochureController extends ClientApiController
{
    public function download()
    {
        $path = Storage::path('/brochure/brochure.pdf');

        return response()->download($path, 'brochure.pdf');
    }

}