@extends('layouts.admin')

@section('title', 'Kelola Admin')
@section('page-title', 'Kelola Admin')
@section('page-subtitle', 'Daftar akun admin Urban Wheels Indonesia')

@section('content')

@if(session('success'))
<div class="mb-6 bg-green-50 border border-green-200 text-green-700 rounded-xl px-5 py-3 flex items-center gap-3">
    <i class="fas fa-check-circle"></i> {{ session('success') }}
</div>
@endif

@if(session('error'))
<div class="mb-6 bg-red-50 border border-red-200 text-red-700 rounded-xl px-5 py-3 flex items-center gap-3">
    <i class="fas fa-exclamation-circle"></i> {{ session('error') }}
</div>
@endif

<div class="bg-white rounded-2xl border border-gray-200 shadow-sm overflow-hidden">
    <div class="flex items-center justify-between px-6 py-4 border-b border-gray-200">
        <h3 class="text-gray-900 font-bold text-lg">Daftar Akun Admin</h3>
        <a href="{{ route('admin.users.create') }}"
           class="inline-flex items-center gap-2 bg-blue-600 hover:bg-blue-700 text-white text-sm font-semibold px-4 py-2 rounded-xl transition-colors">
            <i class="fas fa-plus"></i> Tambah Admin
        </a>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full text-sm">
            <thead>
                <tr class="border-b border-gray-200">
                    <th class="text-left px-6 py-3 text-gray-400 text-xs uppercase tracking-wider">Nama</th>
                    <th class="text-left px-6 py-3 text-gray-400 text-xs uppercase tracking-wider">Email</th>
                    <th class="text-left px-6 py-3 text-gray-400 text-xs uppercase tracking-wider">Dibuat</th>
                    <th class="text-left px-6 py-3 text-gray-400 text-xs uppercase tracking-wider">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($admins as $admin)
                <tr class="border-b border-gray-100 hover:bg-gray-50 transition-colors">
                    <td class="px-6 py-4">
                        <div class="flex items-center gap-3">
                            <div class="w-9 h-9 rounded-full flex items-center justify-center text-white text-sm font-bold flex-shrink-0"
                                 style="background:linear-gradient(135deg,#1d4ed8,#3b82f6)">
                                {{ strtoupper(substr($admin->name, 0, 1)) }}
                            </div>
                            <div>
                                <p class="text-gray-900 font-medium">{{ $admin->name }}</p>
                                @if($admin->id === auth()->id())
                                <span class="text-xs text-blue-600 font-medium">Anda</span>
                                @endif
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4 text-gray-500">{{ $admin->email }}</td>
                    <td class="px-6 py-4 text-gray-500">{{ $admin->created_at->format('d M Y') }}</td>
                    <td class="px-6 py-4">
                        @if($admin->id !== auth()->id())
                        <form method="POST" action="{{ route('admin.users.destroy', $admin) }}"
                              onsubmit="return confirm('Hapus akun {{ addslashes($admin->name) }}?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                    class="inline-flex items-center gap-1 text-red-500 hover:text-red-700 text-sm font-medium transition-colors">
                                <i class="fas fa-trash-alt"></i> Hapus
                            </button>
                        </form>
                        @else
                        <span class="text-gray-300 text-sm">—</span>
                        @endif
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="px-6 py-10 text-center text-gray-400">Belum ada akun admin.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection
