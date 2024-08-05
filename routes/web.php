<?php

use App\Http\Controllers\PDFController;
use App\Http\Controllers\QuoteController;
use Illuminate\Support\Facades\Route;


Route::get('/pdf-view', [PDFController::class, 'showPDFView'])->name('pdf.view');
Route::get('/generate-pdf', [PDFController::class, 'generatePDF'])->name('pdf.generate');

Route::get('/', [QuoteController::class, 'showQuoteForm'])->name('front_home');
Route::post('/quote', [QuoteController::class, 'submitQuote'])->name('quote.submit');