<?php

namespace App\Models;

use App\Enums\OrderStatus;
use Illuminate\Notifications\Notifiable;

class Order extends BaseModel
{
    use Notifiable;
    protected $casts = [
        'status' => OrderStatus::class
    ];

}
