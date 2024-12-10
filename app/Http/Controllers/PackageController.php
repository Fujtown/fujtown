<?php

namespace App\Http\Controllers;

use App\Models\Package;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    public function addPackage()
    {
        return view('admin.package.create');
    }

    public function listPackages()
    {
        $packages=Package::get();
        return view('admin.package.view',compact('packages'));
    }

    public function Store_package(Request $request)
    {
        $request->validate([
            'package_name' => 'required',
            'icon' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'monthly_price' => 'required|numeric',
            'yearly_price' => 'required|numeric',
            'points' => 'required|array',
            'points.*' => 'required|string',
            'sub_points' => 'nullable|array',
        ]);

        // dd('working');
        $packg_thumb='';
        if ($request->hasFile('icon')) {
            $path = $request->file('icon')->store('package_icons', 'public');
            $packg_thumb = $path;
        }
        

        $points = $request->points;
        $subPoints = $request->sub_points ?? []; // Get sub_points or an empty array if not provided
    
        $mergedPoints = [];
        foreach ($points as $index => $point) {
            $mergedPoints[] = [
                'point' => $point,
                'sub_points' => $index === 0 ? $subPoints : [] // Only add sub_points to the first point
            ];
        }
        
        Package::create([
            'packg_name' => $request->package_name,
            'packg_thumb' => $packg_thumb,
            'packg_price_month' => $request->monthly_price,
            'packg_price_year' => $request->yearly_price,
            'packg_points' => json_encode($mergedPoints),

        ]);
    
        return redirect()->route('coffee.packages')->with('success', 'Package added successfully!');
    }

    public function updatePackage(Request $request, $id)
    {
        $request->validate([
            'package_name' => 'required',
            'icon' => 'image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'monthly_price' => 'required|numeric',
            'yearly_price' => 'required|numeric',
        ]);
        // dd('work');
    
        $package = Package::findOrFail($id);
        
        $package->packg_name = $request->input('package_name');
        $package->packg_price_month = $request->input('monthly_price');
        $package->packg_price_year = $request->input('yearly_price');
        // Handle the file upload if there's an image
        if ($request->hasFile('icon')) {
            // Remove old image if necessary and store new one
            $thumbPath = $request->file('icon')->store('package_icons', 'public');
            $package->packg_thumb = $thumbPath;
        }
    
        $package->save();
    
        return redirect()->back()->with('success', 'package updated successfully!');
    }

    public function deletePackage($id)
    {
        $package = Package::findOrFail($id);
        $package->delete();
    
        return redirect()->back()->with('success', 'package deleted successfully!');
    }
    
}
