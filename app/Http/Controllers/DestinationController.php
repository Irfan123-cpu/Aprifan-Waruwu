<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Destinations; 

class DestinationController extends Controller
{
    public function index(Request $request){

    $keyword = $request->input('search');
    if ($keyword !=''){
        $destinations = Destinations::where('name','LIKE', '%' . $keyword . '%')->paginate(5);
    }else {
        $destinations = Destinations::orderby('id')->paginate(5);
    }
    return view('pages..destination.indexDestinations', compact('destinations'));
    
    
    }

    public function show($id)
    {
        
        $destinations = Destinations::findOrFail($id);
        return view('pages.destination.detaildestinasi', compact('destinations'));
    }

    public function create()
    {
        return view('pages.destination.createDestination');
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

    public function destroy($id)
    {
        $destination = Destinations::findOrFail($id);
        $destination->delete();
        return redirect('/destinations')->with('success', 'Destination deleted successfully.'); 
    }

    public function edit($id)
    {
    
        $destination = Destinations::findOrFail($id);
        return view('pages.destination.editDestination', compact('destination'));
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