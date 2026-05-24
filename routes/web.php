<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\WelcomeController;

// Admin Controllers
use App\Http\Controllers\Admin\EventController as EventAdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PartnerController;

// ==========================================
// ROUTE PUBLIK (Pengguna Biasa)
// ==========================================
Route::get('/', [WelcomeController::class, 'index'])->name('home');
Route::get('/event/1', [EventController::class, 'show'])->name('events.show');
Route::get('/checkout', [EventController::class, 'checkout'])->name('events.checkout');
Route::get('/ticket', [EventController::class, 'ticket'])->name('tickets.index');

Route::get('/tentang', function () {
    return '<h1>Ini adalah Halaman Tentang Aplikasi Event Hub (Running on Mac)</h1>';
});
Route::get('/kontak', function () { return view('contact'); });
Route::get('/profil', function () { return view('profil'); });
Route::get('/katalog', function () { return view('katalog'); });
Route::get('/bantuan', function () { return view('bantuan'); });

// ==========================================
// ROUTE KHUSUS ADMIN
// ==========================================
Route::prefix('admin')->name('admin.')->group(function () {

    // 1. Dashboard Admin
    Route::get('/', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    // 2. Kelola Event
    Route::resource('events', EventAdminController::class);

    // 3. Kelola Kategori
    Route::resource('categories', CategoryController::class);

    // 4. Kelola Partner
    Route::resource('partners', PartnerController::class);

});