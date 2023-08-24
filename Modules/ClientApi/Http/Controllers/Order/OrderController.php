<?php

namespace Modules\ClientApi\Http\Controllers\Order;

use App\Actions\CacheAmoCRMToken;
use App\Notifications\NewOrder;
use Illuminate\Support\Facades\Http;
use Modules\ClientApi\Http\Controllers\ClientApiController;
use Modules\ClientApi\Http\Requests\OrderRequest;
use Modules\ClientApi\Models\Order;

class OrderController extends ClientApiController
{
    public function store(OrderRequest $request)
    {
        $attributes = $request->validated();

        $order = Order::create($attributes);

        $this->sendDataToAmoCRM($attributes);

        $order->notify(new NewOrder());

        return $this->respondSuccess('Order created successfully');

    }

    private function sendDataToAmoCRM($attributes)
    {
        $accessToken = (new CacheAmoCRMToken)->execute();

        $data = $this->formRequestData($attributes);

        try {
            Http::withHeaders([
                'Content-type' => 'application/json',
                'Authorization' => 'Bearer ' . $accessToken['accessToken'],
            ])->post(config('amocrm.referer') . config('amocrm.api_uri') . 'leads', $data);
        } catch (\Exception $e) {
            $this->respondError($e->getMessage(), 500);
        }
    }

    private function formRequestData($attributes)
    {
        return [
            [
                'name' => $attributes['name'] . ' ' . $attributes['phone_number'],
                'custom_fields_values' => [
                    [
                        'field_code' => config('amocrm.custom_fields.customer_name'),
                        'values' => [
                            [
                                'value' => $attributes['name'],
                            ],
                        ],
                    ],
                    [
                        'field_code' => config('amocrm.custom_fields.customer_phone_number'),
                        'values' => [
                            [
                                'value' => $attributes['phone_number'],
                            ],
                        ],
                    ],
                    [
                        'field_code' => config('amocrm.custom_fields.customer_email'),
                        'values' => [
                            [
                                'value' => $attributes['email'] ?? 'No email',
                            ],
                        ],
                    ],
                    [
                        'field_code' => config('amocrm.custom_fields.customer_flat_id'),
                        'values' => [
                            [
                                'value' => $attributes['flat_id'] ?? 'No flat id',
                            ],
                        ],
                    ],
                ],
            ]
        ];
    }

}