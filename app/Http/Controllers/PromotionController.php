<?php

namespace App\Http\Controllers;

use App\Models\Promotion;
use Illuminate\Http\Request;

class PromotionController extends Controller
{
    public function Promotion()
    {
        $promotion=Promotion::all();
        return view('admin.promotion.index',compact('promotion'));
    }

    public function Addpromotion()
    {
        return view('admin.promotion.create');
    }
}
