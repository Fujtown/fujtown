<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    protected $primaryKey = 'listing_id';

    protected $fillable = [
        'category_id',
        'listing_package',
        'user_id',
        'listing_name',
        'listing_name_arabic',
        'listurl',
        'listing_region',
        'listing_lat',
        'listing_long',
        'listing_additional_info',
        'listing_pobox',
        'listing_cover_image',
        'listing_freezone',
        'listing_web_url',
        'listing_email',
        'listing_landline',
        'listing_phone',
        'listing_facebook',
        'listing_instagram',
        'listing_twitter',
        'listing_youtube',
        'listing_desc',
        'listing_status',
        'listing_featured',
        'listing_popular',
        'listing_view_counter',
        'meta_title',
        'meta_desc',
        'listing_date',
        'link_open_date',
        'visited_date',
        'paid_by'
    ];

    protected $casts = [
        'listing_date' => 'date',
        'link_open_date' => 'datetime',
        'visited_date' => 'datetime',
        'listing_freezone' => 'boolean'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class,'category_id');
    }
    public function single_category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'category_id'); // Adjust foreign and local keys if needed
    }
    public function multiple_category()
    {
        return $this->hasManyThrough(Category::class, CategoryListing::class, 'listing_id', 'category_id', 'listing_id', 'category_id');
    }
    
    

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'user_id');
    }

    // In app/Models/Listing.php
        public function businessHours()
        {
            return $this->hasOne(BusinessHour::class, 'listing_id', 'listing_id');
        }

        public function order()
        {
            return $this->hasOne(Order::class, 'listing_id', 'listing_id');
        }

        public function package()
        {
            return $this->belongsTo(Package::class, 'listing_package');
        }

     // In app/Models/Listing.php
        public function images()
        {
            return $this->hasMany(ListingImage::class, 'listing_id', 'listing_id');
        }

        public function reviews()
        {
            return $this->hasMany(Review::class, 'listing_id', 'listing_id');
        }

        public function categories()
{
    return $this->belongsToMany(Category::class);
}



}