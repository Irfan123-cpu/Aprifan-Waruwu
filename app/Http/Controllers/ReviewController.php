<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\Attraction;

class ReviewController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->input('search');
        $query = Review::query();

        if ($keyword) {
            $query->where(function($q) use ($keyword) {
                $q->where('name', 'LIKE', '%' . $keyword . '%')
                  ->orWhere('comment', 'LIKE', '%' . $keyword . '%');
            });
        }

        $reviews = $query->orderBy('id', 'desc')->paginate(5);
        return view('pages.review.index', compact('reviews'));
    }

    public function show($id)
    {
        $review = Review::findOrFail($id);
        return view('pages.review.detail', compact('review'));
    }

    public function create()
    {
        $attractions = Attraction::all();
        return view('pages.review.create', compact('attractions'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'attraction_id' => 'required',
            'name'          => 'required',
            'comment'   => 'required',
        ]);
//  dd($validated,$request->all());
        Review::create($validated);
        return redirect()->route('review.index')->with('success', 'Review berhasil ditambahkan.');
    }

    public function edit($id)
    {   
        $review = Review::findOrFail($id);
        $attractions = Attraction::all();
        return view('pages.review.edit', compact('review', 'attractions'));
    }

   public function update(Request $request, $id)
{
    $review = Review::findOrFail($id);

    $validated = $request->validate([
        'attraction_id' => 'required',
        'name'          => 'required',
        'comment'      => 'required', 
    ]);
   

    $review->update($validated);

    return redirect()->route('review.index')->with('success', 'Review berhasil diperbarui.');
}

    public function destroy($id)
    {
        $review = Review::findOrFail($id);
        $review->delete();
        return redirect()->route('review.index')->with('success', 'Review berhasil dihapus.');
    }
}