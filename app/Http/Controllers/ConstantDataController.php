<?php

namespace App\Http\Controllers;

use App\Models\DestinationLocation;
use App\Models\Incoterm;
use App\Models\MeasurementUnit;
use App\Models\MerchandiseType;
use App\Models\OriginPort;
use App\Models\ProductCategory;
use App\Models\Zone;
use Illuminate\Http\Request;


class ConstantDataController extends BaseController {
    
    public function getConstants(){
        $incoterms = Incoterm::get(['id', 'code','name']);
        $measurementUnits = MeasurementUnit::get(['id', 'code','name']);
        $originPorts = OriginPort::get(['id', 'code', 'name']);
        $destinationLocations = DestinationLocation::with('zone')->get();
        $zones = Zone::get(['id','name']);
        
        $destinationLocations = $destinationLocations->map(function($data){
            return [
                'id' => $data->id,
                'name' => $data->name,
                'zone_id' => $data->zone_id,
                'zone_name' => $data->zone ? $data->zone->name: '',
            ];
        });
        
        $merchandiseTypes = MerchandiseType::with('productCategory')->get();
        $productCategories = ProductCategory::get(['id','name']);
        
        $merchandiseTypes = $merchandiseTypes->map(function($data){
            return [
                'id' => $data->id,
                'name' => $data->name,
                'product_category_id' => $data->product_category_id,
                'product_category_name' => $data->productCategory ? $data->productCategory->name: '',
            ];
        });

        return [
            "incoterms" => $incoterms,
            "measurementUnits" => $measurementUnits,
            "originPorts" => $originPorts,
            "merchandiseTypes" => $merchandiseTypes,
            "destinationLocations" => $destinationLocations,
            "zones" => $zones,
            "productCategories" => $productCategories,
        ];
    }

    public function getDestinationLocations(Request $request) {
        $getData = DestinationLocation::with('zone')->get();
        
        $getData = $getData->map(function($data){
            return [
                'id' => $data->id,
                'name' => $data->name,
                'zone_id' => $data->zone_id,
                'zone_name' => $data->zone ? $data->zone->name: '',
            ];
        });

        return $this->sendResponse($getData);
    }
    
    public function createDestinationLocation(Request $request) {
        $request->validate([
            'name' => 'required',
            'zone_id' => 'required|exists:zones,id',
        ]);

        $setData = DestinationLocation::create([
            'name' => $request->name,
            'zone_id' => $request->zone_id
        ]);

        if($setData){
            return $this->sendResponse($setData->id, 'Succesfully added destination location');
        }

        return $this->sendError('Failed to create destination location');
    }
    
    public function getIncoterms(Request $request) {
        $getData = Incoterm::get();
        
        $getData = $getData->map(function($data){
            return [
                'id' => $data->id,
                'code' => $data->code,
                'name' => $data->name,
            ];
        });

        return $this->sendResponse($getData);
    }
    
    public function createIncoterm(Request $request) {
        $request->validate([
            'name' => 'required',
            'code' => 'required'
        ]);

        $setData = Incoterm::create([
            'code' => $request->code,
            'name' => $request->name
        ]);

        if($setData){
            return $this->sendResponse($setData->id, 'Succesfully added incoterm');
        }

        return $this->sendError('Failed to create incoterm');
    }
    
    public function getMeasurementUnits(Request $request) {
        $getData = MeasurementUnit::get();
        
        $getData = $getData->map(function($data){
            return [
                'id' => $data->id,
                'code' => $data->code,
                'name' => $data->name,
            ];
        });

        return $this->sendResponse($getData);
    }
    
    public function createMeasurementUnit(Request $request) {
        $request->validate([
            'code' => 'required',
            'name' => 'required'
        ]);

        $setData = MeasurementUnit::create([
            'code' => $request->code,
            'name' => $request->name
        ]);

        if($setData){
            return $this->sendResponse($setData->id, 'Succesfully added measurement unit');
        }

        return $this->sendError('Failed to create measurement unit');
    }
    
    public function getMerchandiseTypes(Request $request) {
        $getData = MerchandiseType::with('productCategory')->get();
        
        $getData = $getData->map(function($data){
            return [
                'id' => $data->id,
                'name' => $data->name,
                'product_category_id' => $data->product_category_id,
                'product_category_name' => $data->productCategory ? $data->productCategory->name: '',
            ];
        });

        return $this->sendResponse($getData);
    }
    
    public function createMerchandiseType(Request $request) {
        $request->validate([
            'name' => 'required',
            'product_category_id' => 'required'
        ]);

        $setData = MerchandiseType::create([
            'name' => $request->name,
            'product_category_id' => $request->product_category_id
        ]);

        if($setData){
            return $this->sendResponse($setData->id, 'Succesfully added merchandise type');
        }

        return $this->sendError('Failed to create merchandise type');
    }
    
    public function getOriginPorts(Request $request) {
        $getData = OriginPort::get();
        
        $getData = $getData->map(function($data){
            return [
                'id' => $data->id,
                'code' => $data->code,
                'name' => $data->name,
            ];
        });

        return $this->sendResponse($getData);
    }
    
    public function createOriginPort(Request $request) {
        $request->validate([
            'code' => 'required',
            'name' => 'required',
        ]);

        $setData = OriginPort::create([
            'code' => $request->code,
            'name' => $request->name,
        ]);

        if($setData){
            return $this->sendResponse($setData->id, 'Succesfully added port of origin');
        }

        return $this->sendError('Failed to create port of origin');
    }
    
    public function updateOriginPort(Request $request) {
        $request->validate([
            'id' => 'required',
            'code' => 'required',
            'name' => 'required',
        ]);

        $data = OriginPort::find($request->id);

        if($data){
            $data->name = $request->name;
            $data->code = $request->code;
            $data->save();
            return response()->json([
                'message' => "Successfully updated!",
            ],200);
        }
        
        return response()->json([
            'message' => "Data not found!",
        ],422);
    }
    
    public function getProductCategories(Request $request) {
        $getData = ProductCategory::get();
        
        $getData = $getData->map(function($data){
            return [
                'id' => $data->id,
                'name' => $data->name,
            ];
        });

        return $this->sendResponse($getData);
    }
    
    public function createProductCategory(Request $request) {
        $request->validate([
            'name' => 'required',
        ]);

        $setData = ProductCategory::create([
            'name' => $request->name,
        ]);

        if($setData){
            return $this->sendResponse($setData->id, 'Succesfully added product category');
        }

        return $this->sendError('Failed to create product category');
    }
    
    public function getZones(Request $request) {
        $getData = Zone::get();
        
        $getData = $getData->map(function($data){
            return [
                'id' => $data->id,
                'name' => $data->name,
            ];
        });

        return $this->sendResponse($getData);
    }
    
    public function createZone(Request $request) {
        $request->validate([
            'name' => 'required',
        ]);

        $setData = Zone::create([
            'name' => $request->name,
        ]);

        if($setData){
            return $this->sendResponse($setData->id, 'Succesfully added zone');
        }

        return $this->sendError('Failed to create zone');
    }

    // Update function for DestinationLocation
    public function updateDestinationLocation(Request $request) {
        $request->validate([
            'id' => 'required',
            'name' => 'required',
            'zone_id' => 'required|exists:zones,id',
        ]);

        $data = DestinationLocation::find($request->id);

        if($data){
            $data->name = $request->name;
            $data->zone_id = $request->zone_id;
            $data->save();
            return response()->json([
                'message' => "Successfully updated!",
            ],200);
        }

        return response()->json([
            'message' => "Data not found!",
        ],422);
    }

    // Update function for Incoterm
    public function updateIncoterm(Request $request) {
        $request->validate([
            'id' => 'required',
            'code' => 'required',
            'name' => 'required',
        ]);

        $data = Incoterm::find($request->id);

        if($data){
            $data->code = $request->code;
            $data->name = $request->name;
            $data->save();
            return response()->json([
                'message' => "Successfully updated!",
            ],200);
        }

        return response()->json([
            'message' => "Data not found!",
        ],422);
    }

    // Update function for MeasurementUnit
    public function updateMeasurementUnit(Request $request) {
        $request->validate([
            'id' => 'required',
            'code' => 'required',
            'name' => 'required',
        ]);

        $data = MeasurementUnit::find($request->id);

        if($data){
            $data->code = $request->code;
            $data->name = $request->name;
            $data->save();
            return response()->json([
                'message' => "Successfully updated!",
            ],200);
        }

        return response()->json([
            'message' => "Data not found!",
        ],422);
    }

    // Update function for MerchandiseType
    public function updateMerchandiseType(Request $request) {
        $request->validate([
            'id' => 'required',
            'name' => 'required',
            'product_category_id' => 'required|exists:product_categories,id',
        ]);

        $data = MerchandiseType::find($request->id);

        if($data){
            $data->name = $request->name;
            $data->product_category_id = $request->product_category_id;
            $data->save();
            return response()->json([
                'message' => "Successfully updated!",
            ],200);
        }

        return response()->json([
            'message' => "Data not found!",
        ],422);
    }

    // Update function for ProductCategory
    public function updateProductCategory(Request $request) {
        $request->validate([
            'id' => 'required',
            'name' => 'required',
        ]);

        $data = ProductCategory::find($request->id);

        if($data){
            $data->name = $request->name;
            $data->save();
            return response()->json([
                'message' => "Successfully updated!",
            ],200);
        }

        return response()->json([
            'message' => "Data not found!",
        ],422);
    }

    // Update function for Zone
    public function updateZone(Request $request) {
        $request->validate([
            'id' => 'required',
            'name' => 'required',
        ]);

        $data = Zone::find($request->id);

        if($data){
            $data->name = $request->name;
            $data->save();
            return response()->json([
                'message' => "Successfully updated!",
            ],200);
        }

        return response()->json([
            'message' => "Data not found!",
        ],422);
    }

}
