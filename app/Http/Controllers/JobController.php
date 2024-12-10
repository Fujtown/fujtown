<?php

namespace App\Http\Controllers;

use App\Models\AllJobs;
use App\Models\JobsCategories;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class JobController extends Controller
{
    public function Jobs()
    {
        $jobs=AllJobs::with('jobcategory')->get();
        return view('admin.job.view',compact('jobs'));
    }

    public function AddJob(Request $request)
    {
        $jobcats=JobsCategories::all();
        return view('admin.job.create',compact('jobcats'));
    }

    public function storeJob(Request $request)
    {
        // dd($request);
            // Validate the incoming request data
            $validated = $request->validate([
                'job_title' => 'required|string|max:255',
                'company' => 'required|string',
                'experience' => 'nullable|string',
                'gender' => 'nullable|string',
                'education' => 'nullable|string',
                'tags' => 'nullable|string',
                'salary_from' => 'nullable|string',
                'salary_to' => 'nullable|string',
                'confidential' => 'nullable',
                'location' => 'nullable|string|max:255',
                'job_category' => 'nullable|exists:jobs_categories,id',
                'description' => 'nullable|string',
                'job_url' => 'nullable|string',
            ]);
    
            // Generate a slug from job_title and append a random 6-digit number
            $slug = Str::slug($validated['job_title']) . '-' . mt_rand(100000, 999999);

            //   dd('work');  
            // Insert the job into the database
            AllJobs::create([
                'job_title'     => $validated['job_title'],
                'url'           => $slug, // Add the generated slug to the url column
                'company'       => $validated['company'],
                'experience'    => $validated['experience'],
                'gender'        => $validated['gender'],
                'education'     => $validated['education'],
                'job_tags'      => $validated['tags'] ?? null,
                'salary_from'   => $validated['salary_from'] ?? null,
                'salary_to'     => $validated['salary_to'] ?? null,
                'confidential'  => $request->has('confidential'), // Checkbox handling
                'location'      => $validated['location'] ?? null,
                'job_category'  => $validated['job_category'] ?? null,
                'description'   => $validated['description'] ?? null,
                'job_url'       => $validated['job_url'] ?? null,
            ]);
    
            // Redirect back with a success message
            return redirect()->back()->with('success', 'Job created successfully!');
    }

  
    public function JobCategories()
    {
        $jobcats=JobsCategories::all();
        return view('admin.job.job-category',compact('jobcats'));
    }
    

    public function storeJobCategory(Request $request)
    {
            // Validate the incoming request
     $request->validate([
        'title' => 'required|string|max:255'
    ]);
    // Create a new ParentCategory instance
    $faqCategory = new JobsCategories();
    $faqCategory->title = $request->input('title');
    // Save to the database
    $faqCategory->save();

    // Redirect or return response
    return redirect()->route('coffee.job-categories')->with('success', 'Job category added successfully!');
    }

    public function updateJobCategory(Request $request,$id)
    {
        
       $request->validate([
        'title' => 'required'
    ]);
    // dd('work');

    $faqcat = JobsCategories::findOrFail($id);
    
    $faqcat->title = $request->input('title');

    $faqcat->save();

    return redirect()->back()->with('success', 'FAQ Category updated successfully!');
    }

    public function deleteJobCategory($id)
    {
        $faqCat = JobsCategories::findOrFail($id);
        $faqCat->delete();
    
        return redirect()->back()->with('success', 'Job Category deleted successfully!');
    }
}
