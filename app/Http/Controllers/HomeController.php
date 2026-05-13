<?php

namespace App\Http\Controllers;

use App\Models\Car;

class HomeController extends Controller
{
    public function index()
    {
        $featuredCars = Car::where('status', 'available')->latest()->limit(6)->get();
        return view('home', compact('featuredCars'));
    }
}

