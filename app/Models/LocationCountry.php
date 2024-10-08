<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LocationCountry extends Model
{
    use HasFactory;
    
    protected $table = 'st_location_countries'; 

    protected $fillable = [
        'country_id',
        'shortcode',
        'country_name',
        'phonecode'
    ];
}
