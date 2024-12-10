<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    
    public function login()
    {
         // Check if customer is already logged in
    if (Auth::guard('customer')->check()) {
        return redirect()->route('customer.dashboard')->with('info', 'You are already logged in.');
    }
        return view('front.login');
    }

    public function login_customer(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
    
        // Debug: Check what credentials are being received
        Log::info('Login attempt credentials:', ['email' => $credentials['email']]);
    
        // 1. First, verify if the customer exists
        $customer = \App\Models\Customer::where('email', $credentials['email'])->first();
        
        if (!$customer) {
            return back()
                ->withInput($request->only('email'))
                ->withErrors([
                    'email' => 'No account found with this email.',
                ]);
        }
    
        // 2. Debug: Check if customer was found
        Log::info('Customer found:', ['customer' => $customer->id]);
    
        try {
            // 3. Attempt authentication
            if (Auth::guard('customer')->attempt($credentials)) {
                // $admin = Auth::user();
                // dd($admin);
                $request->session()->regenerate();
                return redirect()->intended(route('home'))
                    ->with('success', 'Welcome back!');
            }
    
            // 4. If we get here, password was wrong
            return back()
                ->withInput($request->only('email'))
                ->withErrors([
                    'password' => 'Invalid password.',
                ]);
    
        } catch (\Exception $e) {
            // 5. Log any errors
            Log::error('Login error:', ['error' => $e->getMessage()]);
            
            return back()
                ->withInput($request->only('email'))
                ->withErrors([
                    'error' => 'Login error: ' . $e->getMessage(),
                ]);
        }
    }
    


    public function register()
    {
        return view('front.register');
    }
    
    public function register_user(Request $request)
    {
        // Validate the incoming request data
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'customer_user_name' => 'required|string|min:3|max:255|unique:customers',
            'customer_phone' => 'required|string|size:10',
            'email' => 'required|string|email|max:255|unique:customers',
            'confirm_email' => 'required|string|email|same:email',
            'customer_password' => 'required|string|min:8',
            'confirm_password' => 'required|string|same:customer_password',
            'terms_accepted' => 'required|accepted',
        ]);
       
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        // Create a new user
        try {
            
            $user = Customer::create([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'customer_user_name' => $request->customer_user_name,
                'customer_phone' => $request->customer_phone,
                'email' => $request->email,
                'password' => Hash::make($request->customer_password),
            ]);
            //dd('works');
            // You can add additional logic here, such as sending a verification email

            return response()->json(['success' => true, 'message' => 'User registered successfully'], 201);
        } catch (\Exception $e) {
            // Log the error
            Log::error('User registration failed: ' . $e->getMessage());
            return response()->json(['success' => false, 'message' => 'Registration failed. Please try again.'], 500);
        }
    }



}
