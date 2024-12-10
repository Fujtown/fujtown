<?php

namespace App\Services;

use App\Models\Category;
use App\Models\Parent_category;

class MenuService
{
    public function getMenu()
    {
        // Fetch parent categories along with their subcategories
        return Parent_category::with('subcategories')->get();
    }
}
