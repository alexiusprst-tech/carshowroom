<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Admin') — Urban Wheels Indonesia Admin</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        brand: { 500:'#3b82f6', 600:'#2563eb', 700:'#1d4ed8', 900:'#1e3a8a' }
                    }
                }
            }
        }
    </script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <style>
        body { font-family:'Inter',sans-serif; }
        .gold-gradient { background:linear-gradient(135deg,#1d4ed8 0%,#3b82f6 50%,#1e3a8a 100%); }
        .text-gold { color:#2563eb; }
        .bg-gold  { background-color:#2563eb; }
        .sidebar-link { transition:all .2s ease; border-left:3px solid transparent; }
        .sidebar-link:hover, .sidebar-link.active { background:rgba(37,99,235,.08); border-left-color:#2563eb; color:#2563eb; }
        ::-webkit-scrollbar { width:4px; }
        ::-webkit-scrollbar-track { background:#f1f5f9; }
        ::-webkit-scrollbar-thumb { background:#2563eb; border-radius:2px; }
    </style>
</head>
<body class="bg-gray-50 text-gray-800">
    <div class="flex h-screen overflow-hidden">

        <!-- Sidebar -->
        <aside class="w-80 bg-white border-r border-gray-200 flex-shrink-0 flex flex-col shadow-sm" id="sidebar">
            <!-- Brand -->
            <div class="flex items-center space-x-4 px-7 py-6 border-b border-gray-200">
                <div class="w-11 h-11 gold-gradient rounded-lg flex items-center justify-center">
                    <i class="fas fa-car text-white text-base"></i>
                </div>
                <div>
                    <span class="text-xl font-black text-gray-900">URBAN <span class="text-gold">WHEELS</span></span>
                    <p class="text-xs text-gray-400 tracking-widest">ADMIN PANEL</p>
                </div>
            </div>

            <!-- Nav -->
            <nav class="flex-1 px-4 py-6 space-y-1 overflow-y-auto">
                <p class="text-xs text-gray-400 uppercase tracking-widest px-4 mb-3">Main Menu</p>

                <a href="{{ route('admin.dashboard') }}"
                   class="sidebar-link flex items-center gap-4 px-4 py-3 rounded-lg text-base font-medium text-gray-600 {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                    <i class="fas fa-chart-line w-5 text-base"></i> Dashboard
                </a>

                <p class="text-xs text-gray-400 uppercase tracking-widest px-4 mt-5 mb-3">Manajemen</p>

                <a href="{{ route('admin.cars.index') }}"
                   class="sidebar-link flex items-center gap-4 px-4 py-3 rounded-lg text-base font-medium text-gray-600 {{ request()->routeIs('admin.cars*') ? 'active' : '' }}">
                    <i class="fas fa-car w-5 text-base"></i> Daftar Mobil
                </a>

                <a href="{{ route('admin.cars.create') }}"
                   class="sidebar-link flex items-center gap-4 px-4 py-3 rounded-lg text-base font-medium text-gray-600 {{ request()->routeIs('admin.cars.create') ? 'active' : '' }}">
                    <i class="fas fa-plus-circle w-5 text-base"></i> Tambah Mobil
                </a>

                <a href="{{ route('admin.inquiries.index') }}"
                   class="sidebar-link flex items-center gap-4 px-4 py-3 rounded-lg text-base font-medium text-gray-600 {{ request()->routeIs('admin.inquiries*') ? 'active' : '' }}">
                    <i class="fas fa-envelope w-5 text-base"></i> Inquiries
                </a>

                <a href="{{ route('admin.users.index') }}"
                   class="sidebar-link flex items-center gap-4 px-4 py-3 rounded-lg text-base font-medium text-gray-600 {{ request()->routeIs('admin.users*') ? 'active' : '' }}">
                    <i class="fas fa-user-shield w-5 text-base"></i> Kelola Admin
                </a>

                <p class="text-xs text-gray-400 uppercase tracking-widest px-4 mt-5 mb-3">Akun</p>

                <a href="{{ url('/') }}" target="_blank"
                   class="sidebar-link flex items-center gap-4 px-4 py-3 rounded-lg text-base font-medium text-gray-600">
                    <i class="fas fa-external-link-alt w-5 text-base"></i> Lihat Website
                </a>

                <form method="POST" action="{{ route('admin.logout') }}">
                    @csrf
                    <button type="submit"
                       class="sidebar-link w-full text-left flex items-center gap-4 px-4 py-3 rounded-lg text-base font-medium text-gray-600 hover:text-red-500">
                        <i class="fas fa-sign-out-alt w-5 text-base"></i> Logout
                    </button>
                </form>
            </nav>

            <!-- User Info -->
            <div class="px-5 py-5 border-t border-gray-200">
                <div class="flex items-center gap-4">
                    <div class="w-10 h-10 gold-gradient rounded-full flex items-center justify-center text-white text-sm font-bold flex-shrink-0">
                        {{ substr(auth()->user()->name ?? 'A', 0, 1) }}
                    </div>
                    <div class="min-w-0">
                        <p class="text-base font-semibold text-gray-900 truncate">{{ auth()->user()->name ?? 'Admin' }}</p>
                        <p class="text-sm text-gray-400 truncate">{{ auth()->user()->email ?? '' }}</p>
                    </div>
                </div>
            </div>
        </aside>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col overflow-hidden">
            <!-- Top Bar -->
            <header class="bg-white border-b border-gray-200 px-6 py-4 flex items-center justify-between flex-shrink-0 shadow-sm">
                <div class="flex items-center gap-4">
                    <button id="sidebarToggle" class="lg:hidden text-gray-400 hover:text-blue-600">
                        <i class="fas fa-bars"></i>
                    </button>
                    <div>
                        <h1 class="text-lg font-bold text-gray-900">@yield('page-title', 'Dashboard')</h1>
                        <p class="text-xs text-gray-400">@yield('page-subtitle', 'Urban Wheels Indonesia Admin Panel')</p>
                    </div>
                </div>
                <div class="flex items-center gap-3">
                    <span class="text-xs text-gray-400 hidden md:block">{{ now()->format('d M Y') }}</span>
                    <div class="w-px h-5 bg-gray-200"></div>
                    <div class="flex items-center gap-2">
                        <div class="w-7 h-7 gold-gradient rounded-full flex items-center justify-center text-white text-xs font-bold">
                            {{ substr(auth()->user()->name ?? 'A', 0, 1) }}
                        </div>
                        <span class="text-sm text-gray-700 hidden md:block">{{ auth()->user()->name ?? 'Admin' }}</span>
                    </div>
                </div>
            </header>

            <!-- Flash Messages -->
            @if(session('success'))
            <div class="mx-6 mt-4 p-4 bg-green-50 border border-green-200 rounded-lg flex items-center gap-3 text-green-700 text-sm" id="flashMsg">
                <i class="fas fa-check-circle text-green-500"></i>
                <span>{{ session('success') }}</span>
                <button onclick="document.getElementById('flashMsg').remove()" class="ml-auto text-green-400 hover:text-green-600">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            @endif

            @if(session('error'))
            <div class="mx-6 mt-4 p-4 bg-red-50 border border-red-200 rounded-lg flex items-center gap-3 text-red-700 text-sm">
                <i class="fas fa-exclamation-circle text-red-500"></i>
                <span>{{ session('error') }}</span>
            </div>
            @endif

            <!-- Page Content -->
            <main class="flex-1 overflow-y-auto p-6">
                @yield('content')
            </main>
        </div>
    </div>

    <script>
        // Mobile sidebar toggle
        const sidebarToggle = document.getElementById('sidebarToggle');
        const sidebar = document.getElementById('sidebar');
        if (sidebarToggle) {
            sidebarToggle.addEventListener('click', () => {
                sidebar.classList.toggle('-translate-x-full');
                sidebar.classList.toggle('absolute');
                sidebar.classList.toggle('z-50');
                sidebar.classList.toggle('h-full');
            });
        }
    </script>

    <!-- Custom Confirm Modal -->
    <div id="confirmModal" class="fixed inset-0 z-[9999] flex items-center justify-center hidden">
        <!-- Backdrop -->
        <div id="confirmBackdrop" class="absolute inset-0 bg-black/40 backdrop-blur-sm"></div>
        <!-- Modal Card -->
        <div class="relative bg-white rounded-2xl shadow-2xl w-full max-w-sm mx-4 p-6 animate-none" id="confirmCard">
            <div class="flex items-center gap-4 mb-4">
                <div class="w-12 h-12 rounded-full bg-red-50 flex items-center justify-center flex-shrink-0">
                    <i class="fas fa-trash text-red-500 text-lg"></i>
                </div>
                <div>
                    <h3 class="font-bold text-gray-900 text-base" id="confirmTitle">Konfirmasi Hapus</h3>
                    <p class="text-gray-500 text-sm mt-0.5" id="confirmMessage">Apakah Anda yakin ingin menghapus ini?</p>
                </div>
            </div>
            <p class="text-xs text-gray-400 bg-gray-50 rounded-lg px-3 py-2 mb-5">
                <i class="fas fa-exclamation-triangle text-yellow-400 mr-1"></i>
                Tindakan ini tidak dapat dibatalkan.
            </p>
            <div class="flex gap-3">
                <button id="confirmCancel"
                        class="flex-1 px-4 py-2.5 rounded-xl bg-gray-100 hover:bg-gray-200 text-gray-600 text-sm font-semibold transition-colors">
                    Batal
                </button>
                <button id="confirmOk"
                        class="flex-1 px-4 py-2.5 rounded-xl bg-red-500 hover:bg-red-600 text-white text-sm font-semibold transition-colors">
                    Ya, Hapus
                </button>
            </div>
        </div>
    </div>

    <script>
        // Custom confirm modal
        let _confirmResolve = null;

        function customConfirm(title, message) {
            return new Promise((resolve) => {
                _confirmResolve = resolve;
                document.getElementById('confirmTitle').textContent   = title   || 'Konfirmasi Hapus';
                document.getElementById('confirmMessage').textContent = message || 'Apakah Anda yakin?';
                document.getElementById('confirmModal').classList.remove('hidden');
            });
        }

        document.getElementById('confirmOk').addEventListener('click', () => {
            document.getElementById('confirmModal').classList.add('hidden');
            if (_confirmResolve) _confirmResolve(true);
        });

        document.getElementById('confirmCancel').addEventListener('click', () => {
            document.getElementById('confirmModal').classList.add('hidden');
            if (_confirmResolve) _confirmResolve(false);
        });

        document.getElementById('confirmBackdrop').addEventListener('click', () => {
            document.getElementById('confirmModal').classList.add('hidden');
            if (_confirmResolve) _confirmResolve(false);
        });
    </script>

    @yield('scripts')
</body>
</html>
