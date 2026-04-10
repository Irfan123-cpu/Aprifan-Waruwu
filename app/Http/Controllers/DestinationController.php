<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// Pastikan nama model konsisten. Biasanya Laravel menggunakan singular (Destination)
// Saya sesuaikan dengan kode Anda yang menggunakan Destinations
use App\Models\Destinations; 

class DestinationController extends Controller
{
    public function index()
    {
        $destinations = Destinations::all();
        return view('pages.indexDestinations', compact('destinations'));
    }

    public function show($id)
    {
        
        $destinations = Destinations::findOrFail($id);
        return view('pages.detaildestinasi', compact('destinations'));
    }

    public function create()
    {
        return view('pages.createDestination');
    }

    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'location' => 'required',
        ]);

        Destinations::create($request->all());
        return redirect('/destinations')->with('success', 'Destination created successfully.');
    }

    public function delete($id)
    {
        $destination = Destinations::findOrFail($id);
        $destination->delete();
        return redirect('/destinations')->with('success', 'Destination deleted successfully.'); 
    }

    public function edit($id)
    {
    
        $destination = Destinations::findOrFail($id);
        return view('pages.editDestination', compact('destination'));
    }

    public function update(Request $request, $id)
    {
      
        $destination = Destinations::find($id);

        if ($destination) {
            $destination->update($request->all());
            
            return redirect('/destinations')->with('success', 'Destination updated successfully.');
        } else {
      
            return redirect('/destinations')->with('error', 'Destination not found.');
        }
    }
}