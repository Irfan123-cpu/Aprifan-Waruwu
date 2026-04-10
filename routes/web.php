<?php

use App\Http\Controllers\DestinationController;
use Illuminate\Support\Facades\Route;
use App\Models\Destinations;

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
    return view('pages.Destination', compact('destinasi'));
});


Route::get(
    "/destinations",
    [DestinationController::class, 'index']
);
Route::get(
    "/destinations/{id}",
    [DestinationController::class, 'show']
);

Route::get("/destination/create", [DestinationController::class, 'create']);
Route::post("/destinations", [DestinationController::class, 'store']);
Route::get("/destinations/{id}/edit", [DestinationController::class, 'edit']);
Route::put("/destinations/{id}/update", [DestinationController::class, 'update']);
Route::delete('/destinations/{id}', [DestinationController::class, 'delete']);

