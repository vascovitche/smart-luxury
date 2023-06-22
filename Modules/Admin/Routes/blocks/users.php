<?php

use Illuminate\Support\Facades\Route;
use Modules\Admin\Http\Controllers\Users\UsersController;

Route::resource('users', UsersController::class)->middleware('auth:admin');
