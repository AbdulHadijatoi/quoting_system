<?php

use App\Http\Controllers\ConstantDataController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\ShippingQuoteController;
use App\Http\Controllers\SubscriberController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::post('/login', [LoginController::class, 'login']);
Route::post('/generate-pdf', [PDFController::class, 'generatePDF']);

Route::get('get-constants', [ConstantDataController::class, 'getConstants']);

Route::prefix('subscribers')->group(function(){
    Route::post('/', [SubscriberController::class, 'getSubscribers'])->middleware('auth:sanctum');
    Route::post('create', [SubscriberController::class, 'setSubscriber']);
    Route::post('update', [SubscriberController::class, 'updateSubscriber'])->middleware('auth:sanctum');
    Route::post('delete', [SubscriberController::class, 'deleteSubscriber'])->middleware('auth:sanctum');
});

Route::prefix('employees')->group(function(){
    Route::post('/', [EmployeeController::class, 'getData']);
    Route::post('create', [EmployeeController::class, 'create']);
    Route::post('update', [EmployeeController::class, 'update']);
    Route::post('delete', [EmployeeController::class, 'delete']);
})->middleware('auth:sanctum');

Route::prefix('constants')->group(function(){
    Route::post('create-incoterm', [ConstantDataController::class, 'setIncoterm']);
    Route::post('create-measurement-unit', [ConstantDataController::class, 'setMeasurementUnit']);
    Route::post('create-merchandise-type', [ConstantDataController::class, 'setMerchandiseType']);
    Route::post('create-destination-location', [ConstantDataController::class, 'setDestinationLocation']);
    Route::post('create-origin-port', [ConstantDataController::class, 'setOriginPort']);
    Route::post('create-product-category', [ConstantDataController::class, 'setProductCategory']);
    Route::post('create-zone', [ConstantDataController::class, 'setZone']);
})->middleware('auth:sanctum');

Route::prefix('shipping-quotes')->group(function(){
    Route::post('/', [ShippingQuoteController::class, 'getShippingQuotes'])->middleware('auth:sanctum');
    Route::post('create', [ShippingQuoteController::class, 'createShippingQuote']);

    Route::any('/preview-pdf', [ShippingQuoteController::class, 'previewPDF'])->middleware('auth:sanctum');
    Route::any('/download-pdf', [ShippingQuoteController::class, 'downloadPDF'])->middleware('auth:sanctum');
});

Route::get('get-setting/{key?}', [SettingController::class, 'getSetting']);
Route::get('get-all-setting', [SettingController::class, 'getAllSetting']);

Route::middleware('auth:sanctum')->group(function(){
    Route::post('update-settings', [SettingController::class, 'updateSettings']);
});