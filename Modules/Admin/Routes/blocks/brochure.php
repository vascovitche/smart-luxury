<?php

use Illuminate\Support\Facades\Route;
use Modules\Admin\Http\Controllers\Brochure\BrochureController;

Route::controller(BrochureController::class)->prefix('brochure')->name('brochure.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::post('/upload', 'upload')->name('upload');
});
