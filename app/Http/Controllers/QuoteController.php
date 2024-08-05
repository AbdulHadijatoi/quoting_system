<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use Illuminate\Support\Facades\Mail;

class QuoteController extends Controller
{
    public function showQuoteForm()
    {
        return view('quote');
    }

    public function submitQuote(Request $request)
    {
        $data = $request->all();

        try {
            $pdf = PDF::loadView('pdf.quote', $data);
            return $pdf->download('proforma_'.time().'.pdf');
            // $pdfContent = $pdf->output();

            // Mail::send([], [], function ($message) use ($pdfContent, $data) {
            //     $message->to($data['email'])
            //         ->subject('Quotation PDF document')
            //         ->attachData($pdfContent, 'quotation.pdf', [
            //             'mime' => 'application/pdf',
            //         ]);
            // });

            

            // return redirect()->route('quote.form')->with('success', 'Quotation sent successfully!');
        } catch (\Exception $e) {
            return redirect()->route('quote.form')->with('error', 'There was an error sending the quotation. Please try again.');
        }
    }
}
