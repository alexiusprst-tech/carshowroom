<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Inquiry;
use Illuminate\Http\Request;

class InquiryController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'required|email|max:255',
            'message' => 'required|string|max:1000',
            'car_id'  => 'required|exists:cars,id',
        ]);

        Inquiry::create($validated);

        return back()->with('success', 'Pesan Anda telah terkirim! Kami akan segera menghubungi Anda.');
    }
}
