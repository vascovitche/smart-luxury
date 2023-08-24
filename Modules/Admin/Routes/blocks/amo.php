<?php

use Illuminate\Support\Facades\Route;
use Modules\Admin\Http\Controllers\Amo\AmoController;

Route::controller(AmoController::class)->name('amo.')->prefix('amo')->group(function () {
    Route::get('', 'index')->name('index');
    Route::get('integration', 'integration')->name('integration');
    Route::get('token', 'getAmoToken')->name('token');
});
