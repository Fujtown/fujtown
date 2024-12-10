<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
class AccountAuthController extends Controller
{
    public function login()
   {
    return view('accounts.login');
   }

   public function login_account(Request $request)
   {
       $credentials = $request->validate([
           'email' => ['required', 'email'],
           'password' => ['required'],
       ]);
   
       // Get admin record
       $admin = \App\Models\User::where('user_email', $credentials['email'])->first();
       
       if (!$admin) {
           return back()
               ->withInput($request->only('email'))
               ->withErrors([
                   'email' => 'No account found with this email.',
               ]);
       }
   
       try {
           // Attempt authentication using the correct field names
           $attemptResult = Auth::guard('admin')->attempt([
               'user_email' => $credentials['email'],
               'user_pswd' => $credentials['password']  // Use 'password' here, not 'user_pswd'
           ]);
           
           Log::info('Authentication attempt result:', ['success' => $attemptResult]);
   
           if ($attemptResult) {
               $request->session()->regenerate();
               return redirect()->intended(route('account.dashboard'))
                   ->with('success', 'Welcome back!');
           }
   
           return back()
               ->withInput($request->only('email'))
               ->withErrors([
                   'password' => 'Invalid password.',
               ]);
   
       } catch (\Exception $e) {
           Log::error('Login error:', [
               'error' => $e->getMessage(),
               'trace' => $e->getTraceAsString()
           ]);
           
           return back()
               ->withInput($request->only('email'))
               ->withErrors([
                   'error' => 'Login error: ' . $e->getMessage(),
               ]);
       }
   }

   public function logout(){
    auth()->guard('admin')->logout();
    session()->forget('admin');
    return redirect()->route('coffee.login')->with('success', 'Logged out successfully');
}
}
