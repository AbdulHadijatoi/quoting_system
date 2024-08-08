<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;

class PDFController extends Controller {

    public function generatePDF() {
        $data = [];
        $pdf = PDF::loadView('pdf-layout.quotation-form', $data);
        return $pdf->stream('quotation_'.now().'.pdf');
    }
}
