<?php

namespace Modules\Admin\Http\Controllers\Order;

use App\Enums\OrderStatus;
use Illuminate\Validation\Rules\Enum;
use Modules\Admin\Http\Controllers\AdminController;
use Modules\Admin\Models\Order;

class OrderController extends AdminController
{
    public function index()
    {
        $orders = Order::paginate();

        return $this->view('order.index', [
            'orders' => $orders
        ]);
    }

    public function updateStatus(Order $order)
    {
        $attribute = request()->validate([
            'status' => ['required', new Enum(OrderStatus::class)]
        ]);

        $order->update($attribute);

        return redirect()->back();
    }

}