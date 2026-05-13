<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Car;
use App\Models\Inquiry;

class AdminController extends Controller
{
    public function dashboard()
    {
        $totalCars       = Car::count();
        $availableCars   = Car::where('status', 'available')->count();
        $soldCars        = Car::where('status', 'sold')->count();
        $totalInquiries  = Inquiry::count();
        $recentInquiries = Inquiry::with('car')->latest()->limit(10)->get();

        return view('admin.dashboard', compact(
            'totalCars',
            'availableCars',
            'soldCars',
            'totalInquiries',
            'recentInquiries'
        ));
    }
}
