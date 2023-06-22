<?php

namespace Modules\Admin\Http\Controllers\Dashboard;

use Modules\Admin\Http\Controllers\AdminController;

class DashboardController extends AdminController
{
    public function __invoke()
    {
        return $this->view('dashboard.index');
    }

}
