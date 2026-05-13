<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminCarController extends Controller
{
    public function index()
    {
        $cars = Car::latest()->paginate(15);
        return view('admin.cars.index', compact('cars'));
    }

    public function create()
    {
        return view('admin.cars.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'        => 'required|string|max:255',
            'brand'       => 'required|string|max:100',
            'price'       => 'required|numeric|min:0',
            'year'        => 'required|integer|min:1980|max:' . (date('Y') + 1),
            'description' => 'nullable|string',
            'image'       => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'status'      => 'required|in:available,sold',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('cars', 'public');
        }

        Car::create($validated);

        return redirect()->route('admin.cars.index')->with('success', 'Mobil berhasil ditambahkan!');
    }

    public function show(Car $car)
    {
        return view('admin.cars.show', compact('car'));
    }

    public function edit(Car $car)
    {
        return view('admin.cars.edit', compact('car'));
    }

    public function update(Request $request, Car $car)
    {
        $validated = $request->validate([
            'name'        => 'required|string|max:255',
            'brand'       => 'required|string|max:100',
            'price'       => 'required|numeric|min:0',
            'year'        => 'required|integer|min:1980|max:' . (date('Y') + 1),
            'description' => 'nullable|string',
            'image'       => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'status'      => 'required|in:available,sold',
        ]);

        if ($request->hasFile('image')) {
            if ($car->image) {
                Storage::disk('public')->delete($car->image);
            }
            $validated['image'] = $request->file('image')->store('cars', 'public');
        }

        $car->update($validated);

        return redirect()->route('admin.cars.index')->with('success', 'Mobil berhasil diperbarui!');
    }

    public function destroy(Car $car)
    {
        if ($car->image) {
            Storage::disk('public')->delete($car->image);
        }
        $car->delete();

        return redirect()->route('admin.cars.index')->with('success', 'Mobil berhasil dihapus!');
    }
}

