<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attraction;

class AttractionController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->input('search');
        
        $attraction = Attraction::query();

        if ($keyword) {
            $attraction->where(function($query) use ($keyword) {
                $query->where('name', 'LIKE', '%' . $keyword . '%')
                      ->orWhere('description', 'LIKE', '%' . $keyword . '%');
            });
        } else {
            $attraction->orderBy('id', 'desc');
        }

        $attraction = $attraction->paginate(10);
        
        return view('pages.attraction.indexattraction', compact('attraction'));
    }

    public function show($id)
    {
        $attraction = Attraction::findOrFail($id);
        return view('pages..attraction.detailattraction', compact('attraction'));
    }

    public function create()
    {
        return view('pages.attraction.createattraction');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        Attraction::create([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        return redirect()->route('attraction.index')->with('success', 'Atraksi berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $attraction = Attraction::findOrFail($id);
        return view('pages.attraction.edit', compact('attraction'));
    }

    public function update(Request $request, $id)
    {
        $attraction = Attraction::findOrFail($id); 

        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $attraction->update([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        return redirect()->route('attractions.index')->with('success', 'Atraksi berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $attraction = Attraction::findOrFail($id);
        $attraction->delete();
        
        return redirect()->route('attraction.index')->with('success', 'Atraksi berhasil dihapus.');
    }
}