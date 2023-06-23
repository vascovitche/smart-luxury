<?php

namespace App\Models;

use App\Enums\OrderStatus;

class Order extends BaseModel
{
    protected $casts = [
        'status' => OrderStatus::class
    ];

}
