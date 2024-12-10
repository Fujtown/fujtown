<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListingImage extends Model
{
    use HasFactory;
    protected $primaryKey = 'list_img_id';

    protected $fillable = [
        'listing_id',
        'listing_images'
    ];

    /**
     * Get the listing that owns the image.
     */
    public function listing()
    {
        return $this->belongsTo(Listing::class, 'listing_id', 'listing_id');
    }
}
