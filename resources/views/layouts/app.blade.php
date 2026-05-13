<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="Urban Wheels Indonesia - Jual beli mobil bekas berkualitas dengan garansi. Temukan mobil impian Anda!">
    <title>@yield('title', 'Urban Wheels Indonesia - Mobil Impian Anda')</title>

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        gold: { 300:'#fcd97c', 400:'#f5c842', 500:'#d4a017', 600:'#b8860b', 700:'#966d09' }
                    },
                    fontFamily: { sans: ['Helvetica','Arial','sans-serif'] }
                }
            }
        }
    </script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <style>
        body { font-family: Helvetica, Arial, sans-serif; }
        html { scroll-behavior: smooth; }
        .gold-gradient { background: linear-gradient(135deg,#1d4ed8 0%,#3b82f6 50%,#1e3a8a 100%); }
        .text-gold { color:#2563eb; }
        .bg-gold  { background-color:#2563eb; }
        .border-gold { border-color:#2563eb; }
        .btn-gold { background:linear-gradient(135deg,#1d4ed8 0%,#3b82f6 100%); color:#fff; font-weight:700; transition:all .3s ease; }
        .btn-gold:hover { background:linear-gradient(135deg,#1e3a8a 0%,#1d4ed8 100%); box-shadow:0 8px 25px rgba(37,99,235,.35); transform:translateY(-2px); }
        .btn-outline-gold { border:2px solid #2563eb; color:#2563eb; font-weight:700; transition:all .3s ease; }
        .btn-outline-gold:hover { background:#2563eb; color:#fff; box-shadow:0 8px 25px rgba(37,99,235,.35); transform:translateY(-2px); }
        .nav-link { position:relative; }
        .nav-link::after { content:''; position:absolute; bottom:-4px; left:0; width:0; height:2px; background:#2563eb; transition:width .3s ease; }
        .nav-link:hover::after, .nav-link.active::after { width:100%; }
        .card-hover { transition:transform .3s ease, box-shadow .3s ease; }
        .card-hover:hover { transform:translateY(-8px); box-shadow:0 20px 60px rgba(37,99,235,.15); }
        .section-divider { background:linear-gradient(90deg,transparent,#2563eb,transparent); height:1px; }
        .glass-card { background:rgba(37,99,235,.06); backdrop-filter:blur(10px); border:1px solid rgba(37,99,235,.2); }
        ::-webkit-scrollbar { width:6px; }
        ::-webkit-scrollbar-track { background:#f1f5f9; }
        ::-webkit-scrollbar-thumb { background:#2563eb; border-radius:3px; }
    </style>
    @yield('head')
</head>
<body class="bg-white text-gray-900">

    <!-- Navbar -->
    <nav class="fixed top-0 left-0 right-0 z-50 bg-white/95 backdrop-blur-sm border-b border-gray-200 shadow-sm transition-shadow duration-300" id="navbar">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-20">
                <a href="{{ url('/') }}" class="flex items-center space-x-3">
                    <div class="w-10 h-10 gold-gradient rounded-lg flex items-center justify-center">
                        <i class="fas fa-car text-white text-lg"></i>
                    </div>
                    <div>
                        <span class="text-xl font-black text-gray-900 tracking-wide">URBAN <span class="text-gold">WHEELS</span></span>
                        <p class="text-xs text-gray-400 font-medium tracking-widest">INDONESIA</p>
                    </div>
                </a>

                <div class="hidden lg:flex items-center space-x-8">
                    <a href="{{ url('/') }}" class="nav-link text-gray-600 hover:text-gray-900 text-[25px] font-medium tracking-wide {{ request()->is('/') ? 'active text-gray-900' : '' }}">Beranda</a>
                    <a href="{{ url('/#about') }}" class="nav-link text-gray-600 hover:text-gray-900 text-[25px] font-medium tracking-wide">Tentang</a>
                    <a href="{{ url('/#katalog') }}" class="nav-link text-gray-600 hover:text-gray-900 text-[25px] font-medium tracking-wide">Katalog</a>
                    <a href="{{ url('/#services') }}" class="nav-link text-gray-600 hover:text-gray-900 text-[25px] font-medium tracking-wide">Layanan</a>
                    <a href="{{ url('/#gallery') }}" class="nav-link text-gray-600 hover:text-gray-900 text-[25px] font-medium tracking-wide">Galeri</a>
                    <a href="{{ url('/#contact') }}" class="nav-link text-gray-600 hover:text-gray-900 text-[25px] font-medium tracking-wide">Kontak</a>
                </div>

                <div class="flex items-center space-x-4">
                    @auth
                        @if(auth()->user()->is_admin)
                        <a href="{{ route('admin.dashboard') }}"
                           class="hidden md:flex items-center space-x-2 bg-gray-900 hover:bg-gray-700 text-white px-7 py-2.5 rounded-full text-sm font-semibold transition-all duration-200">
                            <i class="fas fa-tachometer-alt text-xs"></i><span>Admin</span>
                        </a>
                        @endif
                    @else
                    <a href="{{ route('admin.login') }}"
                       class="hidden md:flex items-center space-x-2 bg-gray-100 hover:bg-gray-200 text-gray-600 hover:text-gray-900 px-4 py-2.5 rounded-full text-sm font-medium transition-all duration-200">
                        <i class="fas fa-lock text-xs"></i><span>Admin</span>
                    </a>
                    @endauth
                    <button class="lg:hidden text-gray-600 hover:text-blue-600" id="mobileMenuBtn">
                        <i class="fas fa-bars text-xl" id="menuIcon"></i>
                    </button>
                </div>
            </div>
        </div>
        <div class="lg:hidden hidden bg-white border-t border-gray-200" id="mobileMenu">
            <div class="px-4 py-4 space-y-3">
                <a href="{{ url('/') }}" class="block text-gray-700 hover:text-blue-600 py-2 text-sm font-medium">Beranda</a>
                <a href="{{ url('/#about') }}" class="block text-gray-700 hover:text-blue-600 py-2 text-sm font-medium">Tentang</a>
                <a href="{{ url('/#katalog') }}" class="block text-gray-700 hover:text-blue-600 py-2 text-sm font-medium">Katalog Mobil</a>
                <a href="{{ url('/#services') }}" class="block text-gray-700 hover:text-blue-600 py-2 text-sm font-medium">Layanan</a>
                <a href="{{ url('/#gallery') }}" class="block text-gray-700 hover:text-blue-600 py-2 text-sm font-medium">Galeri</a>
                <a href="{{ url('/#contact') }}" class="block text-gray-700 hover:text-blue-600 py-2 text-sm font-medium">Kontak</a>
                @auth
                    @if(auth()->user()->is_admin)
                    <a href="{{ route('admin.dashboard') }}"
                       class="flex items-center justify-center space-x-2 bg-gray-900 text-white px-5 py-2.5 rounded-full text-sm font-semibold">
                        <i class="fas fa-tachometer-alt"></i><span>Admin</span>
                    </a>
                    @endif
                @else
                <a href="{{ route('admin.login') }}"
                   class="flex items-center justify-center space-x-2 bg-gray-100 text-gray-600 px-5 py-2.5 rounded-full text-sm font-medium">
                    <i class="fas fa-lock"></i><span>Login Admin</span>
                </a>
                @endauth
            </div>
        </div>
    </nav>

    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-gray-900 border-t border-gray-800 pt-16 pb-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-10 mb-12">
                <div>
                    <div class="flex items-center space-x-3 mb-5">
                        <div class="w-10 h-10 gold-gradient rounded-lg flex items-center justify-center">
                            <i class="fas fa-car text-black text-lg"></i>
                        </div>
                        <div>
                            <span class="text-xl font-black text-white">MOB<span class="text-gold">CARS</span></span>
                            <p class="text-xs text-gray-500 tracking-widest">INDONESIA</p>
                        </div>
                    </div>
                    <p class="text-gray-400 text-sm leading-relaxed mb-5">Showroom mobil bekas terpercaya dengan jaminan kualitas dan garansi hingga 2 tahun.</p>
                    <div class="flex space-x-3">
                        @foreach([['fab fa-facebook-f','#'],['fab fa-instagram','#'],['fab fa-tiktok','#'],['fab fa-whatsapp','https://wa.me/6281252211587']] as [$icon,$link])
                        <a href="{{ $link }}" target="_blank" class="w-9 h-9 rounded-full bg-gray-800 hover:bg-blue-600 flex items-center justify-center text-gray-400 hover:text-white transition-all duration-300">
                            <i class="{{ $icon }} text-sm"></i>
                        </a>
                        @endforeach
                    </div>
                </div>
                <div>
                    <h4 class="text-white font-bold text-sm uppercase tracking-wider mb-5 flex items-center gap-2"><span class="w-6 h-0.5 bg-gold"></span> Quick Links</h4>
                    <ul class="space-y-3 text-sm">
                        @foreach([['Beranda',url('/')],['Katalog Mobil',route('cars.index')],['Tentang Kami',url('/#about')],['Layanan',url('/#services')],['Kontak',url('/#contact')]] as [$label,$href])
                        <li><a href="{{ $href }}" class="text-gray-400 hover:text-gold transition-colors flex items-center gap-2"><i class="fas fa-chevron-right text-gold text-xs"></i> {{ $label }}</a></li>
                        @endforeach
                    </ul>
                </div>
                <div>
                    <h4 class="text-white font-bold text-sm uppercase tracking-wider mb-5 flex items-center gap-2"><span class="w-6 h-0.5 bg-gold"></span> Layanan</h4>
                    <ul class="space-y-3 text-sm">
                        @foreach(['Jual Beli Mobil','Kredit Mobil','Tukar Tambah','Konsultasi Gratis','Free Detailing 2 Tahun'] as $svc)
                        <li class="text-gray-400 flex items-center gap-2"><i class="fas fa-check text-gold text-xs"></i> {{ $svc }}</li>
                        @endforeach
                    </ul>
                </div>
                <div>
                    <h4 class="text-white font-bold text-sm uppercase tracking-wider mb-5 flex items-center gap-2"><span class="w-6 h-0.5 bg-gold"></span> Kontak</h4>
                    <ul class="space-y-4 text-sm">
                        <li class="flex items-start gap-3 text-gray-400"><i class="fas fa-map-marker-alt text-gold mt-1"></i><span>Jl. Lap. Tembak No.789, RT.5/RW.11, Cibubur, Ciracas, Jakarta Timur</span></li>
                        <li class="flex items-center gap-3 text-gray-400"><i class="fas fa-phone text-gold"></i><a href="tel:+6281252211587" class="hover:text-gold">0812-5221-1587</a></li>
                        <li class="flex items-center gap-3 text-gray-400"><i class="fas fa-clock text-gold"></i><span>Buka 24 Jam — Setiap Hari</span></li>
                    </ul>
                </div>
            </div>
            <div class="section-divider mb-6"></div>
            <div class="flex flex-col md:flex-row items-center justify-between gap-4 text-sm text-gray-500">
                <p>&copy; {{ date('Y') }} <span class="text-blue-400 font-semibold">Urban Wheels Indonesia</span>. All rights reserved.</p>
                <div class="flex items-center gap-2"><span class="text-yellow-400">★★★★★</span><span>4.9/5 (700+ ulasan)</span></div>
            </div>
        </div>
    </footer>

    <!-- WhatsApp Float -->
    <a href="https://wa.me/6281252211587?text=Halo%20Urban%20Wheels%20Indonesia%2C%20saya%20ingin%20bertanya%20tentang%20mobil%20yang%20tersedia." target="_blank"
       class="fixed bottom-6 right-6 z-50 w-14 h-14 bg-green-500 hover:bg-green-600 rounded-full flex items-center justify-center shadow-2xl transition-all duration-300 hover:scale-110">
        <i class="fab fa-whatsapp text-white text-2xl"></i>
    </a>

    <!-- Back to Top -->
    <button id="backToTop" class="fixed bottom-6 left-6 z-50 w-12 h-12 btn-gold text-white rounded-full hidden items-center justify-center shadow-2xl"
            onclick="window.scrollTo({top:0,behavior:'smooth'})">
        <i class="fas fa-chevron-up"></i>
    </button>

    <script>
        const mobileMenuBtn = document.getElementById('mobileMenuBtn');
        const mobileMenu    = document.getElementById('mobileMenu');
        const menuIcon      = document.getElementById('menuIcon');
        mobileMenuBtn.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
            menuIcon.className = mobileMenu.classList.contains('hidden') ? 'fas fa-bars text-xl' : 'fas fa-times text-xl';
        });
        const navbar = document.getElementById('navbar');
        const btt    = document.getElementById('backToTop');
        window.addEventListener('scroll', () => {
            navbar.classList.toggle('shadow-2xl', window.scrollY > 50);
            if (window.scrollY > 400) { btt.classList.remove('hidden'); btt.classList.add('flex'); }
            else { btt.classList.add('hidden'); btt.classList.remove('flex'); }
        });

        // ===== SCROLLSPY =====
        (function () {
            // Ordered TOP → BOTTOM on the page so the last passed section wins
            const sections = [
                { id: 'about',    href: '/#about'    },
                { id: 'katalog',  href: '/#katalog'  },
                { id: 'services', href: '/#services' },
                { id: 'gallery',  href: '/#gallery'  },
                { id: 'contact',  href: '/#contact'  },
            ];

            // Only run on homepage
            const isHome = (window.location.pathname === '/' || window.location.pathname === '');
            if (!isHome) return;

            const navLinks = document.querySelectorAll('nav .nav-link');

            function clearActive() {
                navLinks.forEach(el => el.classList.remove('active', 'text-gray-900'));
            }

            function setActive(href) {
                clearActive();
                navLinks.forEach(el => {
                    if (el.getAttribute('href') && el.getAttribute('href').endsWith(href)) {
                        el.classList.add('active', 'text-gray-900');
                    }
                });
            }

            function onScroll() {
                const scrollY = window.scrollY + 100; // offset for fixed navbar

                // Default: Beranda active when at top
                let current = '/';

                for (const sec of sections) {
                    const el = document.getElementById(sec.id);
                    if (el && scrollY >= el.offsetTop) {
                        current = sec.href;
                    }
                }

                if (current === '/') {
                    clearActive();
                    navLinks.forEach(el => {
                        if (el.getAttribute('href') === '/' || el.getAttribute('href') === window.location.origin + '/') {
                            el.classList.add('active', 'text-gray-900');
                        }
                    });
                } else {
                    setActive(current);
                }
            }

            window.addEventListener('scroll', onScroll, { passive: true });
            onScroll(); // run once on load
        })();
    </script>
    @yield('scripts')
</body>
</html>
