<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    // Method untuk halaman detail event
    public function show(Event $event)
    {
        return view('event-detail', compact('event'));
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