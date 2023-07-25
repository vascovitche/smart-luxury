<?php

use Illuminate\Support\Facades\Route;
use Modules\Admin\Http\Controllers\Property\PropertyController;
use Modules\Admin\Http\Controllers\Property\PropertyImageController;

Route::resource('property', PropertyController::class)->except(['create']);
Route::put('/property/{property}update-translation', [PropertyController::class, 'updateTranslation'])
    ->name('property.update-translation');

Route::controller(PropertyImageController::class)
    ->prefix('property')->name('property.image.')->group(static function () {
    Route::put('{property}/image', 'upload')->name('upload');
//    Route::delete('{property}/image/{image}', 'destroy')->name('destroy');
//    Route::put('{property}/image/{image}/make-main', 'makeMain')->name('make-main');
});

//Route::put('property/{property}/update-base', [PropertyController::class, 'updateBase'])->name('property.update-base');
//Route::put('property/{property}/update-promotion', [PropertyController::class, 'updatePromotion'])->name('property.update-promotion');
//
//Route::put('property/{property}/update-country', [PropertyController::class, 'updateCountry'])->name('property.update-country');
//Route::put('property/{property}/update-city', [PropertyController::class, 'updateCity'])->name('property.update-city');
//Route::put('property/{property}/toggle-publish', [PropertyController::class, 'togglePublish'])->name('property.toggle-publish');
//Route::put('property/{property}/update-implement', [PropertyController::class, 'updateImplement'])->name('property.update-implement');
//
//Route::put('property/{property}/update-locations', [PropertyController::class, 'updateLocations'])->name('property.update-locations');
//Route::put('property/{property}/update-infrastructures', [PropertyController::class, 'updateInfrastructures'])->name('property.update-infrastructures');
//Route::put('property/{property}/update-leisures', [PropertyController::class, 'updateLeisures'])->name('property.update-leisures');
//Route::put('property/{property}/update-additionals', [PropertyController::class, 'updateAdditionals'])->name('property.update-additionals');
//
//Route::put('property/{property}/update-labels', [PropertyController::class, 'updateLabels'])->name('property.update-labels');
//
//Route::get('property/{property}/index-image', [PropertyImageController::class, 'index'])->name('property.index-image');
//Route::put('property/{property}/upload-image', [PropertyImageController::class, 'upload'])->name('property.upload-image');
//Route::delete('property/destroy-image/{image}', [PropertyImageController::class, 'destroy'])->name('property.destroy-image');
