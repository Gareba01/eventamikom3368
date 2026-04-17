<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EventController extends Controller
{
    // Method untuk halaman detail event
    public function show()
    {
        return view('event-detail');
    }

    // Method untuk halaman checkout (pemesanan)
    public function checkout()
    {
        return view('checkout');
    }

    public function ticket()
    {
        return view('ticket');
    }
}