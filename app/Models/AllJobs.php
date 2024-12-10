<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AllJobs extends Model
{
    use HasFactory;

    protected $fillable = [
        'job_title',
        'url',
        'company',
        'job_tags',
        'salary_from',
        'salary_to',
        'confidential',
        'location',
        'job_category',
        'description',
        'job_url',
    ];

    // Relationship with job_categories (if applicable)
    public function jobcategory()
    {
        return $this->belongsTo(JobsCategories::class, 'job_category');
    }
}
