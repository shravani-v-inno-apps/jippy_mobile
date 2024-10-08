<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{

    public function login(Request $request){
        $credentials = $request->only('email_address', 'password');

            if (Auth::attempt($credentials)) {
                $user = DB::table('st_admin_user')->where('email_address', $request->email)->first();
    
                $token = $user->createToken('bearer_token')->plainTextToken;
    
                return response()->json([
                    'access_token' => $token,
                    'token_type' => 'Bearer',
                ]);
            }
    
            return response()->json(['error' => 'Unauthenticated'], 401); 
           }
}
