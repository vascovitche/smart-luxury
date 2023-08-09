<?php

use Illuminate\Support\Facades\Route;
use Modules\ClientApi\Http\Controllers\Subscriber\SubscriberController;

Route::controller(SubscriberController::class)->prefix('subscribers')->group(function () {
    Route::post('/', 'store')->middleware('cors');
});
