<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Feedback;
use App\Models\Parent_category;
use FFI;
use Illuminate\Http\Request;
use Illuminate\Support\Str; // Import this

class AdminController extends Controller
{
   public function dashboard()
   {
    return view('admin.coffee-dashboard');
   }

   public function feedback()
   {
      $messages=Feedback::all();
    return view('admin.feedback.index',compact('messages'));
   }

   public function deleteFeedback($id)
 {
     $feedback = Feedback::findOrFail($id);
     $feedback->delete();
 
     return redirect()->back()->with('success', 'feed deleted successfully!');
 }
 
}
