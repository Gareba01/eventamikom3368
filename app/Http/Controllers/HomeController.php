<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Admin\EventController as EventAdminController;

class HomeController extends Controller
{
    //
    public function index()
{
    return view('welcome');
}
}

