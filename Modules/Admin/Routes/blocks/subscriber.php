<?php

use Illuminate\Support\Facades\Route;
use Modules\Admin\Http\Controllers\Subscriber\SubscriberController;

Route::controller(SubscriberController::class)->prefix('subscribers')->name('subscribers.')->group(function () {
    Route::get('/', 'index')->name('index');
});
