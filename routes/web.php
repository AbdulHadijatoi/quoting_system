<?php

use App\Http\Controllers\PDFController;
use App\Http\Controllers\QuoteController;
use Illuminate\Support\Facades\Route;



Route::get('/', [QuoteController::class, 'index'])->name('front_home');
Route::post('/generate-pdf', [PDFController::class, 'generatePDF'])->name('pdf.generate');