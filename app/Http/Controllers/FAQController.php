<?php

namespace App\Http\Controllers;

use App\Models\FAQ;
use App\Models\FAQCategory;
use Illuminate\Http\Request;

class FAQController extends Controller
{
   public function FaqCat()
   {
    $fcategories=FAQCategory::all();
    return view('admin.faq.faq-cats',compact('fcategories'));
   }
  

   public function AddFaqCat()
   {
    return view('admin.faq.faq-cat-create');
   }
   public function storeFaqCat(Request $request)
   {
     // Validate the incoming request
     $request->validate([
        'name' => 'required|string|max:255'
    ]);
    // Create a new ParentCategory instance
    $faqCategory = new FAQCategory();
    $faqCategory->name = $request->input('name');
    // Save to the database
    $faqCategory->save();

    // Redirect or return response
    return redirect()->route('coffee.faq-cat')->with('success', 'FAQ category added successfully!');
   }

   public function updateFaqCat(Request $request, $id)
   {
       $request->validate([
           'name' => 'required'
       ]);
       // dd('work');
   
       $faqcat = FAQCategory::findOrFail($id);
       
       $faqcat->name = $request->input('name');
   
       $faqcat->save();
   
       return redirect()->back()->with('success', 'FAQ Category updated successfully!');
   }

   public function deleteFAQCat($id)
   {
       $faqCat = FAQCategory::findOrFail($id);
       $faqCat->delete();
   
       return redirect()->back()->with('success', 'FAQ Category deleted successfully!');
   }

   public function Faq()
   {
    $faqs=FAQ::with('faqcategory')->get();
    return view('admin.faq.faqs',compact('faqs'));
   }

   public function AddFaq()
   {
    $fcat=FAQCategory::all();
    return view('admin.faq.faq-create',compact('fcat'));
   }

   public function storeFaq(Request $request)
   {
    
     // Validate the incoming request
     $request->validate([
        'title' => 'required|string',
        'category' => 'required|integer|exists:f_a_q_categories,id',
        'description' => 'required|string'
    ]);
    // dd('work');
    // Create a new ParentCategory instance
    $faq = new FAQ();
    $faq->faq_cat_id = $request->input('category');
    $faq->title = $request->input('title');
    $faq->description = $request->input('description');
    // Save to the database
    $faq->save();

    // Redirect or return response
    return redirect()->route('coffee.faqs')->with('success', 'FAQ  added successfully!');
   }

   public function EditFAQ($id)
   {
    $faq = FAQ::findOrFail($id);
    $fcat=FAQCategory::all();
    return view('admin.faq.edit-faq',compact('faq','fcat'));
   }

   public function updateFAQ(Request $request,$id)
   {
    $request->validate([
        'title' => 'required',
        'description' => 'required'
    ]);
    // dd('work');

    $faq = FAQ::findOrFail($id);
    
    $faq->faq_cat_id = $request->input('category');
    $faq->title = $request->input('title');
    $faq->description = $request->input('description');

    $faq->save();

    return redirect()->back()->with('success', 'FAQ updated successfully!');
   }

   public function deleteFAQ($id)
   {
       $faq = FAQ::findOrFail($id);
       $faq->delete();
   
       return redirect()->back()->with('success', 'FAQ deleted successfully!');
   }


}
