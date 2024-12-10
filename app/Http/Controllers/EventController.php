<?php

namespace App\Http\Controllers;

use App\Models\Trip;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
class EventController extends Controller
{
    public function Events()
    {
        $events=Trip::all();
        return view('admin.event.index',compact('events'));
    }

    public function Addevent()
    {
        return view('admin.event.create');
    }

    public function storeEvent(Request $request)
{
    // dd($request);
    // Validate form inputs
    $request->validate([
        'trip_title'       => 'required|string|max:100',
        'trip_price'       => 'required|string|max:50',
        'trip_date'        => 'required|date',
        'end_date'         => 'required|date',
        'trip_upcoming'    => 'nullable|string',
        'trip_type'        => 'required|string|max:50',
        'trip_status'      => 'required|string|max:50',
        'trip_image'       => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'trip_description' => 'required|string',
    ]);
    // dd('work');
    // Initialize a new Trip instance
    $trip = new Trip();
    $trip->trip_title = $request->input('trip_title');
    $trip->url = Str::slug($request->input('trip_title')); // Generate URL-friendly slug
    $trip->trip_price = $request->input('trip_price');
    $trip->trip_date = $request->input('trip_date');
    $trip->end_date = $request->input('end_date');
    $trip->trip_type = $request->input('trip_type');
    $trip->trip_status = $request->input('trip_status');
    $trip->trip_upcoming = $request->has('trip_upcoming') ? 1 : 0;
    $trip->trip_description = $request->input('trip_description');
    
    // Handle image upload
    if ($request->hasFile('trip_image')) {
        $tripImage = $request->file('trip_image');
        $tripImagePath = $tripImage->store('trip_images', 'public'); // Save to storage/app/public/trip_images
        $trip->trip_image = $tripImagePath;
    }

    // Save the trip data to the database
    $trip->save();

    // Redirect with a success message
    return redirect()->route('coffee.events')->with('success', 'Trip created successfully!');
}

    public function deleteEvent($id)
    {
        // Find the blog by ID
        $event = Trip::findOrFail($id);

        // Remove the image from storage if it exists
        if ($event->trip_image) {
            Storage::disk('public')->delete($event->trip_image);
        }

        // Delete the blog from the database
        $event->delete();

        // Redirect back with a success message
        return redirect()->route('coffee.events')->with('success', 'Event deleted successfully!');
    }
}
