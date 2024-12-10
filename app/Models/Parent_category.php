<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parent_category extends Model
{
    use HasFactory;
    protected $table = 'parent_categories';
    // protected $primaryKey = 'id';
    protected $fillable = [
        'parent_category_name',
        'parent_category_name_arabic',
        'parent_url',
        'parent_category_thumb'
    ];

    public function subcategories()
    {
        return $this->hasMany(Category::class, 'category_parent_id');
    }

}