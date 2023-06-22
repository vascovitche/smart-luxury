<?php

use Illuminate\Support\Facades\Route;
use Modules\Admin\Http\Controllers\Dashboard\DashboardController;

Route::get('/dashboard', DashboardController::class)->middleware('auth:admin')->name('home');
