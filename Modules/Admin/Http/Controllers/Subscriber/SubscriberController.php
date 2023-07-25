<?php

namespace Modules\Admin\Http\Controllers\Subscriber;

use Modules\Admin\Http\Controllers\AdminController;
use Modules\Admin\Models\Subscriber;

class SubscriberController extends AdminController
{
    public function index()
    {
        $subscribers = Subscriber::paginate();

        return $this->view('subscribers.index', [
            'subscribers' => $subscribers
        ]);
    }

}