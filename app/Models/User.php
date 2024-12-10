<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    // Specify the table name (optional if it matches the plural form of the model)
    protected $table = 'users';

    // Disable timestamps if you don't want Laravel to manage them
    public $timestamps = true;

    // Fillable attributes for mass assignment
    protected $fillable = [
        'user_name',
        'user_email',
        'user_pswd',
        'user_fname',
        'user_address',
        'user_phone',
        'user_city',
        'user_country',
        'user_status',
        'user_ac_status',
    ];
}
