<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'order_customer_id',
        'order_customer_fname',
        'order_customer_lname',
        'order_customer_email',
        'order_customer_address',
        'order_customer_city',
        'order_customer_state',
        'order_customer_country',
        'order_payment_mode',
        'order_total',
        'order_date',
        'order_customer_phone',
        'order_ref',
        'tap_id',
        'noon_order_id',
        'listing_id'
    ];

    // Define relationships if needed
    public function customer()
    {
        return $this->belongsTo(Customer::class, 'order_customer_id');
    }

    public function listing()
    {
        return $this->belongsTo(Listing::class, 'listing_id');
    }
}
