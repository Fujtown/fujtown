<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    use HasFactory;

    protected $fillable = [
        'listing_id',
        'deal_name',
        'deal_image',
        'deal_price',
        'deal_sort_order',
        'deal_desc',
        'deal_counter',
        'start_date',
        'end_date',
        'customer_id',
        'expiry_date',
        'url',
    ];

      // Define relationships if necessary
      public function listing()
      {
          return $this->belongsTo(Listing::class, 'listing_id');
      }
  
      public function customer()
      {
          return $this->belongsTo(Customer::class, 'customer_id');
      }
}
