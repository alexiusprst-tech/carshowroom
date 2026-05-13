@extends('layouts.app')

@section('title', $car->name . ' — Urban Wheels Indonesia')

@section('content')
<div class="pt-20 min-h-screen bg-gray-50">

    <!-- Breadcrumb -->
    <div class="bg-white border-b border-gray-200 py-4">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center gap-2 text-gray-400 text-sm">
                <a href="{{ url('/') }}" class="hover:text-blue-600">Beranda</a>
                <i class="fas fa-chevron-right text-xs"></i>
                <a href="{{ route('cars.index') }}" class="hover:text-blue-600">Katalog</a>
                <i class="fas fa-chevron-right text-xs"></i>
                <span class="text-blue-600">{{ $car->name }}</span>
            </div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="grid lg:grid-cols-2 gap-12">

            {{-- ===== CAR IMAGE ===== --}}
            <div>
                <div class="rounded-2xl overflow-hidden border border-gray-200 mb-4 bg-white" style="aspect-ratio:16/9;">
                    @if($car->image)
                    <img src="{{ asset('storage/'.$car->image) }}" alt="{{ $car->name }}"
                         class="w-full h-full object-cover" id="mainImg">
                    @else
                    <div class="w-full h-full flex items-center justify-center">
                        <i class="fas fa-car text-gray-300 text-8xl"></i>
                    </div>
                    @endif
                </div>

                <!-- Status & Year badges -->
                <div class="flex gap-3">
                    @if($car->status === 'available')
                    <span class="bg-green-500/20 text-green-400 border border-green-500/30 text-sm font-bold px-4 py-2 rounded-full flex items-center gap-2">
                        <span class="w-2 h-2 bg-green-400 rounded-full animate-pulse"></span> Unit Tersedia
                    </span>
                    @else
                    <span class="bg-red-500/20 text-red-400 border border-red-500/30 text-sm font-bold px-4 py-2 rounded-full">
                        Sudah Terjual
                    </span>
                    @endif
                    <span class="bg-blue-50 text-blue-600 border border-blue-200 text-sm font-bold px-4 py-2 rounded-full">
                        Tahun {{ $car->year }}
                    </span>
                </div>
            </div>

            {{-- ===== CAR DETAILS ===== --}}
            <div>
                <p class="text-blue-600 text-sm font-semibold uppercase tracking-widest mb-2">{{ $car->brand }}</p>
                <h1 class="text-3xl md:text-4xl font-black text-gray-900 mb-4">{{ $car->name }}</h1>

                <!-- Price -->
                <div class="bg-blue-50 border border-blue-100 rounded-2xl p-5 mb-6">
                    <p class="text-gray-500 text-sm mb-1">Harga</p>
                    <p class="text-4xl font-black text-blue-700">{{ $car->formatted_price }}</p>
                    <p class="text-gray-400 text-xs mt-1">Harga dapat dinegosiasi • Cash / Kredit / T/T</p>
                </div>

                <!-- Specs -->
                <div class="grid grid-cols-2 gap-4 mb-6">
                    @foreach([
                        ['fas fa-tag','Brand',$car->brand],
                        ['fas fa-calendar','Tahun',$car->year],
                        ['fas fa-check-circle','Status',$car->status === 'available' ? 'Tersedia' : 'Terjual'],
                        ['fas fa-shield-alt','Garansi','Hingga 2 Tahun'],
                    ] as [$icon,$label,$value])
                    <div class="bg-white rounded-xl p-4 border border-gray-200 shadow-sm">
                        <div class="flex items-center gap-2 mb-1">
                            <i class="{{ $icon }} text-blue-600 text-xs"></i>
                            <span class="text-gray-400 text-xs uppercase tracking-wider">{{ $label }}</span>
                        </div>
                        <p class="text-gray-900 font-semibold text-sm">{{ $value }}</p>
                    </div>
                    @endforeach
                </div>

                <!-- Description -->
                @if($car->description)
                <div class="mb-6">
                    <h3 class="text-gray-900 font-bold mb-3 flex items-center gap-2">
                        <i class="fas fa-info-circle text-blue-600"></i> Deskripsi
                    </h3>
                    <p class="text-gray-600 text-sm leading-relaxed bg-gray-50 rounded-xl p-4 border border-gray-200">
                        {{ $car->description }}
                    </p>
                </div>
                @endif

                <!-- Keunggulan -->
                <div class="grid grid-cols-3 gap-3 mb-8">
                    @foreach([
                        ['fas fa-water','Bebas Banjir'],
                        ['fas fa-car-crash','Bebas Tabrak'],
                        ['fas fa-tools','Free Detailing'],
                    ] as [$icon,$label])
                    <div class="bg-white rounded-xl p-3 border border-gray-200 shadow-sm text-center">
                        <i class="{{ $icon }} text-blue-600 mb-1 block"></i>
                        <p class="text-gray-900 text-xs font-semibold">{{ $label }}</p>
                    </div>
                    @endforeach
                </div>

                <!-- CTA Buttons -->
                @if($car->status === 'available')
                <div class="flex flex-col sm:flex-row gap-3 mb-6">
                    <a href="https://wa.me/6281252211587?text=Halo%20Urban%20Wheels%20Indonesia%2C%20saya%20tertarik%20dengan%20{{ urlencode($car->name) }}%20({{ $car->year }})%20seharga%20{{ urlencode($car->formatted_price) }}." target="_blank"
                       class="flex-1 bg-green-500 hover:bg-green-600 text-white font-bold px-6 py-4 rounded-xl flex items-center justify-center gap-3 transition-all hover:shadow-lg hover:shadow-green-500/25">
                        <i class="fab fa-whatsapp text-xl"></i> Tanya via WhatsApp
                    </a>
                    <button onclick="document.getElementById('inquiryForm').scrollIntoView({behavior:'smooth'})"
                       class="flex-1 btn-gold px-6 py-4 rounded-xl flex items-center justify-center gap-3">
                        <i class="fas fa-envelope"></i> Kirim Inquiry
                    </button>
                </div>
                @else
                <div class="bg-red-50 border border-red-200 rounded-xl p-4 mb-6 text-center">
                    <p class="text-red-600 font-semibold">Unit ini sudah terjual</p>
                    <a href="{{ route('cars.index') }}" class="text-blue-600 text-sm hover:underline">Lihat unit lainnya →</a>
                </div>
                @endif
            </div>
        </div>

        {{-- ===== INQUIRY FORM ===== --}}
        @if($car->status === 'available')
        <div class="mt-16" id="inquiryForm">
            <div class="max-w-2xl mx-auto">
                <div class="text-center mb-8">
                    <h2 class="text-3xl font-black text-gray-900 mb-2">Tertarik dengan <span class="text-blue-600">{{ $car->name }}</span>?</h2>
                    <p class="text-gray-500">Kirim pesan Anda dan kami akan segera menghubungi Anda</p>
                </div>

                @if(session('success'))
                <div class="bg-green-900/50 border border-green-700 text-green-400 rounded-xl p-4 mb-6 flex items-center gap-3">
                    <i class="fas fa-check-circle"></i>
                    <span>{{ session('success') }}</span>
                </div>
                @endif

                <form action="{{ route('inquiry.store') }}" method="POST"
                      class="bg-white rounded-2xl border border-gray-200 shadow-sm p-8">
                    @csrf
                    <input type="hidden" name="car_id" value="{{ $car->id }}">

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-5 mb-5">
                        <div>
                            <label class="text-gray-600 text-xs uppercase tracking-wider mb-2 block">Nama Lengkap *</label>
                            <input type="text" name="name" value="{{ old('name') }}"
                                   placeholder="Masukkan nama Anda"
                                   class="w-full bg-white border border-gray-300 text-gray-900 placeholder-gray-400 rounded-xl px-4 py-3 text-sm focus:outline-none focus:border-blue-500 transition-colors @error('name') border-red-500 @enderror">
                            @error('name')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                        </div>
                        <div>
                            <label class="text-gray-600 text-xs uppercase tracking-wider mb-2 block">Email *</label>
                            <input type="email" name="email" value="{{ old('email') }}"
                                   placeholder="email@contoh.com"
                                   class="w-full bg-white border border-gray-300 text-gray-900 placeholder-gray-400 rounded-xl px-4 py-3 text-sm focus:outline-none focus:border-blue-500 transition-colors @error('email') border-red-500 @enderror">
                            @error('email')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                        </div>
                    </div>

                    <div class="mb-6">
                        <label class="text-gray-600 text-xs uppercase tracking-wider mb-2 block">Pesan *</label>
                        <textarea name="message" rows="4"
                                  placeholder="Tulis pertanyaan Anda di sini..."
                                  class="w-full bg-white border border-gray-300 text-gray-900 placeholder-gray-400 rounded-xl px-4 py-3 text-sm focus:outline-none focus:border-blue-500 transition-colors resize-none @error('message') border-red-500 @enderror">{{ old('message') }}</textarea>
                        @error('message')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                    </div>

                    <button type="submit" class="btn-gold w-full py-4 rounded-xl font-bold text-base flex items-center justify-center gap-3">
                        <i class="fas fa-paper-plane"></i> Kirim Pesan Sekarang
                    </button>
                </form>
            </div>
        </div>
        @endif

        {{-- ===== RELATED CARS ===== --}}
        @if($relatedCars->isNotEmpty())
        <div class="mt-20">
            <h2 class="text-2xl font-black text-gray-900 mb-8">Mobil <span class="text-blue-600">Sejenis</span></h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6">
                @foreach($relatedCars as $related)
                <div class="card-hover bg-white rounded-2xl overflow-hidden border border-gray-200 shadow-sm group">
                    <div class="relative overflow-hidden">
                        @if($related->image)
                        <img src="{{ asset('storage/'.$related->image) }}" alt="{{ $related->name }}"
                             class="w-full h-36 object-cover group-hover:scale-105 transition-transform duration-500">
                        @else
                        <div class="w-full h-36 bg-gray-100 flex items-center justify-center">
                            <i class="fas fa-car text-gray-300 text-3xl"></i>
                        </div>
                        @endif
                    </div>
                    <div class="p-4">
                        <p class="text-gray-400 text-xs mb-1">{{ $related->brand }}</p>
                        <h4 class="text-gray-900 font-bold text-sm mb-2 line-clamp-1">{{ $related->name }}</h4>
                        <p class="text-blue-600 font-black text-base mb-3">{{ $related->formatted_price }}</p>
                        <a href="{{ route('cars.show', $related) }}" class="btn-gold w-full py-2 rounded-full text-xs block text-center">Lihat Detail</a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @endif
    </div>
</div>
@endsection
