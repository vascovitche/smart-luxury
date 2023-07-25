<?php

namespace Modules\ClientApi\Http\Controllers\Subscriber;

use Modules\ClientApi\Http\Controllers\ClientApiController;
use Modules\ClientApi\Http\Requests\SubscriberRequest;
use Modules\ClientApi\Models\Subscriber;
use Spatie\Newsletter\Facades\Newsletter;

class SubscriberController extends ClientApiController
{
    public function store(SubscriberRequest $request)
    {
        $attributes = $request->validated();

        Subscriber::create($attributes);
        Newsletter::subscribe($attributes['email']);

        dd($attributes['email']);

        return $this->respondSuccess([
            'message' => 'Subscriber created successfully'
        ]);
    }

}