<?php

namespace App\Http\Controllers;

use App\Models\Advertisement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
class AdvertismentController extends Controller
{
    public function Advertisment()
    {
        $advertisment=Advertisement::all();
        return view('admin.advertisment.index',compact('advertisment'));
    }

    public function Addadvertisment()
    {
        return view('admin.advertisment.create');
    }

    public function storeAdvertisment(Request $request)
    {
        // Validate the form inputs
        $request->validate([
            'ad_name' => 'required|string',
            'ad_order' => 'required|integer',
            'add_position' => 'required|string|max:10',
            'ad_url' => 'required|url|max:100',
            'ad_status' => 'required|in:0,1', // assuming 1 for active, 0 for disabled
            'ad_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'ad_description' => 'required|string',
        ]);

        // dd('work');

        // Handle image upload if provided
        $imagePath = null;
        if ($request->hasFile('ad_image')) {
            $imagePath = $request->file('ad_image')->store('advertisements', 'public');
        }

        // Create a new Advertisement instance
        $advertisement = new Advertisement();
        $advertisement->ad_name = $request->input('ad_name');
        $advertisement->ad_order = $request->input('ad_order');
        $advertisement->add_position = $request->input('add_position');
        $advertisement->ad_url = $request->input('ad_url');
        $advertisement->ad_status = $request->input('ad_status');
        $advertisement->ad_image = $imagePath;
        $advertisement->ad_description = $request->input('ad_description');
        $advertisement->last_shown = time(); // e.g., timestamp of creation

        // Save the advertisement to the database
        $advertisement->save();

        // Redirect with a success message
        return redirect()->route('coffee.advertisment')->with('success', 'Advertisement created successfully!');
    }

    public function deleteAdvertisment($id)
    {
         // Find the blog by ID
         $blog = Advertisement::findOrFail($id);

         // Remove the image from storage if it exists
         if ($blog->image) {
             Storage::disk('public')->delete($blog->image);
         }
 
         // Delete the blog from the database
         $blog->delete();
 
         // Redirect back with a success message
         return redirect()->route('coffee.advertisment')->with('success', 'Advertisement deleted successfully!');
    }

    public function changeAdStatus(Request $request)
    {
        $request->validate([
            'id' => 'required|integer|exists:advertisements,id',
            'ad_status' => 'required|in:0,1',
        ]);

        // Find the advertisement by ID and update the status
        $advertisement = Advertisement::findOrFail($request->id);
        $advertisement->ad_status = $request->ad_status;
        $advertisement->save();

        return response()->json(['success' => true, 'message' => 'Status updated successfully']);
    }

    public function editAdvertisment($id)
    {
        $advertisement = Advertisement::findOrFail($id);
        return view('admin.advertisment.edit',compact(['advertisement']));
    }

    public function updateAdvertisment(Request $request,$id)
    {
        $request->validate([
            'ad_name' => 'required|string',
            'ad_order' => 'required|integer',
            'add_position' => 'required|string|max:10',
            'ad_url' => 'required|url|max:100',
            'ad_status' => 'required|in:0,1', // assuming 1 for active, 0 for disabled
            'ad_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'ad_description' => 'required|string',
        ]);
    
        $advertisement = Advertisement::findOrFail($id);
       
        // Generate slug from title
        
        $data = $request->except('cover_image');
        $data['ad_name'] = $request->ad_name;
        $data['ad_order'] = $request->ad_order;
        $data['add_position'] = $request->add_position;
        $data['ad_url'] = $request->ad_url;
        $data['ad_status'] = $request->ad_status;
        $data['ad_description'] = $request->ad_description;
        if ($request->hasFile('ad_image')) {
            // Delete old image
            if ($advertisement->cover_image) {
                Storage::disk('public')->delete($advertisement->cover_image);
            }
    
            // Store new image
            $path = $request->file('ad_image')->store('advertisements', 'public');
            $data['ad_image'] = $path;           
        }
   
        $advertisement->update($data);
    
        return redirect()->route('coffee.advertisment')->with('success', 'Advertisment post updated successfully.');
    }
   
}
