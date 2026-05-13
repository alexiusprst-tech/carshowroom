@extends('layouts.app')

@section('title', 'Katalog Mobil — Urban Wheels Indonesia')

@section('content')
<div class="pt-20 min-h-screen bg-gray-50">

    <!-- Page Header -->
    <div class="bg-white border-b border-gray-200 py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center gap-2 text-gray-400 text-sm mb-4">
                <a href="{{ url('/') }}" class="hover:text-blue-600">Beranda</a>
                <i class="fas fa-chevron-right text-xs"></i>
                <span class="text-blue-600">Katalog Mobil</span>
            </div>
            <h1 class="text-4xl font-black text-gray-900 mb-2">Katalog <span class="text-blue-600">Mobil</span></h1>
            <p class="text-gray-500">Temukan mobil impian Anda dari koleksi kami</p>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
        <div class="flex flex-col lg:flex-row gap-8">

            {{-- ===== FILTER SIDEBAR ===== --}}
            <aside class="lg:w-72 flex-shrink-0">
                <form method="GET" action="{{ route('cars.index') }}" id="filterForm">
                    <div class="bg-white rounded-2xl border border-gray-200 shadow-sm p-6 sticky top-24">
                        <div class="flex items-center justify-between mb-6">
                            <h3 class="text-gray-900 font-bold text-lg">Filter & Cari</h3>
                            <a href="{{ route('cars.index') }}" class="text-gray-400 hover:text-blue-600 text-xs">Reset</a>
                        </div>

                        <!-- Search -->
                        <div class="mb-5">
                            <label class="text-gray-500 text-xs uppercase tracking-wider mb-2 block">Cari Mobil</label>
                            <div class="relative">
                                <input type="text" name="search" value="{{ request('search') }}"
                                       placeholder="Nama mobil..."
                                       class="w-full bg-gray-50 border border-gray-200 text-gray-900 placeholder-gray-400 rounded-xl px-4 py-3 pl-10 text-sm focus:outline-none focus:border-blue-500 transition-colors">
                                <i class="fas fa-search absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-sm"></i>
                            </div>
                        </div>

                        <!-- Brand -->
                        <div class="mb-5">
                            <label class="text-gray-500 text-xs uppercase tracking-wider mb-2 block">Brand / Merek</label>
                            <select name="brand"
                                    class="w-full bg-gray-50 border border-gray-200 text-gray-900 rounded-xl px-4 py-3 text-sm focus:outline-none focus:border-blue-500 transition-colors appearance-none">
                                <option value="">Semua Brand</option>
                                @foreach($brands as $brand)
                                <option value="{{ $brand }}" {{ request('brand') == $brand ? 'selected' : '' }}>{{ $brand }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Year -->
                        <div class="mb-5">
                            <label class="text-gray-500 text-xs uppercase tracking-wider mb-2 block">Tahun</label>
                            <select name="year"
                                    class="w-full bg-gray-50 border border-gray-200 text-gray-900 rounded-xl px-4 py-3 text-sm focus:outline-none focus:border-blue-500 transition-colors appearance-none">
                                <option value="">Semua Tahun</option>
                                @foreach($years as $year)
                                <option value="{{ $year }}" {{ request('year') == $year ? 'selected' : '' }}>{{ $year }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Price Range -->
                        <div class="mb-5">
                            <label class="text-gray-500 text-xs uppercase tracking-wider mb-2 block">Harga Minimum (Rp)</label>
                            <input type="number" name="min_price" value="{{ request('min_price') }}"
                                   placeholder="Contoh: 50000000"
                                   class="w-full bg-gray-50 border border-gray-200 text-gray-900 placeholder-gray-400 rounded-xl px-4 py-3 text-sm focus:outline-none focus:border-blue-500 transition-colors">
                        </div>
                        <div class="mb-5">
                            <label class="text-gray-500 text-xs uppercase tracking-wider mb-2 block">Harga Maksimum (Rp)</label>
                            <input type="number" name="max_price" value="{{ request('max_price') }}"
                                   placeholder="Contoh: 500000000"
                                   class="w-full bg-gray-50 border border-gray-200 text-gray-900 placeholder-gray-400 rounded-xl px-4 py-3 text-sm focus:outline-none focus:border-blue-500 transition-colors">
                        </div>

                        <!-- Sort -->
                        <div class="mb-6">
                            <label class="text-gray-500 text-xs uppercase tracking-wider mb-2 block">Urutkan</label>
                            <select name="sort"
                                    class="w-full bg-gray-50 border border-gray-200 text-gray-900 rounded-xl px-4 py-3 text-sm focus:outline-none focus:border-blue-500 transition-colors appearance-none">
                                <option value="">Terbaru</option>
                                <option value="price_asc"  {{ request('sort') == 'price_asc'  ? 'selected' : '' }}>Harga Termurah</option>
                                <option value="price_desc" {{ request('sort') == 'price_desc' ? 'selected' : '' }}>Harga Tertinggi</option>
                                <option value="newest"     {{ request('sort') == 'newest'     ? 'selected' : '' }}>Tahun Terbaru</option>
                            </select>
                        </div>

                        <button type="submit" class="btn-gold w-full py-3 rounded-xl font-bold flex items-center justify-center gap-2">
                            <i class="fas fa-filter"></i> Terapkan Filter
                        </button>
                    </div>
                </form>
            </aside>

            {{-- ===== CAR GRID ===== --}}
            <div class="flex-1">
                <!-- Results header -->
                <div class="flex items-center justify-between mb-6">
                    <p class="text-gray-500 text-sm">
                        Menampilkan <span class="text-gray-900 font-semibold">{{ $cars->total() }}</span> mobil
                        @if(request()->hasAny(['search','brand','year','min_price','max_price']))
                        <span class="text-blue-600">(dengan filter)</span>
                        @endif
                    </p>
                    <div class="flex items-center gap-2 text-sm text-gray-400">
                        <i class="fas fa-th text-blue-600"></i> Grid
                    </div>
                </div>

                @if($cars->isNotEmpty())
                    <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 gap-6">
                    @foreach($cars as $car)
                    <div class="card-hover bg-white rounded-2xl overflow-hidden border border-gray-200 shadow-sm group">
                        <div class="relative overflow-hidden">
                            @if($car->image)
                            <img src="{{ asset('storage/'.$car->image) }}" alt="{{ $car->name }}"
                                 class="w-full h-48 object-cover group-hover:scale-105 transition-transform duration-500">
                            @else
                            <div class="w-full h-48 bg-gradient-to-br from-gray-100 to-gray-200 flex items-center justify-center">
                                <i class="fas fa-car text-gray-300 text-4xl"></i>
                            </div>
                            @endif
                            <div class="absolute top-3 left-3">
                                @if($car->status === 'available')
                                <span class="bg-green-500 text-white text-xs font-bold px-3 py-1 rounded-full">Tersedia</span>
                                @else
                                <span class="bg-red-500 text-white text-xs font-bold px-3 py-1 rounded-full">Terjual</span>
                                @endif
                            </div>
                            <div class="absolute top-3 right-3">
                                <span class="bg-black/60 text-white text-xs font-bold px-3 py-1 rounded-full">{{ $car->year }}</span>
                            </div>
                        </div>
                        <div class="p-5">
                            <p class="text-blue-600 text-xs font-semibold uppercase tracking-wider mb-1">{{ $car->brand }}</p>
                            <h3 class="text-gray-900 font-bold text-base mb-3 line-clamp-1">{{ $car->name }}</h3>
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="text-xs text-gray-400 mb-1">Harga</p>
                                    <p class="text-blue-600 font-black text-lg">{{ $car->formatted_price }}</p>
                                </div>
                                <a href="{{ route('cars.show', $car) }}"
                                   class="btn-gold px-4 py-2 rounded-full text-xs flex items-center gap-1.5">
                                    Detail <i class="fas fa-arrow-right text-xs"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

                <!-- Pagination -->
                <div class="mt-10">
                    {{ $cars->links() }}
                </div>

                @else
                <div class="flex flex-col items-center justify-center py-24 text-center">
                    <div class="w-20 h-20 bg-gray-100 rounded-full flex items-center justify-center mb-6">
                        <i class="fas fa-car text-gray-300 text-3xl"></i>
                    </div>
                    <h3 class="text-gray-900 font-bold text-xl mb-2">Tidak Ada Mobil</h3>
                    <p class="text-gray-400 mb-6">Tidak ada mobil yang cocok dengan filter Anda.</p>
                    <a href="{{ route('cars.index') }}" class="btn-gold px-6 py-3 rounded-full">Reset Filter</a>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>

@section('head')
<style>
    .pagination { display:flex; gap:8px; justify-content:center; flex-wrap:wrap; margin-top:8px; }
    .pagination span, .pagination a {
        display:inline-flex; align-items:center; justify-content:center;
        min-width:38px; height:38px; padding:0 10px; border-radius:8px;
        font-size:14px; font-weight:600; transition:all .2s;
    }
    .pagination a { background:#f1f5f9; color:#374151; border:1px solid #e5e7eb; }
    .pagination a:hover { background:#2563eb; color:#fff; border-color:#2563eb; }
    .pagination span[aria-current="page"] { background:#2563eb; color:#fff; border:1px solid #2563eb; }
    .pagination span.dots { background:transparent; color:#9ca3af; border:none; }
</style>
@endsection
@endsection
