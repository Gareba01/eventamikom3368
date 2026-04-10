<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/tentang', function () {
    return '<h1>Ini adalah Halaman Tentang Aplikasi Event Hub (Running on Mac)</h1>';
});

Route::get('/kontak', function () {
    return view('contact');
});

// Rute untuk Halaman Profil
Route::get('/profil', function () {
    return view('profil');
});

// Rute untuk Halaman Katalog
Route::get('/katalog', function () {
    return view('katalog');
});

// Rute untuk Halaman Bantuan
Route::get('/bantuan', function () {
    return view('bantuan');
});