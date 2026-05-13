<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Inquiry;

class AdminInquiryController extends Controller
{
    public function index()
    {
        $inquiries = Inquiry::with('car')->latest()->paginate(20);
        return view('admin.inquiries.index', compact('inquiries'));
    }

    public function destroy(Inquiry $inquiry)
    {
        $inquiry->delete();
        return back()->with('success', 'Inquiry berhasil dihapus!');
    }
}

