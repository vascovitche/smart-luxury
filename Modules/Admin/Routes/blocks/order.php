<?php

use Illuminate\Support\Facades\Route;
use Modules\Admin\Http\Controllers\Order\OrderController;

Route::controller(OrderController::class)->prefix('orders')->name('orders.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::put('/{order}/status', 'updateStatus')->name('update-status');
});
