<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminUser extends Model
{
    use HasFactory;

    protected $table = 'st_admin_user';
    protected $fillable = [
        'admin_id',
        'admin_id_token',
        'username',
        'password',
        'first_name',
        'last_name',
        'email_address',
        'contact_number',
        'profile_photo',
        'path',
        'role',
        'main_account',
        'session_token', 
        'status',
        'last_login',
        'date_created',
        'date_modified',
        'ip_address'
    ];


    // This is the default, can be omitted
    public $timestamps = true; 

    // If your columns are named differently
    const CREATED_AT = 'date_created';
    const UPDATED_AT = 'date_modified';
}
