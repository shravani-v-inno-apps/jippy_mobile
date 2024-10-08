<?php

namespace App\Http\Controllers;

use App\Models\LocationCountry;
use Illuminate\Http\Request;

class MobileController extends Controller
{
    public function getCountryCodes()
    {
        $countries = LocationCountry::all(['country_id', 'phonecode']); 
        return response()->json($countries); // Return as JSON
    }
}
