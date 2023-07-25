<?php

namespace Modules\Admin\Http\Controllers\Subscriber;

use Modules\Admin\Http\Controllers\AdminController;
use Modules\Admin\Models\Subscriber;
use Spatie\Newsletter\Facades\Newsletter;

class SubscriberController extends AdminController
{
    public function index()
    {
        $subscribers = Subscriber::paginate();

        return $this->view('subscribers.index', [
            'subscribers' => $subscribers
        ]);
    }

    public function destroy(Subscriber $subscriber)
    {
        $subscriber->delete();

        Newsletter::unsubscribe($subscriber->email);

        return redirect()->back()->with('success', 'Subscriber deleted successfully');
    }

}