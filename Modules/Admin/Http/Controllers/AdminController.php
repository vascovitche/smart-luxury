<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Foundation\Validation\ValidatesRequests;

abstract class AdminController
{
    use ValidatesRequests;

    protected function view($view, array $data = [])
    {
        return view('admin::' . $view, $data);
    }
}
