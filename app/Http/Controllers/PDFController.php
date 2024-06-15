<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;

class PDFController extends Controller
{
    public function showPDFView()
    {
        return view('pdf_view');
    }

    public function generatePDF()
    {
        $data = []; // Any dynamic data you need to pass to the view
        $pdf = PDF::loadView('pdf_view', $data);
        return $pdf->download('document.pdf');
    }
}
