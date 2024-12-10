<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FAQCategory extends Model
{
    use HasFactory;
    protected $fillable = [
        'name'
    ];

    public function faqs()
    {
        return $this->hasMany(FAQ::class, 'faq_cat_id');
    }
}
