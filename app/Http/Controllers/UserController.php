<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller
{
    public function Customers()
    {
        $customers=Customer::all();
        // dd($customers);
        return view('admin.customer.index',compact('customers'));
    }

    public function addCustomer()
    {
        return view('admin.customer.create');
    }

    public function storeCustomer(Request $request)
    {
        $request->validate([
            'first_name'                  => 'nullable|string',
            'last_name'                   => 'nullable|string',
            'customer_user_name'          => 'required|string|min:3|max:255|unique:customers',
            'customer_phone'              => 'nullable|integer',
            'email'                       => 'nullable|email',
            'new_password'                => 'nullable|string',
        ]);

        // Create a new Blog instance
        $customer = new Customer();
        $customer->first_name           = $request->first_name;
        $customer->last_name            = $request->last_name;
        $customer->customer_user_name   = $request->customer_user_name;
        $customer->customer_phone       = $request->customer_phone;
        $customer->email                = $request->email;
        $customer->password             = $request->new_password;
        
        // Save the blog to the database
        $customer->save();

        // Redirect back with success message
        return redirect()->route('coffee.customer')->with('success', 'Customer created successfully!');
    }

    public function editCustomer($id)
    {
        $customer = Customer::findOrFail($id);
        return view('admin.customer.edit',compact('customer'));
    }

  

    public function updateCustomer(Request $request, string $id)
    {
        
        $request->validate([
            'first_name'                  => 'nullable|string',
            'last_name'                   => 'nullable|string',
            'customer_user_name'          => 'nullable|string',
            'customer_phone'              => 'nullable|integer',
            'email'                       => 'nullable|email',
            'new_password'                => 'nullable|string',
        ]);
    
        $customer = Customer::findOrFail($id);
       
        // Generate slug from title
        
        $data =[];
        $data['first_name'] = $request->first_name;
        $data['last_name'] = $request->last_name;
        $data['customer_user_name'] = $request->customer_user_name;
        $data['customer_phone'] = $request->customer_phone;
        $data['password'] = Hash::make($request->new_password);
         
        $customer->update($data);
    
        return redirect()->route('coffee.customer')->with('success', 'Customer updated successfully.');
    }
}
