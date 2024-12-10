<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'trip_title',
        'url',
        'trip_price',
        'trip_image',
        'trip_date',
        'end_date',
        'trip_type',
        'trip_status',
        'trip_description',
        'trip_upcoming',
        'meta_title',
        'meta_desc',
    ];
}
