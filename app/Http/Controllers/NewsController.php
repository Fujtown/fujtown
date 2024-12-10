<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
class NewsController extends Controller
{
    public function News()
    {
        $news=News::all();
        return view('admin.news.index',compact('news'));
    }

    public function Addnews()
    {
        return view('admin.news.create');
    }

    public function storeNews(Request $request)
    {
        // dd($request);
        // Validate the form inputs
        $request->validate([
            'title' => 'required|string|max:250',
            'news_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'required|string',
        ]);
        // dd('work');
        // Handle image upload if exists
        $imagePath = null;
        if ($request->hasFile('news_image')) {
            $imagePath = $request->file('news_image')->store('news_images', 'public');
        }

        // Create a new Blog instance
        $news = new News();
        $news->title = $request->input('title');
        $news->url =Str::slug($request->input('title'));
        $news->img_src = $imagePath;
        $news->description = $request->input('description');
        // Save the blog to the database
        $news->save();

        // Redirect back with success message
        return redirect()->route('coffee.news')->with('success', 'News created successfully!');
    }

    
    public function editNews($id)
    {
       
        $news = News::findOrFail($id);
        // dd($news);
        return view('admin.news.edit',compact('news'));
    }

    public function updateNews(Request $request, string $id)
    {
        
        $request->validate([
            'title' => 'required|string|max:250',
            'news_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'required|string',
        ]);
    
        $news = News::findOrFail($id);
       
        // Generate slug from title
        
         $slug = Str::slug($request->title);
        $data = $request->except('news_image');
        $data['title'] = $request->title;
        $data['url'] = $slug; // Add the generated slug to the data
        $data['description'] = $request->description;
        if ($request->hasFile('news_image')) {
            // Delete old image
            if ($news->cover_image) {
                Storage::disk('public')->delete($news->cover_image);
            }
    
            // Store new image
            $path = $request->file('news_image')->store('news_images', 'public');
            $data['img_src'] = $path;           
        }

        // dd($data);     
        $news->update($data);
    
        return redirect()->route('coffee.news')->with('success', 'Blog post updated successfully.');
    }
}
