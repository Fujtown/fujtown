<?php

namespace App\Http\Controllers;

use App\Models\AllJobs;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\BlogView;
use App\Models\BusinessHour;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\FAQCategory;
use App\Models\Feedback;
use App\Models\Listing;
use App\Models\Package;
use App\Models\Parent_category;
use App\Models\Review;
use App\Models\Trip;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;

class HomeController extends Controller
{
    public function index()
    {
        // dd(Str::slug('Emiratisation Quotas'));
        $user = Auth::user();
        // dd($user);
        // Cache random companies
            $randomCompanies = Cache::remember('random_companies', 60 * 60, function () {
                return Listing::inRandomOrder()->take(3)->get();
            });

            // Cache latest companies
            $latestCompanies = Cache::remember('latest_companies', 60 * 60, function () {
                return Listing::latest()->take(8)->get();
            });

            // Cache featured companies
            $featuredCompanies = Cache::remember('featured_companies', 60 * 60, function () {
                return Listing::where('listing_featured', 1)->latest()->take(8)->get();
            });

            // Cache most popular companies
            $mostPopularCompanies = Cache::remember('most_popular_companies', 60 * 60, function () {
                return Listing::orderBy('listing_view_counter', 'desc')->take(8)->get();
            });

            // Cache packages
            $packages = Cache::remember('packages', 60 * 60, function () {
                return Package::take(4)->get();
            });

            // Cache parent categories
            $parent_cat = Cache::remember('parent_categories', 60 * 60, function () {
                return Parent_category::take(6)->get();
            });

            // Cache all categories
            $categories = Cache::remember('categories', 60 * 60, function () {
                return Category::all();
            });
        // $blogs = Blog::take(4)->get();
        $blogs = Blog::with('category')->take(4)->get()
        ->map(function ($blog) {
            $blog->formatted_date = Carbon::parse($blog->created_date)->format('j M Y');
            return $blog;
        });
        // dd($blogs);
        return view('front.home', compact('latestCompanies', 'featuredCompanies', 'mostPopularCompanies','packages','parent_cat','categories','blogs','randomCompanies'));
  
    }

    public function contact()
    {
        $categories = FAQCategory::with('faqs')->get();
        // dd($categories);
        return view('front.contact',compact('categories'));
    }
    public function events()
    {
        $pastEvents = Trip::all();
        return view('front.events',compact('pastEvents'));
    }
    public function blogs()
    {
        $categories=BlogCategory::all();
        $getBlogs = Cache::remember('blogs_with_category_paginated', 60 * 60, function () {
            return Blog::with('category')
                ->paginate(12)
                ->through(function ($blog) {
                    $blog->formatted_date = Carbon::parse($blog->created_date)->format('j M Y');
                    return $blog;
                });
        });

        // Retrieve the most used tags
            $allTags = Blog::pluck('tags')
            ->flatMap(function ($tags) {
                // Split tags by comma and trim whitespace
                return explode(',', $tags);
            })
            ->map(function ($tag) {
                return trim($tag); // Trim any extra whitespace
            })
            ->filter() // Remove empty tags
            ->countBy() // Count occurrences of each tag
            ->sortDesc() // Sort by frequency
            ->take(10); // Get the top 10 most used tags

        // dd($allTags);
        return view('front.blogs',compact('getBlogs','categories','allTags'));
    }
    public function blogDetails($slug)
    {
        $blog = Blog::where('url', $slug)->first();
        $metaDescription = Str::limit(strip_tags($blog->description), 150);

        $ipAddress = request()->ip();

    // Check if the IP address has already viewed the blog
    $viewExists = BlogView::where('blog_id', $blog->blog_id)
    ->where('ip_address', $ipAddress)
    ->exists();
    // dd($viewExists);

        if (!$viewExists) {
        // Create a new BlogView record
        BlogView::create([
        'blog_id' => $blog->blog_id,
        'ip_address' => $ipAddress,
        ]);

        // Increment the blog's view count
        //$blog->increment('views');
        }
        // dd('work');
        // Get the top 3 recommended blogs based on unique views in blog_views
   // Get the top 3 recommended blogs based on unique views in blog_views
        $recommendedBlogs = Blog::where('blog_id', '!=', $blog->blog_id)
        ->withCount('views')
        ->with('category')
        ->orderBy('views_count', 'desc')
        ->take(3)
        ->get()->map(function ($recblog) {
            $recblog->formatted_date = Carbon::parse($recblog->created_date)->format('j M Y');
            return $recblog;
        });
        // dd($recommendedBlogs);
         return view('front.blog-details',compact('blog','recommendedBlogs','metaDescription'));
    }
    public function attractions()
    {
        return view('front.attractions');
    }
    public function submitListing()
    {
        
        $packages1 = Package::latest()->take(2)->get();
        $packages2= Package::take(3)->get();
        return view('front.submitListing',compact('packages1','packages2'));
    }
    public function About()
    {
        return view('front.about');
    }
    public function governmentDetails()
    {
        return view('front.government-details');
    }
    public function printing()
    {
        return view('front.printing');
    }
    public function tourism()
    {
        return view('front.tourism');
    }
    public function etrading()
    {
        return view('front.etrading');
    }
    public function webDev()
    {
        return view('front.website-designing-and-development');
    }
    public function terms()
    {
        return view('front.terms-and-conditions');
    }
    public function bod()
    {
        return view('front.board-of-director');
    }
    public function policy()
    {
        return view('front.refund-policy');
    }
    public function privacy()
    {
        return view('front.privacy-policy');
    }
    public function company($listing)
    {
        $listing = Listing::with(['single_category', 'images', 'reviews', 'multiple_category'])
            ->where('listurl', $listing)
            ->first();
    
        if ($listing) {
            $ipAddress = request()->ip();
            $sessionKey = 'viewed_listing_' . $listing->listing_id . '_' . $ipAddress;
            // dd($sessionKey);
            // Check if session exists for this IP address and listing
            if (!session()->has($sessionKey)) {
                // Increment the view counter
                $listing->increment('listing_view_counter');
    
                // Set session with a 10-minute expiration
                session([$sessionKey => true]);
                session()->put($sessionKey, true);
                session()->put('expiration_' . $sessionKey, now()->addMinutes(1));
            } else {
                // Check if the session has expired
                if (now()->greaterThan(session('expiration_' . $sessionKey))) {
                    // Increment the counter again as session expired
                    $listing->increment('listing_view_counter');
    
                    // Reset session expiration
                    session()->put($sessionKey, true);
                    session()->put('expiration_' . $sessionKey, now()->addMinutes(1));
                }
            }
        }
    
        $business_hour = BusinessHour::where('listing_id', $listing->listing_id)->first();
    
              // Set meta data
            $metaTitle = $listing->meta_title ?: $listing->listing_name;
            // dd($metaTitle);
            $metaDescription = $listing->meta_description ?: Str::limit($listing->listing_desc, 150);


        return view('front.listing-company', compact('listing', 'business_hour', 'metaTitle', 'metaDescription'));
    }
    

    public function HowItwork()
    {
        return view('front.how-it-work');
    }

    public function addListing()
{
    $categories = Category::all();
    return view('front.add-listing', compact('categories'));
}

    public function Payment()
{
    $packagePrice = session('packagePrice');
    $packageNameSel = session('packageNameSel');
    return view('front.payment',compact('packagePrice','packageNameSel'));
}

public function Categories($service)
{
    $pcat = Parent_category::where('parent_url', $service)->first();
    // $categories = Category::where('category_parent_id', $pcat->id)->withCount('listings')->get();
    $categories = Category::where('category_parent_id', $pcat->id)
    ->withCount(['listing' => function ($query) {
        $query->where('listing_status', 1); // Optional: add a condition to count only active listings
    }])
    ->get();

    // dd($categories);
   return view('front.categories',compact('pcat','categories'));
}

public function Business($service)
{
// dd('work');
$listings = Listing::whereHas('category', function ($query) use ($service) {
    $query->where('url', $service);
})
->withCount('images')
->orderBy('listing_featured', 'desc') // Order by listing_featured in descending order
->paginate(25);
//   dd($listings);
    $category=Category::where('url',$service)->first();
    $parent_cat=Parent_category::where('id',$category->category_parent_id)->first();
    // dd($parent_cat);
    return view('front.business',compact('listings','service','parent_cat'));
}

public function sendFeedback(Request $request)
{
    $request->validate([
        'name'              => 'required|string|max:100',
        'email'             => 'required|string|max:50',
        'phone'             => 'required|string',
        'company'           => 'nullable|string',
        'subject'           => 'required|string',
        'message'           => 'required|string'
    ]);
    // dd('work');
    // Initialize a new Trip instance
    $feedback = new Feedback();
    $feedback->name = $request->input('name');
    $feedback->email = $request->input('email');
    $feedback->phone = $request->input('phone');
    $feedback->company = $request->input('company');
    $feedback->subject = $request->input('subject');
    $feedback->message = $request->input('message');
    

    // Save the trip data to the database
    $feedback->save();

    // Redirect with a success message
    return redirect()->back()->with('success', 'message sent successfully!');
}

    public function sendReview(Request $request)
    {
         // Validation
         $request->validate([
            'companyName' => 'nullable|string|max:255',
            'email' => 'required|email|max:100',
            'description' => 'required|string',
            'listing_id' => 'required|integer|exists:listings,listing_id',
        ]);

        // Create the review
        Review::create([
            'listing_id' => $request->input('listing_id'),
            'name' => $request->input('companyName'),
            'email' => $request->input('email'),
            'message' => $request->input('description'),
            'date_created' => now()->toDateString(),
            'status' => 0, 
            'anonymous' => $request->has('anonymous') ? 1 : 0,
        ]);

        // Redirect with a success message
        return redirect()->back()->with('success', 'Review submitted successfully.');
    }

    public function getSuggestions(Request $request)
{
    $query = $request->get('q');
    $suggestions = Listing::where('listing_name', 'LIKE', "%{$query}%")
        ->take(10) // Limit the number of suggestions
        ->get(['listing_name', 'listurl']); // Select only necessary fields

    return response()->json($suggestions);
}


    public function jobs()
    {
        $jobs=AllJobs::all();

    // Calculate the status for each category
    foreach ($jobs as $job) {
        $givenDate = Carbon::parse($job->updated_at)->format('Y-m-d'); // Extract only the date

        $currentDate = Carbon::now()->format('Y-m-d'); // Current date as a formatted string
        
        // Use Carbon directly for diffInDays
        $differenceInDays = Carbon::parse($currentDate)->diffInDays(Carbon::parse($givenDate));
        $differenceInDays=-1* $differenceInDays;
        // Determine the status
        $job->status = $differenceInDays == 0 
        ? 'Posted Today' 
        : ($differenceInDays > 30 
            ? 'Posted 30+ day(s) ago' 
            : "Posted {$differenceInDays} day(s) ago");
    }
        return view('front.jobs',compact('jobs'));
    }

    public function jobDetails($job)
    {
        
        $getjob=AllJobs::where('url',$job)->first();
        // dd($getjob);
        return view('front.job-details',compact('getjob'));
    }


  
}
