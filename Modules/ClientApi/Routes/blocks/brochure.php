<?php

use Illuminate\Support\Facades\Route;
use Modules\ClientApi\Http\Controllers\Brochure\BrochureController;

Route::controller(BrochureController::class)->prefix('brochure')->group(function () {
    Route::get('/', 'download');
});
