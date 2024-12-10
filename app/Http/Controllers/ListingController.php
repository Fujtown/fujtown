<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ListingController extends Controller
{
    public function listing()
    {
        return view('admin.listing.view');
    }
    
}
