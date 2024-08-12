<?php

namespace App\Http\Controllers;

use App\Models\Subscriber;
use Illuminate\Http\Request;

class SubscriberController extends BaseController {

    public function getSubscribers(Request $request) {
        $getData = Subscriber::get();
        
        $getData = $getData->map(function($data){
            return [
                'id' => $data->id,
                'name' => $data->name,
                'email' => $data->email,
                'address' => $data->address,
                'phone' => $data->phone,
            ];
        });

        return $this->sendResponse($getData);
    }
    
    public function setSubscriber(Request $request) {
        $request->validate([
            'email' => 'required',
        ]);

        $setData = Subscriber::firstOrCreate(
            ['email' => $request->email],
            [
                'name' => $request->name,
                'phone' => $request->phone,
                'address' => $request->address,
            ]
        );
        

        if($setData){
            return $this->sendResponse($setData->id, 'Succesfully added subscriber');
        }

        return $this->sendError('Failed to add subscriber');
    }
}
