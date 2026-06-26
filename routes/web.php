<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\WelcomeController;

// Admin Controllers
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\EventController as EventAdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PartnerController;

// Redirect login bawaan ke halaman login admin
Route::get('/login', function () {
    return redirect()->route('admin.login');
})->name('login');

// ==========================================
// ROUTE PUBLIK (Pengguna Biasa)
// ==========================================
Route::get('/', [WelcomeController::class, 'index'])->name('home');
Route::get('/event/1', [EventController::class, 'show'])->name('events.show');
Route::get('/checkout/{event}', [\App\Http\Controllers\CheckoutController::class, 'create'])->name('checkout.create');
Route::post('/checkout/{event}', [\App\Http\Controllers\CheckoutController::class, 'store'])->name('checkout.store');
Route::get('/ticket', [EventController::class, 'ticket'])->name('tickets.index');

// Rute Pembayaran & Sukses Midtrans yang dipindahkan ke area Publik
Route::get('/payment/{order_id}', [\App\Http\Controllers\CheckoutController::class, 'payment'])->name('checkout.payment');
Route::get('/success/{order_id}', [\App\Http\Controllers\CheckoutController::class, 'success'])->name('checkout.success');

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

    // Rute Login bebas akses
    Route::get('login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('login', [AuthController::class, 'login'])->name('login.post');
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');

    // Mengamankan Route Administrasi di balik tembok (Middleware)
    Route::middleware(['auth', 'admin'])->group(function () {

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

        // 5. Laporan Transaksi
        Route::get('transactions', [\App\Http\Controllers\Admin\TransactionController::class, 'index'])->name('transactions.index');
    });

});