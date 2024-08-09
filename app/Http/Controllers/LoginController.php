<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends BaseController
{
    public function login(Request $request): JsonResponse
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) { 
            $user = Auth::user(); 
            $token = $user->createToken('QuoteApp')->plainTextToken; 
        
            // Adding the token directly inside the user object
            $user->token = $token;
            $user->role_name = $user->getRoleNames()->first(); // assuming a user has one role
            $success['user'] = $user;
           
            return $this->sendResponse($success, 'User login successfully.');
        } 
        else { 
            return $this->sendError('Unauthorised.', ['error' => 'Unauthorised']);
        }        
    }

    public function logout(Request $request)
    {
        // Revoke the token that was used to authenticate the current request
        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'message' => 'Logout successful',
        ]);
    }
}
