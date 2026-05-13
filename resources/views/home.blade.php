@extends('layouts.app')

@section('title', 'Urban Wheels Indonesia - Mobil Impian, Harga Terbaik!')

@section('content')

{{-- ===== HERO SECTION ===== --}}
<section class="relative min-h-screen flex items-center overflow-hidden" style="background: linear-gradient(135deg, #1e3a8a 0%, #1d4ed8 40%, #0ea5e9 100%)">
    <!-- Background Pattern -->
    <div class="absolute inset-0 opacity-10">
        <div class="absolute inset-0" style="background-image: radial-gradient(circle at 2px 2px, #ffffff 1px, transparent 0); background-size: 40px 40px;"></div>
    </div>
    <!-- Blue orbs -->
    <div class="absolute top-20 right-20 w-96 h-96 rounded-full opacity-10" style="background:radial-gradient(circle, #ffffff, transparent);"></div>
    <div class="absolute bottom-20 left-20 w-64 h-64 rounded-full opacity-10" style="background:radial-gradient(circle, #93c5fd, transparent);"></div>

    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pt-28 pb-20">
        <div class="grid lg:grid-cols-2 gap-12 items-center">
            <!-- Left: Text -->
            <div>
                <div class="inline-flex items-center gap-2 bg-white/20 border border-white/30 text-white text-xs font-semibold px-4 py-2 rounded-full mb-6">
                    <span class="w-2 h-2 bg-white rounded-full animate-pulse"></span>
                    URBAN WHEELS INDONESIA — Showroom #1 Jakarta
                </div>

                <h1 class="text-5xl md:text-6xl lg:text-7xl font-black leading-tight mb-6">
                    <span class="text-white">Mobil</span><br>
                    <span style="background:linear-gradient(135deg,#bfdbfe,#ffffff,#93c5fd); -webkit-background-clip:text; -webkit-text-fill-color:transparent;">Impian,</span><br>
                    <span class="text-white">Harga</span>
                    <span style="background:linear-gradient(135deg,#bfdbfe,#ffffff); -webkit-background-clip:text; -webkit-text-fill-color:transparent;"> Terbaik!</span>
                </h1>

                <p class="text-blue-100 text-lg leading-relaxed mb-8 max-w-lg">
                    Mobil berkualitas dengan harga terbaik dan terpercaya. Garansi hingga 2 tahun, free detailing, unit bebas banjir & tabrak.
                </p>

                <!-- Stats -->
                <div class="flex gap-8 mb-10">
                    @foreach([['700+','Pelanggan Puas'],['2 Tahun','Garansi Unit'],['24 Jam','Siap Melayani']] as [$num,$label])
                    <div>
                        <div class="text-2xl font-black text-white">{{ $num }}</div>
                        <div class="text-xs text-blue-200">{{ $label }}</div>
                    </div>
                    @endforeach
                </div>

                <!-- CTA Buttons -->
                <div class="flex flex-wrap gap-4">
                    <a href="{{ route('cars.index') }}"
                       class="bg-white text-blue-700 hover:bg-blue-50 font-bold flex items-center gap-2 px-8 py-4 rounded-full text-base transition-all hover:shadow-lg hover:-translate-y-0.5">
                        <i class="fas fa-car"></i> Lihat Mobil
                    </a>
                    <a href="https://wa.me/6281252211587" target="_blank"
                       class="border-2 border-white text-white hover:bg-white hover:text-blue-700 font-bold flex items-center gap-2 px-8 py-4 rounded-full text-base transition-all">
                        <i class="fab fa-whatsapp"></i> Hubungi Kami
                    </a>
                </div>

                <!-- Rating -->
                <div class="flex items-center gap-3 mt-8">
                    <div class="flex">
                        @for($i=0;$i<5;$i++)<i class="fas fa-star text-yellow-300 text-sm"></i>@endfor
                    </div>
                    <span class="text-white font-bold">4.9</span>
                    <span class="text-blue-200 text-sm">/ 700+ ulasan pelanggan</span>
                </div>
            </div>

            <!-- Right: Car Visual -->
            <div class="relative hidden lg:block">
                <div class="relative z-10 rounded-2xl overflow-hidden border border-white/20 shadow-2xl" style="box-shadow: 0 0 80px rgba(255,255,255,0.1);">
                    <img src="https://images.unsplash.com/photo-1555215695-3004980ad54e?w=800&auto=format&fit=crop&q=80"
                         alt="Luxury Car" class="w-full h-80 object-cover">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                    <div class="absolute bottom-4 left-4 right-4">
                        <div class="glass-card rounded-xl p-4 flex items-center justify-between">
                            <div>
                                <p class="text-white font-bold">Toyota Alphard</p>
                                <p class="text-blue-200 text-sm font-semibold">Rp 850.000.000</p>
                            </div>
                            <a href="{{ route('cars.index') }}" class="bg-white text-blue-700 font-bold px-4 py-2 rounded-full text-xs">Lihat Detail</a>
                        </div>
                    </div>
                </div>
                <!-- Floating cards -->
                <div class="absolute -bottom-6 -left-6 glass-card rounded-xl p-4 z-20">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 bg-green-500/20 rounded-full flex items-center justify-center">
                            <i class="fas fa-shield-alt text-green-400"></i>
                        </div>
                        <div>
                            <p class="text-white text-sm font-semibold">Garansi 2 Tahun</p>
                            <p class="text-gray-400 text-xs">Unit terjamin</p>
                        </div>
                    </div>
                </div>
                <div class="absolute -top-6 -right-6 glass-card rounded-xl p-4 z-20">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 bg-blue-500/20 rounded-full flex items-center justify-center">
                            <i class="fas fa-bolt text-blue-400"></i>
                        </div>
                        <div>
                            <p class="text-white text-sm font-semibold">Proses Cepat</p>
                            <p class="text-gray-400 text-xs">Same day deal</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Scroll indicator -->
    <div class="absolute bottom-8 left-1/2 -translate-x-1/2 flex flex-col items-center gap-2 text-blue-200">
        <span class="text-xs uppercase tracking-widest">Scroll</span>
        <div class="w-px h-8 bg-gradient-to-b from-gold-500 to-transparent"></div>
    </div>
</section>

{{-- ===== BRAND STRIP ===== --}}
<section class="bg-gray-100 border-y border-gray-200 py-6">
    <div class="max-w-7xl mx-auto px-4">
        <div class="flex flex-wrap items-center justify-center gap-8 md:gap-16 text-gray-400">
            @foreach(['Toyota','Honda','Mitsubishi','BMW','Mercedes','Suzuki','Daihatsu','Audi'] as $brand)
            <a href="{{ route('cars.index', ['brand' => $brand]) }}"
               class="text-sm font-bold uppercase tracking-widest hover:text-blue-600 transition-colors relative group">
                {{ $brand }}
                <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-blue-600 group-hover:w-full transition-all duration-300"></span>
            </a>
            @endforeach
        </div>
    </div>
</section>

{{-- ===== ABOUT SECTION ===== --}}
<section class="py-24 bg-white" id="about">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-2 gap-16 items-center">
            <!-- Left Images -->
            <div class="relative">
                <div class="grid grid-cols-2 gap-4">
                    <img src="https://images.unsplash.com/photo-1492144534655-ae79c964c9d7?w=400&auto=format&fit=crop&q=80"
                         alt="Showroom" class="rounded-2xl w-full h-48 object-cover">
                    <img src="https://images.unsplash.com/photo-1503376780353-7e6692767b70?w=400&auto=format&fit=crop&q=80"
                         alt="Cars" class="rounded-2xl w-full h-48 object-cover mt-8">
                    <img src="https://images.unsplash.com/photo-1549317661-bd32c8ce0db2?w=400&auto=format&fit=crop&q=80"
                         alt="Premium" class="rounded-2xl w-full h-48 object-cover">
                    <img src="https://images.unsplash.com/photo-1606664515524-ed2f786a0bd6?w=400&auto=format&fit=crop&q=80"
                         alt="Service" class="rounded-2xl w-full h-48 object-cover mt-8">
                </div>
                <!-- Badge overlay -->
                <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-20 h-20 rounded-full flex flex-col items-center justify-center shadow-2xl" style="background:linear-gradient(135deg,#1d4ed8,#3b82f6)">
                    <span class="text-white font-black text-lg">10+</span>
                    <span class="text-blue-100 text-xs font-bold">Tahun</span>
                </div>
            </div>

            <!-- Right Text -->
            <div>
                <div class="inline-flex items-center gap-2 text-blue-600 text-sm font-semibold uppercase tracking-widest mb-4">
                    <span class="w-8 h-0.5 bg-blue-600"></span> Tentang Kami
                </div>
                <h2 class="text-4xl md:text-5xl font-black text-gray-900 leading-tight mb-6">
                    Showroom Mobil Bekas<br>
                    <span class="text-blue-600">Terpercaya</span> di Jakarta
                </h2>
                <p class="text-gray-500 leading-relaxed mb-6">
                    Urban Wheels Indonesia hadir sebagai solusi jual beli mobil bekas berkualitas dengan sistem <strong class="text-gray-900">cash, kredit, dan tukar tambah</strong>. Kami berkomitmen memberikan unit terbaik yang telah melalui inspeksi ketat.
                </p>
                <p class="text-gray-500 leading-relaxed mb-10">
                    Setiap unit yang kami jual <strong class="text-gray-900">bebas banjir dan bebas tabrak</strong>, dilengkapi garansi hingga 2 tahun dan free detailing selama 2 tahun.
                </p>

                <!-- Highlights -->
                <div class="grid grid-cols-2 gap-4 mb-10">
                    @foreach([
                        ['fas fa-shield-alt','text-green-600','bg-green-50','Garansi 2 Tahun','Unit bergaransi resmi'],
                        ['fas fa-bolt','text-blue-600','bg-blue-50','Proses Cepat','Same day deal'],
                        ['fas fa-star','text-yellow-500','bg-yellow-50','Rating 4.9★','700+ ulasan'],
                        ['fas fa-tools','text-purple-600','bg-purple-50','Free Detailing','Selama 2 tahun'],
                    ] as [$icon,$color,$bg,$title,$desc])
                    <div class="flex items-start gap-3 p-4 rounded-xl bg-gray-50 border border-gray-100">
                        <div class="w-10 h-10 {{ $bg }} rounded-lg flex items-center justify-center flex-shrink-0">
                            <i class="{{ $icon }} {{ $color }}"></i>
                        </div>
                        <div>
                            <p class="text-gray-900 font-semibold text-sm">{{ $title }}</p>
                            <p class="text-gray-400 text-xs">{{ $desc }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>

                <a href="{{ route('cars.index') }}" class="btn-gold inline-flex items-center gap-2 px-8 py-4 rounded-full">
                    <i class="fas fa-car"></i> Lihat Katalog Mobil
                </a>
            </div>
        </div>
    </div>
</section>

{{-- ===== FEATURED CARS ===== --}}
<section class="py-24 bg-gray-50" id="katalog">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-14">
            <div class="inline-flex items-center gap-2 text-blue-600 text-sm font-semibold uppercase tracking-widest mb-4">
                <span class="w-8 h-0.5 bg-blue-600"></span> Pilihan Terbaik <span class="w-8 h-0.5 bg-blue-600"></span>
            </div>
            <h2 class="text-4xl md:text-5xl font-black text-gray-900 mb-4">Mobil <span class="text-blue-600">Unggulan</span></h2>
            <p class="text-gray-500 max-w-lg mx-auto">Temukan pilihan mobil berkualitas terbaik dengan harga terjangkau</p>
        </div>

        @if($featuredCars->isNotEmpty())
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($featuredCars as $car)
            <div class="card-hover bg-white rounded-2xl overflow-hidden border border-gray-200 shadow-sm group">
                <div class="relative overflow-hidden">
                    @if($car->image)
                    <img src="{{ asset('storage/'.$car->image) }}" alt="{{ $car->name }}"
                         class="w-full h-52 object-cover group-hover:scale-105 transition-transform duration-500">
                    @else
                    <div class="w-full h-52 bg-gradient-to-br from-gray-100 to-gray-200 flex items-center justify-center">
                        <i class="fas fa-car text-gray-300 text-5xl"></i>
                    </div>
                    @endif
                    <!-- Status badge -->
                    <div class="absolute top-3 left-3">
                        <span class="bg-green-500 text-white text-xs font-bold px-3 py-1 rounded-full">Tersedia</span>
                    </div>
                    <!-- Year badge -->
                    <div class="absolute top-3 right-3">
                        <span class="bg-black/60 text-white text-xs font-bold px-3 py-1 rounded-full">{{ $car->year }}</span>
                    </div>
                </div>
                <div class="p-5">
                    <p class="text-blue-600 text-xs font-semibold uppercase tracking-wider mb-1">{{ $car->brand }}</p>
                    <h3 class="text-gray-900 font-bold text-lg mb-3 line-clamp-1">{{ $car->name }}</h3>
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-xs text-gray-400 mb-1">Harga</p>
                            <p class="text-blue-600 font-black text-xl">{{ $car->formatted_price }}</p>
                        </div>
                        <a href="{{ route('cars.show', $car) }}"
                           class="btn-gold px-5 py-2.5 rounded-full text-sm flex items-center gap-2">
                            Detail <i class="fas fa-arrow-right text-xs"></i>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @else
        <div class="text-center py-16 text-gray-400">
            <i class="fas fa-car text-5xl mb-4 block text-gray-200"></i>
            <p>Belum ada mobil yang tersedia saat ini.</p>
        </div>
        @endif

        <div class="text-center mt-12">
            <a href="{{ route('cars.index') }}" class="btn-outline-gold inline-flex items-center gap-2 px-8 py-4 rounded-full">
                Lihat Semua Mobil <i class="fas fa-arrow-right"></i>
            </a>
        </div>
    </div>
</section>

{{-- ===== PROMO/HIGHLIGHT SECTION ===== --}}
<section class="py-20 relative overflow-hidden" style="background: linear-gradient(135deg, #1e3a8a 0%, #1d4ed8 50%, #1e3a8a 100%);">
    <div class="absolute inset-0 opacity-10">
        <div class="absolute inset-0" style="background-image: radial-gradient(circle at 2px 2px, #ffffff 1px, transparent 0); background-size: 50px 50px;"></div>
    </div>
    <div class="relative max-w-7xl mx-auto px-4 text-center">
        <div class="inline-flex items-center gap-2 text-blue-200 text-sm font-semibold uppercase tracking-widest mb-4">
            <span class="w-8 h-0.5 bg-blue-300"></span> Penawaran Spesial <span class="w-8 h-0.5 bg-blue-300"></span>
        </div>
        <h2 class="text-4xl md:text-5xl font-black text-white mb-4">
            Harga <span class="text-blue-200">Terbaik</span> di Kelasnya!
        </h2>
        <p class="text-blue-100 text-lg mb-10 max-w-2xl mx-auto">
            Dapatkan penawaran eksklusif dengan harga spesial untuk unit pilihan. Cicilan mulai dari Rp 3 juta/bulan!
        </p>
        <div class="flex flex-wrap justify-center gap-4">
            <a href="{{ route('cars.index') }}" class="bg-white text-blue-700 font-bold px-8 py-4 rounded-full text-base flex items-center gap-2 hover:bg-blue-50 transition-all">
                <i class="fas fa-tags"></i> Lihat Promo
            </a>
            <a href="https://wa.me/6281252211587?text=Halo%2C%20saya%20ingin%20tanya%20promo%20terbaru" target="_blank"
               class="border-2 border-white text-white font-bold px-8 py-4 rounded-full text-base flex items-center gap-2 hover:bg-white hover:text-blue-700 transition-all">
                <i class="fab fa-whatsapp"></i> Konsultasi Gratis
            </a>
        </div>

        <!-- Stats strip -->
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6 mt-16">
            @foreach([['500+','Unit Terjual'],['700+','Pelanggan Puas'],['4.9★','Rating Tertinggi'],['2 Thn','Garansi Unit']] as [$num,$label])
            <div class="glass-card rounded-2xl p-6">
                <div class="text-3xl font-black text-white mb-2">{{ $num }}</div>
                <div class="text-blue-200 text-sm">{{ $label }}</div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ===== SERVICES SECTION ===== --}}
<section class="py-24 bg-white" id="services">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-14">
            <div class="inline-flex items-center gap-2 text-blue-600 text-sm font-semibold uppercase tracking-widest mb-4">
                <span class="w-8 h-0.5 bg-blue-600"></span> Layanan Kami <span class="w-8 h-0.5 bg-blue-600"></span>
            </div>
            <h2 class="text-4xl md:text-5xl font-black text-gray-900 mb-4">Apa yang <span class="text-blue-600">Kami Tawarkan</span></h2>
            <p class="text-gray-500 max-w-lg mx-auto">Layanan lengkap untuk semua kebutuhan otomotif Anda</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach([
                ['fas fa-exchange-alt','Jual Beli Mobil','Proses mudah dan cepat. Cash, kredit, dan tukar tambah tersedia.','bg-blue-50','text-blue-600'],
                ['fas fa-credit-card','Kredit Mobil','Cicilan ringan mulai Rp 3 juta/bulan dengan proses approval cepat.','bg-green-50','text-green-600'],
                ['fas fa-sync-alt','Tukar Tambah','Tukar kendaraan lama Anda dengan unit baru pilihan kami.','bg-purple-50','text-purple-600'],
                ['fas fa-comments','Konsultasi Gratis','Tim ahli kami siap membantu Anda 24 jam tanpa biaya apapun.','bg-orange-50','text-orange-600'],
            ] as [$icon,$title,$desc,$bg,$color])
            <div class="card-hover bg-white rounded-2xl p-7 border border-gray-100 shadow-sm group text-center">
                <div class="w-16 h-16 {{ $bg }} rounded-2xl flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-transform duration-300">
                    <i class="{{ $icon }} {{ $color }} text-2xl"></i>
                </div>
                <h3 class="text-gray-900 font-bold text-lg mb-3">{{ $title }}</h3>
                <p class="text-gray-500 text-sm leading-relaxed">{{ $desc }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ===== REVIEWS SECTION ===== --}}
<section class="py-24 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-14">
            <div class="inline-flex items-center gap-2 text-blue-600 text-sm font-semibold uppercase tracking-widest mb-4">
                <span class="w-8 h-0.5 bg-blue-600"></span> Testimoni <span class="w-8 h-0.5 bg-blue-600"></span>
            </div>
            <h2 class="text-4xl md:text-5xl font-black text-gray-900 mb-4">Kata <span class="text-blue-600">Pelanggan</span> Kami</h2>
            <div class="flex items-center justify-center gap-2 mt-4">
                <div class="flex">@for($i=0;$i<5;$i++)<i class="fas fa-star text-yellow-400 text-xl"></i>@endfor</div>
                <span class="text-gray-900 font-black text-2xl ml-2">4.9</span>
                <span class="text-gray-400">dari 700+ ulasan</span>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @foreach([
                ['Ahmad Fauzi','Pelanggan Setia','Mobil berkualitas dan pelayanan bagus! Saya sudah beli 2 mobil di sini. Garansi benar-benar diberikan, kondisi unit sangat memuaskan. Recommended banget!'],
                ['Siti Rahayu','Customer Premium','Proses cepat dan terpercaya. Tim Urban Wheels Indonesia sangat profesional, tidak ada unsur paksaan, info harga transparan. Mobil langsung bisa dibawa pulang!'],
                ['Budi Santoso','Driver Ojol Premium','Showroom terbaik di Jakarta! Unit bebas banjir dan bebas tabrak, sudah diverifikasi. Harga sangat kompetitif. Akan balik lagi untuk beli mobil berikutnya.'],
            ] as [$name,$role,$text])
            <div class="card-hover bg-white rounded-2xl p-7 border border-gray-200 shadow-sm">
                <div class="flex mb-4">
                    @for($i=0;$i<5;$i++)<i class="fas fa-star text-yellow-400 text-sm"></i>@endfor
                </div>
                <p class="text-gray-500 text-sm leading-relaxed mb-6 italic">"{{ $text }}"</p>
                <div class="flex items-center gap-3">
                    <div class="w-11 h-11 rounded-full flex items-center justify-center text-white font-black text-lg" style="background:linear-gradient(135deg,#1d4ed8,#3b82f6)">
                        {{ substr($name, 0, 1) }}
                    </div>
                    <div>
                        <p class="text-gray-900 font-semibold text-sm">{{ $name }}</p>
                        <p class="text-gray-400 text-xs">{{ $role }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ===== GALLERY SECTION ===== --}}
<section class="py-24 bg-white" id="gallery">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-14">
            <div class="inline-flex items-center gap-2 text-blue-600 text-sm font-semibold uppercase tracking-widest mb-4">
                <span class="w-8 h-0.5 bg-blue-600"></span> Galeri <span class="w-8 h-0.5 bg-blue-600"></span>
            </div>
            <h2 class="text-4xl md:text-5xl font-black text-gray-900 mb-4">Koleksi <span class="text-blue-600">Showroom</span></h2>
            <p class="text-gray-500">Lihat langsung koleksi premium kami</p>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
            @php
            $galleryImages = [
                ['https://images.unsplash.com/photo-1555215695-3004980ad54e?w=400&auto=format&fit=crop&q=80','col-span-2 row-span-2'],
                ['https://images.unsplash.com/photo-1492144534655-ae79c964c9d7?w=400&auto=format&fit=crop&q=80',''],
                ['https://images.unsplash.com/photo-1503376780353-7e6692767b70?w=400&auto=format&fit=crop&q=80',''],
                ['https://images.unsplash.com/photo-1549317661-bd32c8ce0db2?w=400&auto=format&fit=crop&q=80',''],
                ['https://images.unsplash.com/photo-1606664515524-ed2f786a0bd6?w=400&auto=format&fit=crop&q=80',''],
                ['https://images.unsplash.com/photo-1583121274602-3e2820c69888?w=400&auto=format&fit=crop&q=80','col-span-2'],
            ];
            @endphp
            @foreach($galleryImages as [$src,$span])
            <div class="{{ $span }} overflow-hidden rounded-xl group cursor-pointer">
                <img src="{{ $src }}" alt="Gallery" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500" style="min-height:200px;">
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ===== CONTACT SECTION ===== --}}
<section class="py-24 bg-gray-50" id="contact">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-14">
            <div class="inline-flex items-center gap-2 text-blue-600 text-sm font-semibold uppercase tracking-widest mb-4">
                <span class="w-8 h-0.5 bg-blue-600"></span> Kontak <span class="w-8 h-0.5 bg-blue-600"></span>
            </div>
            <h2 class="text-4xl md:text-5xl font-black text-gray-900 mb-4">Hubungi <span class="text-blue-600">Kami</span></h2>
            <p class="text-gray-500">Kami siap melayani Anda 24 jam sehari, 7 hari seminggu</p>
        </div>

        <div class="grid lg:grid-cols-2 gap-12">
            <!-- Contact Info -->
            <div>
                <div class="space-y-6 mb-10">
                    @foreach([
                        ['fas fa-map-marker-alt','bg-blue-50','text-blue-600','Alamat','Jl. Lap. Tembak No.789, RT.5/RW.11, Cibubur, Ciracas, Jakarta Timur, Indonesia'],
                        ['fas fa-phone','bg-green-50','text-green-600','Telepon / WhatsApp','0812-5221-1587'],
                        ['fas fa-clock','bg-purple-50','text-purple-600','Jam Operasional','Buka 24 Jam — Setiap Hari'],
                    ] as [$icon,$bg,$color,$title,$value])
                    <div class="flex items-start gap-4 p-5 bg-white rounded-2xl border border-gray-200 shadow-sm">
                        <div class="w-12 h-12 {{ $bg }} rounded-xl flex items-center justify-center flex-shrink-0">
                            <i class="{{ $icon }} {{ $color }} text-lg"></i>
                        </div>
                        <div>
                            <p class="text-gray-400 text-xs uppercase tracking-wider mb-1">{{ $title }}</p>
                            <p class="text-gray-900 font-semibold">{{ $value }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>

                <!-- Action Buttons -->
                <div class="flex flex-col sm:flex-row gap-4">
                    <a href="https://wa.me/6281252211587?text=Halo%20Urban%20Wheels%20Indonesia%2C%20saya%20ingin%20bertanya." target="_blank"
                       class="flex-1 bg-green-500 hover:bg-green-600 text-white font-bold px-6 py-4 rounded-xl flex items-center justify-center gap-3 transition-all duration-300 hover:shadow-lg hover:shadow-green-500/25">
                        <i class="fab fa-whatsapp text-xl"></i> Chat WhatsApp
                    </a>
                    <a href="tel:+6281252211587"
                       class="flex-1 btn-outline-gold px-6 py-4 rounded-xl flex items-center justify-center gap-3">
                        <i class="fas fa-phone"></i> Telepon Sekarang
                    </a>
                </div>
            </div>

            <!-- Google Maps -->
            <div class="rounded-2xl overflow-hidden border border-gray-200 shadow-lg" style="height:400px;">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.1!2d106.88!3d-6.37!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zNsKwMjInMTIuMCJTIDEwNsKwNTInNDguMCJF!5e0!3m2!1sen!2sid!4v1!5m2!1sen!2sid"
                    width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>
        </div>
    </div>
</section>

@endsection
