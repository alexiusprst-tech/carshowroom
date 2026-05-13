@extends('layouts.admin')

@section('title', 'Tambah Admin')
@section('page-title', 'Tambah Admin')
@section('page-subtitle', 'Buat akun admin baru')

@section('content')

<div class="max-w-xl">
    <div class="bg-white rounded-2xl border border-gray-200 shadow-sm overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-200">
            <h3 class="text-gray-900 font-bold text-lg">Form Tambah Admin</h3>
        </div>

        <form method="POST" action="{{ route('admin.users.store') }}" class="px-6 py-6 space-y-5">
            @csrf

            {{-- Name --}}
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap</label>
                <input type="text" name="name" value="{{ old('name') }}" required
                       class="w-full bg-gray-50 border {{ $errors->has('name') ? 'border-red-400' : 'border-gray-200' }} rounded-xl px-4 py-2.5 text-sm text-gray-900 focus:outline-none focus:border-blue-500 transition-colors"
                       placeholder="Contoh: Admin Urban Wheels">
                @error('name')
                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                @enderror
            </div>

            {{-- Email --}}
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                <input type="email" name="email" value="{{ old('email') }}" required
                       class="w-full bg-gray-50 border {{ $errors->has('email') ? 'border-red-400' : 'border-gray-200' }} rounded-xl px-4 py-2.5 text-sm text-gray-900 focus:outline-none focus:border-blue-500 transition-colors"
                       placeholder="admin@example.com">
                @error('email')
                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                @enderror
            </div>

            {{-- Password --}}
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                <input type="password" name="password" required
                       class="w-full bg-gray-50 border {{ $errors->has('password') ? 'border-red-400' : 'border-gray-200' }} rounded-xl px-4 py-2.5 text-sm text-gray-900 focus:outline-none focus:border-blue-500 transition-colors"
                       placeholder="Minimal 8 karakter">
                @error('password')
                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                @enderror
            </div>

            {{-- Password Confirmation --}}
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Konfirmasi Password</label>
                <input type="password" name="password_confirmation" required
                       class="w-full bg-gray-50 border border-gray-200 rounded-xl px-4 py-2.5 text-sm text-gray-900 focus:outline-none focus:border-blue-500 transition-colors"
                       placeholder="Ulangi password">
            </div>

            {{-- Actions --}}
            <div class="flex items-center gap-3 pt-2">
                <button type="submit"
                        class="bg-blue-600 hover:bg-blue-700 text-white text-sm font-semibold px-6 py-2.5 rounded-xl transition-colors">
                    <i class="fas fa-user-plus mr-1"></i> Buat Akun Admin
                </button>
                <a href="{{ route('admin.users.index') }}"
                   class="text-gray-500 hover:text-gray-700 text-sm font-medium transition-colors">
                    Batal
                </a>
            </div>
        </form>
    </div>
</div>

@endsection
