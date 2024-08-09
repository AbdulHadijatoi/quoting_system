<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\PDFController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::post('/login', [LoginController::class, 'login']);
Route::post('/generate-pdf', [PDFController::class, 'generatePDF']);
