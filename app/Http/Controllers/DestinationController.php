<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Destinations;

class DestinationController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->input('search');

        if ($keyword) {
            $destinations = Destinations::where('name', 'LIKE', "%$keyword%")
                ->latest()
                ->paginate(5);
        } else {
            $destinations = Destinations::latest()->paginate(5);
        }

        return view('pages.destination.indexDestinations', compact('destinations'));
    }

    public function show($id)
    {
        $destination = Destinations::findOrFail($id);
        return view('pages.destination.detaildestinasi', compact('destination'));
    }

    public function create()
    {
        return view('pages.destination.createDestination');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'location' => 'required',
            'working_days' => 'required',
            'working_hours' => 'required',
            'ticket_price' => 'required',
            'image' => 'nullable|image|max:2048|mimes:jpg,jpeg,png',
        ]);


        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            $validated['image'] = basename($imagePath);
        }
         Destinations::create($validated);

        return redirect()->route('destinations.index')->with('success', 'Destination created successfully.');
    }

    public function edit($id)
    {
        $destination = Destinations::findOrFail($id);
        return view('pages.destination.editDestination', compact('destination'));
    }

    public function update(Request $request, $id)
    {
        $destinations = Destinations::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'location' => 'required',
            'working_days' => 'required',
            'working_hours' => 'required',
            'ticket_price' => 'required',
            'image' => 'nullable|image|max:2048|mimes:jpg,jpeg,png',
        ]);


        if ($request->hasFile('image')) {
            if ($destinations->image) {
                Storage::disk('public')->delete('images/' . $destinations->image);
            }

            $imagePath = $request->file('image')->store('images', 'public');
            $validated['image'] = basename($imagePath);
        }

        $destinations->update($validated);

        return redirect()->route('destinations.index')->with('success', 'Destination updated successfully.');
    }

    public function destroy($id)
    {
        $destinations = Destinations::findOrFail($id);

        if ($destinations->image) {
            Storage::disk('public')->delete('images/' . $destinations->image);
        }


    $destinations->delete();
        return redirect()->route('destinations.index')->with('success', 'Destination deleted successfully.');
    }
}
