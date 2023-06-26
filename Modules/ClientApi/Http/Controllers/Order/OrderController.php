<?php

namespace Modules\ClientApi\Http\Controllers\Order;

use Modules\ClientApi\Http\Controllers\ClientApiController;
use Modules\ClientApi\Http\Requests\OrderRequest;
use Modules\ClientApi\Models\Order;

class OrderController extends ClientApiController
{
    public function store(OrderRequest $request)
    {
        $attributes = $request->validated();

        Order::create($attributes);

        return $this->respondSuccess([
            'message' => 'Order created successfully'
        ]);

    }

}