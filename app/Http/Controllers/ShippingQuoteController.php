<?php

namespace App\Http\Controllers;

use App\Models\DestinationLocation;
use App\Models\Incoterm;
use App\Models\MeasurementUnit;
use App\Models\MerchandiseType;
use App\Models\OriginPort;
use App\Models\Setting;
use App\Models\ShippingQuote;
use App\Models\ShippingQuoteDetail;
use App\Models\Subscriber;
use App\Services\QuoteService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use PDF;
use Illuminate\Support\Facades\Mail;

class ShippingQuoteController extends BaseController {
    
    public $relations = [
        'shippingQuoteDetails.getIncoterm:id,name',
        'shippingQuoteDetails.measurementUnit:id,name',
        'shippingQuoteDetails.originPort:id,name',
        'shippingQuoteDetails.merchandiseType:id,name',
        'shippingQuoteDetails.destinationLocation:id,name',
    ];
    

    public function getShippingQuotes(Request $request) {
        $request->validate([
            'search' => 'nullable',
            'perPage' => 'required',
            'startDate' => 'nullable',
            'endDate' => 'nullable',
            'user_id' => 'nullable',
        ]);

        $search = $request->search;
        $perPage = $request->perPage;
        $startDate = $request->startDate;
        $endDate = $request->endDate;
        $user_id = $request->user_id;
    
        $query = ShippingQuote::with($this->relations);
    
        if ($search) {
            $query = $query->where(function($q) use($search) {
                $q->where('guest_name', 'like', "%$search%")
                  ->orWhere('guest_phone', 'like', "%$search%")
                  ->orWhere('guest_email', 'like', "%$search%")
                  ->orWhere('guest_address', 'like', "%$search%");
            });
        }
    
        if ($startDate) {
            if ($endDate) {
                $query = $query->where('created_at', '>=', $startDate)
                               ->where('created_at', '<=', $endDate);
            } else {
                $query = $query->where('created_at', '=', $startDate);
            }
        }
    
        if ($user_id) {
            $query = $query->where('user_id', $user_id);
        }
    
        $shipping_quotes = $query->paginate($perPage);
        $total = $shipping_quotes->total();

        $mapped_quotes = $shipping_quotes->getCollection()->map(function($data) {
            $detail = $data->shippingQuoteDetails;
            return [
                "id" => $data->id,
                "employee_name" => $data->employee_name,
                "guest_name" => $data->guest_name,
                "guest_email" => $data->guest_email,
                "guest_phone" => $data->guest_phone,
                "guest_address" => $data->guest_address,
                "quote_reference" => $data->quote_reference,
                "valid_until" => $data->valid_until,
                "generated_by_employee" => $data->generated_by_employee,
                "dni_or_ruc_value" => $data->dni_or_ruc_value,
                "volume" => $detail ? $detail->volume : '',
                "total_weight" => $detail ? $detail->total_weight : '',
                "invoice_price" => $detail?$detail->invoice_price: '',
                "first_import" => $detail?($detail->first_import == 1 ? "Yes" : "No"):'',
                "incoterm" => $detail && $detail->getIncoterm ? $detail->getIncoterm->name : null,
                "measurement_unit" => $detail && $detail->measurementUnit ? $detail->measurementUnit->name : null,
                "origin_port" => $detail && $detail->originPort ? $detail->originPort->name : null,
                "type_of_merchandise" => $detail && $detail->merchandiseType ? $detail->merchandiseType->name : null,
                "destination_location" => $detail && $detail->destinationLocation ? $detail->destinationLocation->name : null,
            ];
        });
    
        return response()->json([
            'shipping_quotes' => $mapped_quotes, 
            'total' => $total
        ]);
    }
    
    
    
    public function createShippingQuote(Request $request) {
        
        $request->validate([
            'guest_name' => 'required',
            'guest_email' => 'required',
            'guest_phone' => 'nullable',
            'guest_address' => 'nullable',
            'dni_or_ruc_value' => 'required',
            'form_tab' => 'nullable',

            'volume' => 'nullable',
            'total_weight' => 'nullable',
            'invoice_price' => 'nullable',
            'first_import' => 'nullable',
            'type_of_merchandise' => 'nullable|exists:merchandise_types,product_category_id',
            'type_of_merchandise_id' => 'nullable|exists:merchandise_types,id',
            'origin_port' => 'nullable|exists:origin_ports,code',
            'incoterm' => 'nullable|exists:incoterms,code',
            'destination_location' => 'nullable|exists:destination_locations,zone_id',
            'destination_location_id' => 'nullable|exists:destination_locations,id',
            'measurement_unit' => 'nullable|exists:measurement_units,code',
        ]);

        $quote_reference = str()->random(8);

        $user = auth()->user();
        $form_tab = $request->form_tab;
        $volume = $request->volume;
        $shipping_quote_id = $request->shipping_quote_id;
        $total_weight = $request->total_weight;
        $invoice_price = $request->invoice_price;
        $first_import = $request->first_import;
        $type_of_merchandise = $request->type_of_merchandise;
        $type_of_merchandise_id = $request->type_of_merchandise_id;
        $origin_port = $request->origin_port;
        $incoterm = $request->incoterm;
        $destination_location = $request->destination_location;
        $destination_location_id = $request->destination_location_id;
        $measurement_unit = $request->measurement_unit;

        $expiration_days = 1;
        $setting = Setting::where('key','expiration_days')->first();
        if($setting){
            $expiration_days = $setting->expiration_days;
        }

        $expiration_date = Carbon::now()->addDays($expiration_days);
        
        $createQuote = ShippingQuote::create([
            'user_id' => $user? $user->id : null,
            'form_tab' => $form_tab,
            'guest_name' => $request->guest_name,
            'guest_email' => $request->guest_email,
            'guest_phone' => $request->guest_phone,
            'guest_address' => $request->guest_address,
            'quote_reference' => $quote_reference,
            'valid_until' => $expiration_date,
            'generated_by_employee' => $user ? 1 : 0, // 
            'dni_or_ruc_value' => $request->dni_or_ruc_value,
        ]);
        
        if(!$createQuote){
            return $this->sendError('Failed to send quote, please contact support');
        }

        $shipping_quote_id = $createQuote->id;

        //NOW CREATE SHIPPING QUOTE DETAILS
        ShippingQuoteDetail::create([
            'volume' => $volume,
            'shipping_quote_id' => $shipping_quote_id,
            'total_weight' => $total_weight,
            'invoice_price' => $invoice_price,
            'first_import' => $first_import,
            'type_of_merchandise' => $type_of_merchandise_id,
            'origin_port' => $origin_port,
            'incoterm' => $incoterm,
            'destination_location' => $destination_location_id,
            'measurement_unit' => $measurement_unit,
        ]);

        // this will happen only when quote is created
        Subscriber::firstOrCreate(
            ['email' => $request->guest_email],
            [
                'name' => $request->guest_name,
                'phone' => $request->guest_phone,
                'address' => $request->guest_address,
            ]
        );

        if($form_tab == 1){
            return (new QuoteService())->applyLCLFormula($request->all());
        }else if($form_tab == 2){
            return (new QuoteService())->applyFCLFormula($request->all());
        }
        
        return $this->downloadQuote((new QuoteService())->applyLCLFormula($request->all()));
            
        // return $this->sendResponse(['shipping_quote_id' => $shipping_quote_id], 'Succesfully create shipping quote.');
    }

    public function getConstants(){
        $incoterms = Incoterm::get(['id', 'code', 'name'])->toArray();
        $measurementUnits = MeasurementUnit::get(['id', 'code', 'name'])->toArray();
        $originPorts = OriginPort::get(['id', 'code', 'name'])->toArray();
        $merchandiseTypes = MerchandiseType::get(['id', 'name'])->toArray();
        $destinationLocations = DestinationLocation::get(['id', 'name'])->toArray();

        return [
            "incoterms" => $incoterms,
            "measurementUnits" => $measurementUnits,
            "originPorts" => $originPorts,
            "merchandiseTypes" => $merchandiseTypes,
            "destinationLocations" => $destinationLocations,
        ];
    }

    public function applyFormulaData($data){

    }

    public function previewQuote($data = []) {
        
        try {
            $pdf = PDF::loadView('pdf.shipping_quote', $data);
            return $pdf->stream('shipping_quote' . now() . '.pdf');
        } catch (\Exception $e) {
            // Log the error or handle it appropriately
            return response()->json(['error' => 'Unable to generate PDF preview'], 500);
        }
    }

    public function downloadQuote($data = []) {
        
        try {
            $pdf = PDF::loadView('pdf.shipping_quote', $data);
            return $pdf->download('shipping_quote' . now() . '.pdf');
        } catch (\Exception $e) {
            // Log the error or handle it appropriately
            return response()->json(['error' => 'Unable to generate PDF for download'], 500);
        }
    }

}
