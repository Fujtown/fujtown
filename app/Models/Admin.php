<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    use Notifiable,HasFactory;

    protected $table = 'admin';
    protected $guard = 'admin';
    protected $primaryKey = 'admin_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
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
        'user_ac_status'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'user_pswd',
        'remember_token',
    ];


    protected $casts = [
        'user_pswd' => 'hashed'
    ];

    public function getAuthPassword()
    {
        return $this->user_pswd;
    }

}
