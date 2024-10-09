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
            // 'email' => 'required|string|email|max:255|unique:users',
            // 'email' => 'required',
            'password' => 'required|string|min:8|confirmed',
        ]);

        //debug registered data
        return response()->json($request, 201);

        // Check for validation errors
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }else{
            return response()->json(['message' => 'Registration successful!'], 202);
        }

        // Create the user
        $user = AdminUser::create([
            'username' => $request->name,
            'email_address' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Optionally, you could log the user in here
        // Auth::login($user);

        return response()->json([
            'message' => 'Registration successful!',
            'user' => $user,
        ], 201);
       
    }


}
