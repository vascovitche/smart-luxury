<?php

namespace Modules\Admin\Http\Controllers;

use App\Enums\OrderStatus;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Modules\Admin\Models\Order;

abstract class AdminController
{
    use ValidatesRequests;

    private function getOrders()
    {
        return Order::where('status', OrderStatus::NEW->value)->count();
    }

    protected function view($view, array $data = [])
    {
        $data['orderCount'] = $this->getOrders();
        return view('admin::' . $view, $data);
    }
}
