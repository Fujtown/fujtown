<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';
    protected $primaryKey = 'category_id';

    protected $fillable = [
        'category_name',
        'category_name_arabic',
        'url',
        'category_image',
        'category_parent_id',
        'category_status',
        'category_icon',
        'category_description',
        'sort_order',
        'meta_title',
        'meta_desc'
    ];

    /**
     * Relationship to the ParentCategory model.
     */
    public function parentCategory()
    {
        return $this->belongsTo(Parent_category::class, 'category_parent_id');
    }

    /**
     * Self-referential relationship to fetch subcategories.
     */

    /**
     * Relationship to the Listing model.
     */
    public function listings()
        {
            return $this->belongsToMany(Listing::class, 'category_listing', 'category_id', 'listing_id');
        }
    public function listing()
        {
            return $this->hasMany(Listing::class, 'category_id', 'category_id');

        }

}
