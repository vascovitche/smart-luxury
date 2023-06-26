<?php

namespace Modules\ClientApi\Models;

class Order extends \App\Models\Order
{
    protected $fillable = ['name', 'email', 'phone_number'];

}