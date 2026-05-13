<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;

class CarController extends Controller
{
    public function index(Request $request)
    {
        $query = Car::query()->where('status', 'available');

        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->filled('brand')) {
            $query->where('brand', $request->brand);
        }

        if ($request->filled('min_price')) {
            $query->where('price', '>=', $request->min_price);
        }

        if ($request->filled('max_price')) {
            $query->where('price', '<=', $request->max_price);
        }

        if ($request->filled('year')) {
            $query->where('year', $request->year);
        }

        if ($request->filled('sort')) {
            if ($request->sort === 'price_asc') {
                $query->orderBy('price', 'asc');
            } elseif ($request->sort === 'price_desc') {
                $query->orderBy('price', 'desc');
            } elseif ($request->sort === 'newest') {
                $query->orderBy('year', 'desc');
            } else {
                $query->latest();
            }
        } else {
            $query->latest();
        }

        $cars   = $query->paginate(12)->withQueryString();
        $brands = Car::distinct()->pluck('brand')->sort()->values();
        $years  = Car::distinct()->orderBy('year', 'desc')->pluck('year');

        return view('cars.index', compact('cars', 'brands', 'years'));
    }

    public function show(Car $car)
    {
        $relatedCars = Car::where('brand', $car->brand)
            ->where('id', '!=', $car->id)
            ->where('status', 'available')
            ->limit(4)
            ->get();

        return view('cars.show', compact('car', 'relatedCars'));
    }
}
