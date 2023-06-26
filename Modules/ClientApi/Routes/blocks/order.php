<?php

use Illuminate\Support\Facades\Route;
use Modules\ClientApi\Http\Controllers\Order\OrderController;

Route::controller(OrderController::class)->prefix('orders')->group(function () {
    Route::post('/', 'store');
});
