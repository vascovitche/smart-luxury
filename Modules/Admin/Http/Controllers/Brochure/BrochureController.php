<?php

namespace Modules\Admin\Http\Controllers\Brochure;

use Illuminate\Support\Facades\Storage;
use Modules\Admin\Http\Controllers\AdminController;
use Modules\Admin\Http\Requests\BrochureFileRequest;

class BrochureController extends AdminController
{
    public function index()
    {
        return $this->view('brochure.index');
    }

    public function upload(BrochureFileRequest $request)
    {
        $attributes = $request->validated();

        $fileName = 'brochure.' . $attributes['brochure']->extension();
        $path = '/brochure/' . $fileName;

        Storage::delete($path);

        Storage::put($path, $attributes['brochure']->getContent());

        return redirect()->back();
    }

}