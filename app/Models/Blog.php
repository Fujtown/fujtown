<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $primaryKey = 'blog_id';
    protected $table = 'blogs';

    protected $fillable = [
        'blog_cat_id',
        'title',
        'url',
        'keywords',
        'image',
        'description',
    ];

    // Relationship with BlogCategory (optional, if exists)
    public function category()
    {
        return $this->belongsTo(BlogCategory::class, 'blog_cat_id');
    }

    public function views()
{
    return $this->hasMany(BlogView::class,'blog_id');
}

}
