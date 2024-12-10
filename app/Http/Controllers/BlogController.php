<?php

namespace App\Http\Controllers;

use App\Helpers\CacheHelper;
use App\Models\Blog;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    public function Blogcategory()
    {
        $blogCategories = BlogCategory::withCount('blogs')->get();

        return view('admin.blog.category-view',compact('blogCategories'));
    }
    public function addBlogcategory()
    {
        
        return view('admin.blog.add-blogcategory');
    }

    public function storeBlogcategory(Request $request)
 {
     // Validate the incoming request
     $request->validate([
         'blog_category_name' => 'required|string'
     ]);
     // dd('work');
 
     // Create a new ParentCategory instance
     $blogCategory = new BlogCategory();
     $blogCategory->blog_cat_name = $request->input('blog_category_name');
    
     // Save to the database
     $blogCategory->save();
 
     // Redirect or return response
     return redirect()->back()->with('success', 'Blog category Added successfully!');
 }

 public function Blogs()
 {
     $blogs = Blog::with('category')->get();

     return view('admin.blog.blog-view',compact('blogs'));
 }

 public function addBlog()
    {
        $categories = BlogCategory::all();
        return view('admin.blog.add-blog',compact('categories'));
    }
    public function storeBlog(Request $request)
    {
        // dd($request);
        // Validate the form inputs
        $request->validate([
            'blog_title' => 'required|string|max:250',
            'keywords' => 'nullable|string',
            'tags' => 'nullable|string',
            'blog_categories' => 'required|integer|exists:blog_categories,id',
            'blog_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'description' => 'required|string',
        ]);
        // dd('work');
        // Handle image upload if exists
        $imagePath = null;
        if ($request->hasFile('blog_image')) {
            $imagePath = $request->file('blog_image')->store('blog_images', 'public');
        }

        // Create a new Blog instance
        $blog = new Blog();
        $blog->blog_cat_id = $request->input('blog_categories');
        $blog->title = $request->input('blog_title');
        $blog->keywords = $request->input('keywords');
        $blog->tags = $request->input('tags');
        $blog->url =Str::slug($request->input('blog_title'));
        $blog->image = $imagePath;
        $blog->description = $request->input('description');
        
        // Save the blog to the database
        $blog->save();

                // Forget relevant cache keys
                CacheHelper::forget([
                    'blogs_with_category_paginated'
                ]);
        
        // Redirect back with success message
        return redirect()->route('coffee.blogs')->with('success', 'Blog created successfully!');
    }

    public function editBlog($id)
    {
        $blog = Blog::findOrFail($id);
        $categories = BlogCategory::all();
        return view('admin.blog.edit-blog',compact(['blog','categories']));
    }
   
    public function updateBlog(Request $request, string $id)
    {
        
        $request->validate([
            'blog_title' => 'required|string',
            'keywords' => 'nullable|string',
            'blog_categories' => 'required|integer|exists:blog_categories,id',
            'blog_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'required|string',
        ]);
    
        $blog = Blog::findOrFail($id);
       
        // Generate slug from title
        
         $slug = Str::slug($request->blog_title);
        $data = $request->except('cover_image');
        $data['title'] = $request->blog_title;
        $data['slug'] = $slug; // Add the generated slug to the data
        $data['description'] = $request->description;
        if ($request->hasFile('cover_image')) {
            // Delete old image
            if ($blog->cover_image) {
                Storage::disk('public')->delete($blog->cover_image);
            }
    
            // Store new image
          
            $path = $request->file('cover_image')->store('blog_covers', 'public');
            $data['cover_image'] = $path;           
        }

        // dd($data);     
        $blog->update($data);
    
        return redirect()->route('coffee.blogs')->with('success', 'Blog post updated successfully.');
    }

    public function deleteBlog($id)
    {
        // Find the blog by ID
        $blog = Blog::findOrFail($id);

        // Remove the image from storage if it exists
        if ($blog->image) {
            Storage::disk('public')->delete($blog->image);
        }

        // Delete the blog from the database
        $blog->delete();

        // Redirect back with a success message
        return redirect()->route('coffee.blogs')->with('success', 'Blog deleted successfully!');
    }
}
