<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NoonTransaction extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'tr_id',
        'amount',
        'currency',
        'first_name',
        'last_name',
        'phone',
        'email',
        'status',
        'date',
        'message',
        'reference',
        'mode',
        'intAccount',
        'paymentInfo',
        'brand',
        'expiryMonth',
        'expiryYear',
        'cardCountry',
        'cardCountryName',
        'cardIssuerName',
        'order_id'
    ];

    // Define relationships if needed
    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }
}
