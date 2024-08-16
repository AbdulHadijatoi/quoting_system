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
    
    public function updateSubscriber(Request $request) {
        $request->validate([
            'id' => 'required|exists:subscribers,id',
        ]);

        $subscriber = Subscriber::find($request->id);
        

        if($subscriber){
            $subscriber->name = $request->name;
            $subscriber->email = $request->email;
            $subscriber->address = $request->address;
            $subscriber->phone = $request->phone;
            return $this->sendResponse($subscriber->id, 'Succesfully updated!');
        }

        return $this->sendError('Failed to add subscriber');
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
