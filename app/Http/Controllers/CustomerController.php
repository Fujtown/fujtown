<?php

namespace App\Http\Controllers;

use App\Models\BusinessHour;
use App\Models\Category;
use App\Models\Listing;
use App\Models\ListingImage;
use App\Models\Package;
use App\Models\Order;
use App\Models\NoonTransaction;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use DateTime;
use App\Helpers\CacheHelper;

class CustomerController extends Controller
{
    public function dashboard()
    {
        // $user=auth()->user();
        // dd($user);
       return view('customer.dashboard');
    }
    public function Customerlisting()
    {
        $customer = Auth::user();
        $listings=Listing::with('order')->with('package')->where('user_id',$customer->id)->where('listing_status',0)->get();
       
       return view('customer.customer-listing',compact('listings'));
    }
    public function CustomerActivelisting()
    {
        $customer = Auth::user();
        $listings = Listing::with(['single_category', 'reviews'])->where('user_id', $customer->id)->where('listing_status', 1)
    ->withCount('reviews')->get();

    session([
        'activelisting' => $listings[0]->listing_id,
    ]);
       return view('customer.customer-activelisting',compact('listings'));
    }
    public function Customerreview()
    {
        $listing_id = session('activelisting');
        // dd($listing_id);
        $reviews=Review::where('listing_id',$listing_id)->get();
        // dd($reviews);
       return view('customer.customer-review',compact('reviews'));
    }
    public function Customerprofile()
    {
       return view('customer.customer-profile');
    }

    public function Customeradlisting(Request $request)
    {
        $package=$request->package;
        // dd($package);
        $categories = Category::all();
       return view('customer.customer-adlisting', compact(['categories','package']));
    }

    public function addListing(Request $request)
    {
        // dd($request);
       $customer = Auth::user();
    //    dd($customer->id);
       $packageName = $request->package ?? ''; // Assuming the package has a slug or name field

         // Retrieve the package and determine max allowed images based on the package name
         $package = Package::where('slug', $request->input('package'))->first();

    $packageId = $package->id ?? ''; 
    $packagePrice = $package->packg_price_year;
    $packageNameSel = $package->packg_name;
     // Set session variables for package price and name
     session([
        'packagePrice' => $packagePrice,
        'packageNameSel' => $packageNameSel,
    ]);
       $maxGalleryImages = match($packageName) {
        'municipality-verified-package' => 2,
        'smart-business-package' => 15,
        'golden-package' => 20,
        'small-business-package' => 5,
        default => 20,
    };

        // Validate the form inputs
        $request->validate([
            'listing_name' => 'required|string|max:255',
            'listing_region' => 'required|string',
            'category_id' => 'required|array',
            'file' => 'nullable|file|image|mimes:jpeg,png,jpg,gif|max:2048',
             'gallery_images' => "nullable|array|max:$maxGalleryImages", // Restrict max images based on package
            'gallery_images.*' => 'nullable|file|image|mimes:jpeg,png,jpg,gif|max:2048'
            // Add similar validation for other days of the week...
        ]);

        // Check if the number of gallery images exceeds the limit
    $galleryImages = $request->file('gallery_images') ?? [];
    if (count($galleryImages) > $maxGalleryImages) {
        return redirect()->back()->withErrors([
            'gallery_images' => "You can upload a maximum of $maxGalleryImages images for this package."
        ])->withInput();
    }

        // Create a new Listing instance
        $listing = new Listing();
        $listing->listing_name = $request->input('listing_name');
        $listing->listing_name_arabic = $request->input('listing_name_arabic');
        $listing->listing_email = $request->input('listing_email');
        $listing->listing_region = $request->input('listing_region');
        $listing->listing_desc = $request->input('listing_desc');
        $listing->listing_web_url = $request->input('listing_web_url');
        $listing->listurl =Str::slug($request->input('listing_name'));
        $listing->listing_lat = $request->input('listing_lat');
        $listing->listing_long = $request->input('listing_long');
        $listing->listing_pobox = $request->input('listing_pobox');
        $listing->listing_freezone = $request->input('listing_freezone');
        $listing->listing_phone = $request->input('listing_phone');
        $listing->listing_landline = $request->input('listing_landline');
        $listing->listing_additional_info = $request->input('listing_additional_info');
        $listing->listing_facebook =  $request->input('listing_facebook');
        $listing->listing_instagram = $request->input('listing_instagram');
        $listing->listing_twitter =   $request->input('listing_twitter');
        $listing->listing_youtube =   $request->input('listing_youtube');
        $listing->listing_linkedin =  $request->input('listing_linkedin');
        $listing->listing_google =  $request->input('listing_google');
        $listing->user_id=$customer->id;
        $listing->listing_package=$packageId;
        $listing->listing_status=0;
        $listing->listing_featured=1;
        $listing->listing_popular=1;
        $listing->listing_view_counter=1;
         // Convert the category_id array to a comma-separated string
         $listing->category_id = $request->input('category_id')[0];
        // $listing->category_id=$request->input('category_id');
        // Handle cover image upload
        if ($request->hasFile('file')) {
            $coverImagePath = $request->file('file')->store('cover_images', 'public');
            $listing->listing_cover_image = $coverImagePath;
        }

        // dd('work');
        
        // Save the listing to the database
        $listing->save();

      session([
        'listing_id' => $listing->listing_id
    ]);
    
        foreach ($request->input('category_id') as $categoryId) {
            DB::table('category_listing')->insert([
                'category_id' => $categoryId,
                'listing_id' => $listing->listing_id,
            ]);
        }
        
        // Attach categories to the listing
        // $listing->categories()->attach($request->input('category_id'));

        // Insert gallery images
        if ($request->hasFile('gallery_images')) {
            $galleryImages = $request->file('gallery_images');
            $successfulUploads = 0; // Counter for successful uploads
        
            foreach ($galleryImages as $galleryImage) {
                // Check if the image file is valid
                if ($galleryImage->isValid()) {
                    try {
                        // Store the image and get the path
                        $imagePath = $galleryImage->store('gallery_images', 'public');
                        
                        // Save the image path to the ListingImage table
                        ListingImage::create([
                            'listing_id' => $listing->listing_id,
                            'listing_images' => $imagePath,
                        ]);
        
                        $successfulUploads++;
                    } catch (\Exception $e) {
                        // Log or handle error (optional)
                        Log::error('Gallery image upload failed: ' . $e->getMessage());
                    }
                }
            }
        
            // If there were unsuccessful uploads, return a message to the user
            if ($successfulUploads < count($galleryImages)) {
                return redirect()->back()->withErrors(['gallery_images' => 'Some images could not be uploaded. Please try again.']);
            }
        }
        

        // Insert business hours
        BusinessHour::create([
            'listing_id'        =>   $listing->listing_id,
            'monday_open'       =>   $request->input('monday_open'),
            'monday_close'      =>   $request->input('monday_close'),
            'tuesday_open'      =>   $request->input('tuesday_open'),
            'tuesday_close'     =>   $request->input('tuesday_close'),
            'wednesday_open'    =>   $request->input('wednesday_open'),
            'wednesday_close'   =>   $request->input('wednesday_close'),
            'thursday_open'     =>   $request->input('thursday_open'),
            'thursday_close'    =>   $request->input('thursday_close'),
            'friday_open'       =>   $request->input('friday_open'),
            'friday_close'      =>   $request->input('friday_close'),
            'saturday_open'     =>   $request->input('saturday_open'),
            'saturday_close'    =>   $request->input('saturday_close'),
            'sunday_open'       =>   $request->input('sunday_open'),
            'sunday_close'      =>   $request->input('sunday_close'),
        ]);

                // Forget relevant cache keys
                CacheHelper::forget([
                    'random_companies',
                    'latest_companies',
                    'featured_companies',
                    'most_popular_companies',
                ]);

                
        // Redirect with a success message
        return redirect()->route('customer.payment');
    }
    
       public function Payment()
{
    $packagePrice = session('packagePrice');
    $packageNameSel = session('packageNameSel');
    return view('front.payment',compact('packagePrice','packageNameSel'));
}

    public function Checkout(Request $request)
    {
        $customer = Auth::user();

           // Retrieve the amount from the request
        $amount = $request->input('amount');

        // Check if the amount is not null before setting session values
        if (!is_null($amount)) {
            // Set the package price and name in the session if amount is valid
            session([
                'packagePrice' => $amount,
                'packageNameSel' => $request->input('package_name'),
            ]);
        }

        $packagePrice = session('packagePrice');
        $packageNameSel = session('packageNameSel');
       
                try {
                    $merchant_ref = rand(1, 100000);
    
        
        //   $url = 'https://api.noonpayments.com/payment/v1/order';
           $url = 'https://api-test.noonpayments.com/payment/v1/order';
          $app_key = base64_encode('fujtown.Fujtrade:123f3ac6adba441e899ad9ff866b5b6a');
        //   dd($app_key);
                 //$app_key = 'ZnVqdG93bi5mdWp0cmFkZToxMjNmM2FjNmFkYmE0NDFlODk5YWQ5ZmY4NjZiNWI2YQ==';
                
                $numberString = $packagePrice;
                $cleanNumber = str_replace(',', '', $numberString); // Removes commas
            
                $payload = [
                    "apiOperation" => "INITIATE",
                    "order" => [
                        "reference" => $merchant_ref,
                        "amount" =>$cleanNumber ,
                        "currency" => 'AED',
                        "name" => $packageNameSel,
                        "channel" => "web",
                        "category" => "pay"
                    ],
                    
                    "billing"=> [
                        
                        "address"=> [
                            "street"=> 'Fujairah',
                            ],    
                        "contact"=> [
                            
                            "firstName"=> $customer->first_name,
                            "lastName"=> $customer->last_name,
                            "mobilePhone"=> '+971'.'-'.$customer->customer_phone,
                            "email"=> $customer->email
                    ]
                ],
                
                    "configuration" =>
                            [
                                'tokenizeCc' => 'true',
                                'paymentAction' => 'SALE',
                                'returnUrl' => 'https://w-iclinics.com/newfujtown/public/customer/noon_response',
                                'locale' => 'en',
                            ]
                ];

                // dd($payload);
            
                $response = Http::withHeaders([
                     'Authorization' =>'Key_Test ZnVqdG93bi5mdWp0cmFkZTo4MDMzMGFhY2RiNmU0M2MyYmE1OTIzMzI0MzE1MDI2OA==',
                    'Content-Type' => 'application/json'
                ])->post($url, $payload);
            
               
                $responseData = $response->json();
                // dd($responseData);
                if ($response->successful() && $responseData['resultCode'] == 0 && $responseData['result']['order']['status'] == 'INITIATED') {
                   
                    $paymentUrl = $responseData['result']['checkoutData']['postUrl'];
            
                    //return redirect()->away($paymentUrl);
                    // $agent = $request->cookie('agentID');
                    // return response()->json(['success' => true, 'url' => $paymentUrl])->withCookie($agent);
                   return response()->json(['success' => true, 'url' => $paymentUrl]);
                } else {
                    // Handle errors or unsuccessful payment initiation
                    $errorMessage = $responseData['message'] ?? 'Unknown error';
                    return response()->json([
                        'error' => 'Failed to initiate payment',
                        'message' => $errorMessage
                    ], $response->status());
                }
    
                } catch (\Exception $e) {
                    Log::error('Error creating charge: '.$e->getMessage());
                    return response()->json(['error' => 'Internal Server Error'], 500);
                }
    }
    
    public function noon_response(Request $request)
{
    $noon_id=$request->input('orderId');
    // dd($noon_id);
    
     return view('front.noon_success',compact(['noon_id']));
        
}

   public function get_noon_last_payment(Request $request)
        {
             $noon_id = $request->query('noon_id');

            if (!$noon_id) {
                return response()->json(['error' => 'noon_id is required'], 400);
            }

            try {
                // $secretKey = env('TAP_PAYMENT_SECRET');
                 $url = 'https://api-test.noonpayments.com/payment/v1/order/'.$noon_id;

    $response = Http::withHeaders([
        'Authorization' =>'Key_Test ZnVqdG93bi5mdWp0cmFkZTo4MDMzMGFhY2RiNmU0M2MyYmE1OTIzMzI0MzE1MDI2OA==',
            'Content-Type' => 'application/json'
        ])->get($url);
        
        // dd($response);
        if ($response->successful()) {
           $responseData= $response->json();
            $order=$responseData['result']['order'];
             $status=$order['status'];
        }
         return response()->json(['success' => true, 'status' => $status]);

        }catch (\Exception $e) {
            Log::error("Error fetching payment data: " . $e->getMessage());
            return response()->json(['error' => 'Internal Server Error'], 500);
        }
        }
        
         public function save_noon_payment_data(Request $request)
        {
            
            $orderId = $request->query('noon_id');
            $customer = Auth::user();
            
        $packageNameSel = session('packageNameSel');
      
        
        // dd($listing);

        if (!$orderId) {
            return response()->json(['error' => 'orderId is required'], 400);
        }
        
      $url = 'https://api-test.noonpayments.com/payment/v1/order/'.$orderId;
       
        $response = Http::withHeaders([
            'Authorization' =>'Key_Test ZnVqdG93bi5mdWp0cmFkZTo4MDMzMGFhY2RiNmU0M2MyYmE1OTIzMzI0MzE1MDI2OA==',
                'Content-Type' => 'application/json'
            ])->get($url);
    
            if ($response->successful()) {
                 $order=$this->save_order_data();
                //  dd($order);
                $this->save_noon_data($response,$order);
                
            }
            else {
                // Handle errors, could log them or return a custom message
                return response()->json([
                    'status' => 'error',
                    'message' => 'Failed to retrieve the order from Noon Payments',
                    'details' => $response->json()
                ], $response->status());
            }
        }
        
         protected function doesNoonTransactionExist($tr_id)
        {
            $exists = NoonTransaction::where('tr_id', $tr_id)->exists();
            return $exists;
        }
        
          public function save_noon_data($response,$order_id)
        {
             $packagePrice = session('packagePrice');
           $responseData= $response->json();
            // dd($responseData);
           $transactions=$responseData['result']['transactions'][0] ?? null; 
            $tr_id = $transactions['id'] ?? null; // Replace 'default_tr_id' with your desired default value
            $date = $transactions['creationTime'] ?? null; // Replace 'default_date' with your desired default value
           $order=$responseData['result']['order'] ?? null;
           $billing=$responseData['result']['billing']['contact'];
           $paymentDetails=$responseData['result']['paymentDetails'] ?? null;
           
             $amount = $order['totalCapturedAmount'] ?? $packagePrice;
             $currency = $order['currency'] ?? null;
             $message=$order['name'] ?? null;
             $reference =$order['reference'] ?? null;
             $status=$order['status'] ?? null;
               
               
             $first_name=$billing['firstName'];
             $last_name =$billing['lastName'];
             $phone=$billing['mobilePhone'];
             $email =$billing['email'];
           
             
             $dateTime = new DateTime($date);
             $timestampInSeconds = $dateTime->getTimestamp();
             $milliseconds = $timestampInSeconds * 1000 + (int)($dateTime->format('v'));
             
             $mode=$paymentDetails['mode'] ?? null;
             $intAccount =$paymentDetails['integratorAccount'] ?? null;
             $paymentInfo =$paymentDetails['paymentInfo'] ?? null;
             $brand =$paymentDetails['brand'] ?? null;
             $expiryMonth =$paymentDetails['expiryMonth'] ?? null;
             $expiryYear =$paymentDetails['expiryYear'] ?? null;
             $cardCountry =$paymentDetails['cardCountry'] ?? 'Card Country';
             $cardCountryName =$paymentDetails['cardCountryName'] ?? 'Default Country';
             $cardIssuerName = $paymentDetails['cardIssuerName'] ?? 'Default Value';
             
             
            //  $agentID =$agentID;
            // Your logic to check if chr_id exists
            $chrIdExists = $this->doesNoonTransactionExist($tr_id);

            if (!$chrIdExists) {
                 $pdatas = [
                    'tr_id'=>$tr_id,
                    'amount' => $amount,
                    'currency'=>$currency,
                    'first_name'=>$first_name,
                    'last_name'=>$last_name,
                    'phone'=>$phone,
                    'email'=>$email,
                    'status'=>$status,
                    'date'=>$milliseconds,
                    'message'=>$message,
                    'reference'=>$reference,
                    'mode'=>$mode,
                    'intAccount'=>$intAccount,
                    'paymentInfo'=>$paymentInfo,
                    'brand'=>$brand,
                    'expiryMonth'=>$expiryMonth,
                    'expiryYear'=>$expiryYear,
                    'cardCountry'=>$cardCountry,
                    'cardCountryName'=>$cardCountryName,
                    'cardIssuerName'=>$cardIssuerName,
                    'order_id'=>$order_id
                ];
                

             NoonTransaction::create($pdatas);
             
             $order = Order::findOrFail($order_id);
             $data['noon_order_id'] = $tr_id; 
             $data['payment_status'] = $status; 
             $order->update($data);

            }
            
        }
            
            public function save_order_data()
            {
                $customer = Auth::user();
                $listing_id = session('listing_id');

                $listing = Listing::where('listing_id', $listing_id)->first();

                $packagePrice = session('packagePrice');
                
                $exists = Order::where('listing_id', $listing_id)->where('payment_status', '!=', 'CAPTURED')->exists();
                if($exists<1)
                {
                    $pdatas = [
                        'order_customer_id'         =>$customer->id,
                        'order_customer_fname'      =>$customer->first_name,
                        'order_customer_lname'      =>$customer->last_name,
                        'order_customer_email'      =>$customer->email,
                        'order_customer_address'    =>$listing->listing_region.','.$listing->listing_additional_info,
                        'order_customer_city'       =>$listing->listing_region,
                        'order_customer_state'      =>$listing->listing_region,
                        'order_customer_country'    =>$listing->listing_additional_info,
                        'order_payment_mode'        =>'Noon',
                        'order_total'               =>$packagePrice,
                        'order_date'                =>date('Y-m-d'),
                        'order_customer_phone'      =>$listing->listing_landline,
                        'listing_id'                =>$listing_id
                    ];
                }   
             
                

             $order=Order::create($pdatas);
             
            return $order->id;
            }
            

    public function Logout()
    {

    }
}
