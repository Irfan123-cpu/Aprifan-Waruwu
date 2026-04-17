<?php

use App\Http\Controllers\DestinationController;
use Illuminate\Support\Facades\Route;
use App\Models\Destinations;
use App\Http\Controllers\UserController;
use App\Models\Attraction;
use App\Http\AttractionControllers;
use App\Http\Controllers\AttractionController;

Route::get('/', function () {
    return view('welcome');
});
Route::get("/halo", function () {
    $name = "Irfan";
    $hobis = ["Coding", "Gaming", "Traveling"];
    return view("halo", compact("name", "hobis"));
});
Route::get("/switch", function () {
    $role = "admin";
    return view("switch", compact("role"));
});

Route::get("master", function () {
    return view('pages.home');
});

Route::get("/about", function () {
    return view('pages.about');
});

Route::get('/destinasi', action: function () {

    $destinasi = [
        "nama" => "Bali",
        "lokasi" => "Denpasar,Bali",
        "harga" => "Rp. 5.000.000",
        "durasi" => "4 hari 3 malam",
        "transportasi" => "Pesawat",
        "hotel" => "Bintang 4",
        "rating" => 4.8,
        "gambar" => "https://i.natgeofe.com/n/a86c35b9-f3cf-40ac-a70e-3c804c1a8188/GettyImages-109862623-Ubud.jpg",
        "fasilitas" => ["Hotel", "Sarapan", "Tour Guide", "Transportasi Lokal"],

    ];
    return view('pages.destination.Destination', compact('destinasi'));
});



// Destinations
Route::controller(DestinationController::class)->prefix('destinations')->name('destinations.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/create', 'create')->name('create');
    Route::post('/', 'store')->name('store');
    Route::get('/{id}', 'show')->name('show');
    Route::get('/{id}/edit', 'edit')->name('edit');
    Route::put('/{id}', 'update')->name('update');
    Route::delete('/{id}', 'destroy')->name('destroy');
});

// Users
Route::controller(UserController::class)->prefix('users')->name('users.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/create', 'create')->name('create');
    Route::post('/', 'store')->name('store');
    Route::get('/{id}', 'show')->name('show');
    Route::delete('/{id}', 'destroy')->name('destroy');
    Route::get('/{id}/edit', 'edit')->name('edit');
    Route::put('/{id}', 'update')->name('update');
   
});


Route::controller(AttractionController::class)->prefix('attraction')->name('attraction.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/create', 'create')->name('create');
    Route::post('/', 'store')->name('store');
    Route::get('/{id}/edit', 'edit')->name('edit');
    Route::put('/{id}', 'update')->name('update');
    Route::delete('/{id}', 'destroy')->name('destroy');
    Route::get('/{id}', 'show')->name('show');
});

Route::resource( 'attraction', \App\Http\Controllers\AttractionController::class);


Route::resource('review', \App\Http\Controllers\ReviewController::class);



