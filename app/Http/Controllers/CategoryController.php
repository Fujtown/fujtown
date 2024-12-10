<?php

namespace App\Http\Controllers;

use App\Models\BlogCategory;
use App\Models\Category;
use App\Models\Parent_category;
use Illuminate\Http\Request;
use Illuminate\Support\Str; // Import this

class CategoryController extends Controller
{
  
    public function parentcategory()
    {
     return view('admin.categories.parent-category');
    }
    public function parentcategorylist()
    {
     $pcategories=Parent_category::get();
     return view('admin.categories.parent-category-list',compact('pcategories'));
    }
    public function Addparentcategory(Request $request)
 {
     // Validate the incoming request
     $request->validate([
         'parent_category_name' => 'required|string|max:255',
         'parent_category_name_arabic' => 'required|string|max:255',
         'parent_category_thumb' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
     ]);
     // dd('work');
 
     // Handle the file upload if there's an image
     $thumbPath = null;
     if ($request->hasFile('parent_category_thumb')) {
         $thumbPath = $request->file('parent_category_thumb')->store('parent_categories', 'public');
     }
 
     // Create a new ParentCategory instance
     $parentCategory = new Parent_category();
     $parentCategory->parent_category_name = $request->input('parent_category_name');
     $parentCategory->parent_category_name_arabic = $request->input('parent_category_name_arabic');
     $parentCategory->parent_category_thumb = $thumbPath;
     
     // Generate and assign the slug
     $parentCategory->parent_url = Str::slug($request->input('parent_category_name'));
 
     // Save to the database
     $parentCategory->save();
 
     // Redirect or return response
     return redirect()->route('coffee.parent-category')->with('success', 'Parent category added successfully!');
 }
 public function deleteParentCategory($id)
 {
     $parentCategory =BlogCategory::find($id);
    //  dd($parentCategory);
     $parentCategory->delete();
 
     return redirect()->back()->with('success', 'Parent category deleted successfully!');
 }
 
 public function updateParentCategory(Request $request, $id)
 {
     // dd($id);
     $request->validate([
         'parent_category_name' => 'required|string|max:255',
         'parent_category_name_arabic' => 'required|string|max:255',
         'parent_category_thumb' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
     ]);
 
     $parentCategory = Parent_category::findOrFail($id);
     
     $parentCategory->parent_category_name = $request->input('parent_category_name');
     $parentCategory->parent_category_name_arabic = $request->input('parent_category_name_arabic');
 
     // Handle the file upload if there's an image
     if ($request->hasFile('parent_category_thumb')) {
         // Remove old image if necessary and store new one
         $thumbPath = $request->file('parent_category_thumb')->store('parent_categories', 'public');
         $parentCategory->parent_category_thumb = $thumbPath;
     }
 
     $parentCategory->parent_url = Str::slug($request->input('parent_category_name'));
     $parentCategory->save();
 
     return redirect()->back()->with('success', 'Parent category updated successfully!');
 }
 
     public function categorylist()
     {
         $categories = Category::with('parent_category')->get();
         // dd($categories);
         $pcategories=Parent_category::get();
     return view('admin.categories.category-list',compact(['categories','pcategories']));
     }
 
     public function category()
     {
         $pcategories=Parent_category::get();
         return view('admin.categories.categories',compact('pcategories'));
     }
 
     public function addCategory(Request $request)
     {
         // Validate the form inputs
         $request->validate([
             'category_name' => 'required|string|max:255',
             'category_name_arabic' => 'required|string|max:255',
             'url' => 'required|string|max:255|unique:categories,url',
             'category_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
             'category_status' => 'required|boolean',
             'category_description' => 'nullable|string',
         ]);
 
         // dd('work');
 
         // Initialize a new Category instance
         $category = new Category();
         $category->category_name = $request->input('category_name');
         $category->category_name_arabic = $request->input('category_name_arabic');
         $category->url = $request->input('url');
         $category->category_parent_id = $request->input('category_parent_id');
         $category->category_status = $request->input('category_status');
         $category->category_description = $request->input('category_description');
 
         // Handle category image upload
         if ($request->hasFile('category_image')) {
             $imagePath = $request->file('category_image')->store('category_images', 'public');
             $category->category_image = $imagePath;
         }
 
         // Save the category to the database
         $category->save();
 
         // Redirect with a success message
         return redirect()->back()->with('success', 'Category added successfully!');
     }
 
     public function deleteCategory($id)
 {
     $parentCategory = Category::findOrFail($id);
     $parentCategory->delete();
 
     return redirect()->back()->with('success', 'category deleted successfully!');
 }
 
 public function updateCategory(Request $request, $id)
 {
     // dd($id);
     $request->validate([
         'category_name' => 'required|string|max:255',
         'category_name_arabic' => 'required|string|max:255',
         'category_thumb' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
     ]);
 
     $parentCategory = Parent_category::findOrFail($id);
     
     $parentCategory->category_name = $request->input('category_name');
     $parentCategory->category_name_arabic = $request->input('category_name_arabic');
     $parentCategory->category_parent_id = $request->input('category_parent_id');
     // Handle the file upload if there's an image
     if ($request->hasFile('parent_category_thumb')) {
         // Remove old image if necessary and store new one
         $thumbPath = $request->file('category_thumb')->store('parent_categories', 'public');
         $parentCategory->category_image = $thumbPath;
     }
 
     $parentCategory->parent_url = Str::slug($request->input('parent_category_name'));
     $parentCategory->save();
 
     return redirect()->back()->with('success', 'category updated successfully!');
 }
 
}
