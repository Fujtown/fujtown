<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Advertisement extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'ad_name',
        'ad_status',
        'ad_order',
        'ad_url',
        'ad_image',
        'ad_description',
        'add_position',
        'last_shown',
    ];
}
