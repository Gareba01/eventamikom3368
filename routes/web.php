<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\TicketController;

// Route Detail Event
Route::get('/event/1', [EventController::class, 'show'])->name('events.show');

// Route Checkout
Route::get('/checkout', [EventController::class, 'checkout'])->name('events.checkout');

// Route Tiket
Route::get('/ticket', [EventController::class, 'ticket'])->name('tickets.index');


// 1. Rute Home - Pakai HomeController saja, hapus yang Route::get('/', function...)
Route::get('/', [HomeController::class, 'index'])->name('home');




// 3. Rute Statis Lainnya
Route::get('/tentang', function () {
    return '<h1>Ini adalah Halaman Tentang Aplikasi Event Hub (Running on Mac)</h1>';
});

Route::get('/kontak', function () {
    return view('contact');
});

Route::get('/profil', function () {
    return view('profil');
});

Route::get('/katalog', function () {
    return view('katalog');
});

Route::get('/bantuan', function () {
    return view('bantuan');
});

