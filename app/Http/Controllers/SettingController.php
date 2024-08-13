<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends BaseController {

    public function getAllSetting() {

        $getData = Setting::get(['key','value']);

        return response()->json($getData);
    }

    public function getSetting($key = null) {
        if($key){
            $getData = Setting::where('key',$key)->first(['value']);
        }else{
            return abort(404);
        }

        return response()->json($getData);
    }
    

    public function updateSettings(Request $request) {
        $data = $request->all();
    
        foreach ($data as $key => $value) {
            // Check if the value is a file
            if ($request->hasFile($key)) {
                $file = $request->file($key);
    
                // Generate a filename consisting of numbers from the current timestamp
                $fileName = time() . '.' . $file->getClientOriginalExtension();
                
                // Store the file
                $filePath = $file->storeAs('settings', $fileName, 'public');
    
                // Update the value to the file path
                $value = '/storage/' . $filePath;
            }
    
            // Update the setting if it exists, otherwise create a new one
            Setting::updateOrCreate(
                ['key' => $key],
                ['value' => $value]
            );
        }
    
        $settingData = Setting::get(['key', 'value']);
    
        return response()->json([
            'message' => 'Settings updated successfully',
            'settingData' => $settingData
        ], 200);
    }
    

}
