<?php

namespace App\Http\Controllers;

use App\Models\Subscriber;
use Illuminate\Http\Request;

class SubscriberController extends BaseController {

    public function getSubscribers(Request $request) {
        $request->validate([
            'search' => 'nullable',
            'perPage' => 'required',
            'startDate' => 'nullable',
            'endDate' => 'nullable',
            'user_id' => 'nullable',
        ]);

        $search = $request->search;
        $perPage = $request->perPage;
    

        $getData = Subscriber::when(!empty($search), function($q) use($search) {
                        $q->where('email', 'like', "%$search%")
                        ->orWhere('name', 'like', "%$search%");
                    })
                    ->paginate($perPage);
        
        $total = $getData->total();
        
        $getData = $getData->getCollection()->map(function($data){
            return [
                'id' => $data->id,
                'name' => $data->name,
                'email' => $data->email,
                'address' => $data->address,
                'phone' => $data->phone,
            ];
        });

        return response()->json([
            'data' => $getData, 
            'total' => $total
        ]);
    }
    
    public function deleteSubscriber(Request $request) {
        $request->validate([
            'id' => 'required|exists:subscribers,id',
        ]);

        $subscriber = Subscriber::find($request->id);
        

        if($subscriber){
            $subscriber->delete();
            return response()->json([
                'status' => 1,
                'message' => "Successfully deleted"
            ]);
        }

        return response()->json([
            'status' => 0,
            'message' => "Subscriber not found",
        ], 422);
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
            $subscriber->save();
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
