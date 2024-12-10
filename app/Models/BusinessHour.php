<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BusinessHour extends Model
{
    use HasFactory;
    protected $primaryKey = 'business_hour_id';

    protected $fillable = [
        'listing_id',
        'sunday_open',
        'sunday_close',
        'monday_open',
        'monday_close',
        'tuesday_open',
        'tuesday_close',
        'wednesday_open',
        'wednesday_close',
        'thursday_open',
        'thursday_close',
        'friday_open',
        'friday_close',
        'saturday_open',
        'saturday_close'
    ];

    /**
     * Get the listing that owns the business hours.
     */
    public function listing()
    {
        return $this->belongsTo(Listing::class, 'listing_id', 'listing_id');
    }

}
