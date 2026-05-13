<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login — Urban Wheels Indonesia</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        body { font-family: 'Inter', 'Segoe UI', sans-serif; }
        .admin-bg {
            background: linear-gradient(135deg, #1e3a8a 0%, #1d4ed8 50%, #2563eb 100%);
            min-height: 100vh;
        }
        .card-shadow { box-shadow: 0 25px 50px rgba(0,0,0,0.15); }
        .btn-login {
            background: linear-gradient(135deg, #1d4ed8, #3b82f6);
            transition: all 0.2s;
        }
        .btn-login:hover {
            background: linear-gradient(135deg, #1e40af, #2563eb);
            transform: translateY(-1px);
            box-shadow: 0 8px 20px rgba(37,99,235,0.4);
        }
        input:focus { outline: none; }
    </style>
</head>
<body>
    <div class="admin-bg flex items-center justify-center px-4 py-12">

        {{-- Background decoration --}}
        <div class="absolute inset-0 overflow-hidden pointer-events-none">
            <div class="absolute -top-40 -right-40 w-80 h-80 rounded-full opacity-10" style="background:radial-gradient(circle,#60a5fa,transparent)"></div>
            <div class="absolute -bottom-40 -left-40 w-96 h-96 rounded-full opacity-10" style="background:radial-gradient(circle,#93c5fd,transparent)"></div>
        </div>

        <div class="w-full max-w-md relative z-10">

            {{-- Logo / Header --}}
            <div class="text-center mb-8">
                <div class="inline-flex items-center justify-center w-16 h-16 rounded-2xl mb-4" style="background:rgba(255,255,255,0.15)">
                    <i class="fas fa-car text-white text-2xl"></i>
                </div>
                <h1 class="text-3xl font-black text-white tracking-tight">Urban Wheels</h1>
                <p class="text-blue-200 text-sm mt-1">Admin Panel</p>
            </div>

            {{-- Card --}}
            <div class="bg-white rounded-2xl p-8 card-shadow">

                <h2 class="text-xl font-bold text-gray-900 mb-1">Selamat Datang</h2>
                <p class="text-gray-500 text-sm mb-6">Masuk ke panel administrasi</p>

                {{-- Session Error --}}
                @if(session('error'))
                <div class="bg-red-50 border border-red-200 text-red-600 rounded-xl px-4 py-3 text-sm mb-5 flex items-center gap-2">
                    <i class="fas fa-exclamation-circle"></i>
                    {{ session('error') }}
                </div>
                @endif

                <form method="POST" action="{{ route('admin.login.post') }}">
                    @csrf

                    {{-- Email --}}
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-600 mb-1.5">
                            Email Admin
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-envelope text-gray-400 text-sm"></i>
                            </div>
                            <input
                                type="email"
                                name="email"
                                value="{{ old('email') }}"
                                placeholder="admin@example.com"
                                autocomplete="email"
                                autofocus
                                class="w-full pl-10 pr-4 py-2.5 border rounded-xl text-gray-900 text-sm placeholder-gray-400
                                       @error('email') border-red-400 bg-red-50 @else border-gray-300 bg-white @enderror
                                       focus:border-blue-500 focus:ring-2 focus:ring-blue-100 transition-colors"
                            >
                        </div>
                        @error('email')
                        <p class="text-red-500 text-xs mt-1.5 flex items-center gap-1">
                            <i class="fas fa-exclamation-circle"></i> {{ $message }}
                        </p>
                        @enderror
                    </div>

                    {{-- Password --}}
                    <div class="mb-5">
                        <label class="block text-sm font-medium text-gray-600 mb-1.5">
                            Password
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-lock text-gray-400 text-sm"></i>
                            </div>
                            <input
                                type="password"
                                name="password"
                                id="password"
                                placeholder="••••••••"
                                autocomplete="current-password"
                                class="w-full pl-10 pr-10 py-2.5 border rounded-xl text-gray-900 text-sm placeholder-gray-400
                                       @error('password') border-red-400 bg-red-50 @else border-gray-300 bg-white @enderror
                                       focus:border-blue-500 focus:ring-2 focus:ring-blue-100 transition-colors"
                            >
                            <button type="button" onclick="togglePassword()"
                                    class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-400 hover:text-gray-600 transition-colors">
                                <i class="fas fa-eye text-sm" id="eyeIcon"></i>
                            </button>
                        </div>
                        @error('password')
                        <p class="text-red-500 text-xs mt-1.5 flex items-center gap-1">
                            <i class="fas fa-exclamation-circle"></i> {{ $message }}
                        </p>
                        @enderror
                    </div>

                    {{-- Remember Me --}}
                    <div class="flex items-center mb-6">
                        <input type="checkbox" name="remember" id="remember"
                               class="w-4 h-4 rounded border-gray-300 text-blue-600 accent-blue-600 cursor-pointer">
                        <label for="remember" class="ml-2 text-sm text-gray-600 cursor-pointer">Ingat saya</label>
                    </div>

                    {{-- Submit --}}
                    <button type="submit"
                            class="btn-login w-full py-3 rounded-xl text-white font-semibold text-sm flex items-center justify-center gap-2">
                        <i class="fas fa-sign-in-alt"></i>
                        Masuk ke Panel Admin
                    </button>
                </form>

            </div>

            {{-- Back to site --}}
            <div class="text-center mt-5">
                <a href="{{ route('home') }}" class="text-blue-200 hover:text-white text-sm transition-colors">
                    <i class="fas fa-arrow-left mr-1"></i> Kembali ke Website
                </a>
            </div>

        </div>
    </div>

    <script>
        function togglePassword() {
            const input = document.getElementById('password');
            const icon  = document.getElementById('eyeIcon');
            if (input.type === 'password') {
                input.type = 'text';
                icon.classList.replace('fa-eye', 'fa-eye-slash');
            } else {
                input.type = 'password';
                icon.classList.replace('fa-eye-slash', 'fa-eye');
            }
        }
    </script>
</body>
</html>
