<?php

namespace Modules\ClientApi\Http\Controllers\Order;

use App\Notifications\NewOrder;
use Modules\ClientApi\Http\Controllers\ClientApiController;
use Modules\ClientApi\Http\Requests\OrderRequest;
use Modules\ClientApi\Models\Order;

class OrderController extends ClientApiController
{
    public function store(OrderRequest $request)
    {
        $attributes = $request->validated();

        $order = Order::create($attributes);

        $order->notify(new NewOrder());

        return $this->respondSuccess('Order created successfully');

    }

}