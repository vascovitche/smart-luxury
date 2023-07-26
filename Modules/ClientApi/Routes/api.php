<?php

use Illuminate\Support\Facades\Route;

Route::prefix('/v1')->group(function () {
    require __DIR__ . '/blocks/order.php';
    require __DIR__ . '/blocks/subscriber.php';
    require __DIR__ . '/blocks/brochure.php';
});