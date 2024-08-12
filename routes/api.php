<?php

use App\Http\Controllers\ConstantDataController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\ShippingQuoteController;
use App\Http\Controllers\SubscriberController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/login', [LoginController::class, 'login']);
Route::post('/generate-pdf', [PDFController::class, 'generatePDF']);

Route::get('get-contstants', [ConstantDataController::class, 'getConstants']);
Route::get('subscribers', [SubscriberController::class, 'getSubscribers'])->middleware('auth:sanctum');
Route::post('subscribers/create', [SubscriberController::class, 'setSubscriber']);

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
    Route::get('/', [ShippingQuoteController::class, 'getShippingQuotes'])->middleware('auth:sanctum');
    Route::post('create', [ShippingQuoteController::class, 'createShippingQuote']);

    Route::any('/preview', [ShippingQuoteController::class, 'previewQuote']);
    Route::any('/download', [ShippingQuoteController::class, 'downloadQuote']);
});