<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryListing extends Model
{
    use HasFactory;
    protected $table = 'category_listing';
    protected $fillable = [
        'category_id',
        'listing_id',
    ];

    public function listing()
    {
        return $this->belongsTo(Listing::class, 'listing_id', 'listing_id');
    }
}
