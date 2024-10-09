<?php

namespace App\Http\Controllers;

use App\Models\LocationCountry;
use App\Models\AdminUser;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class MobileController extends Controller
{
    public function getCountryCodes()
    {
        $countries = LocationCountry::all(); 
        return response()->json($countries); // Return as JSON
    }
    public function register(Request $request)
    {
        // Validate the incoming request
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Check for validation errors
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }else{
            // debug
            // return response()->json(['message' => 'Registration successful!'], 202);
        }

        // Create the user
        $user = AdminUser::create([
            'username' => $request->name,
            'email_address' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        return response()->json([
            'message' => 'Registration successful!',
            'user' => $user,
        ], 201);
       
    }


}
