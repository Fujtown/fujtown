<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;
    protected $fillable = [
        'packg_name',
        'packg_thumb',
        'packg_price_month',
        'packg_price_year',
        'packg_points'
    ];

    public function listing()
    {
        return $this->hasOne(Listing::class, 'id', 'listing_package');
    }
}
