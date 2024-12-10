<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FAQ extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'title',
        'description'
    ];


    public function faqcategory()
{
    return $this->belongsTo(FAQCategory::class, 'faq_cat_id');
}

}

