<?php

namespace Modules\ClientApi\Http\Controllers\Subscriber;

use Modules\ClientApi\Http\Controllers\ClientApiController;
use Modules\ClientApi\Http\Requests\SubscriberRequest;
use Modules\ClientApi\Models\Subscriber;

class SubscriberController extends ClientApiController
{
    public function store(SubscriberRequest $request)
    {
        $attributes = $request->validated();

        Subscriber::create($attributes);

        return $this->respondSuccess([
            'message' => 'Subscriber created successfully'
        ]);
    }

}