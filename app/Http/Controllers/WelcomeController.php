<?php

namespace App\Http\Controllers;

use App\Models\Partner;
use App\Models\Category;
use App\Models\Event;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        $partners = Partner::all();
        $categories = Category::all();
        $events = Event::latest()->take(6)->get();

        return view('welcome', compact('partners', 'categories', 'events'));
    }
}