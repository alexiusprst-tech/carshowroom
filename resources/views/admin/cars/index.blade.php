@extends('layouts.admin')

@section('title', 'Daftar Mobil')
@section('page-title', 'Daftar Mobil')
@section('page-subtitle', 'Kelola semua unit mobil')

@section('content')
<div class="flex items-center justify-between mb-6">
    <p class="text-gray-500 text-sm">Total: <span class="text-gray-900 font-semibold">{{ $cars->total() }}</span> unit</p>
    <a href="{{ route('admin.cars.create') }}" class="text-white font-bold px-5 py-2.5 rounded-xl text-sm flex items-center gap-2 transition-colors"
       style="background:linear-gradient(135deg,#1d4ed8,#3b82f6);">
        <i class="fas fa-plus"></i> Tambah Mobil
    </a>
</div>

<div class="bg-white rounded-2xl border border-gray-200 shadow-sm overflow-hidden">
    @if($cars->isNotEmpty())
    <div class="overflow-x-auto">
        <table class="w-full text-sm">
            <thead>
                <tr class="border-b border-gray-200">
                    <th class="text-left px-6 py-3 text-gray-400 text-xs uppercase tracking-wider">Mobil</th>
                    <th class="text-left px-6 py-3 text-gray-400 text-xs uppercase tracking-wider">Brand</th>
                    <th class="text-left px-6 py-3 text-gray-400 text-xs uppercase tracking-wider">Tahun</th>
                    <th class="text-left px-6 py-3 text-gray-400 text-xs uppercase tracking-wider">Harga</th>
                    <th class="text-left px-6 py-3 text-gray-400 text-xs uppercase tracking-wider">Status</th>
                    <th class="text-right px-6 py-3 text-gray-400 text-xs uppercase tracking-wider">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($cars as $car)
                <tr class="border-b border-gray-100 hover:bg-gray-50 transition-colors">
                    <td class="px-6 py-4">
                        <div class="flex items-center gap-3">
                            @if($car->image)
                            <img src="{{ asset('storage/'.$car->image) }}" alt="{{ $car->name }}"
                                 class="w-12 h-10 object-cover rounded-lg">
                            @else
                            <div class="w-12 h-10 bg-gray-100 rounded-lg flex items-center justify-center">
                                <i class="fas fa-car text-gray-300"></i>
                            </div>
                            @endif
                            <span class="text-gray-900 font-medium">{{ $car->name }}</span>
                        </div>
                    </td>
                    <td class="px-6 py-4 text-gray-600">{{ $car->brand }}</td>
                    <td class="px-6 py-4 text-gray-600">{{ $car->year }}</td>
                    <td class="px-6 py-4 text-blue-600 font-semibold">{{ $car->formatted_price }}</td>
                    <td class="px-6 py-4">
                        @if($car->status === 'available')
                        <span class="bg-green-50 text-green-600 border border-green-200 px-3 py-1 rounded-full text-xs font-semibold">Tersedia</span>
                        @else
                        <span class="bg-red-50 text-red-600 border border-red-200 px-3 py-1 rounded-full text-xs font-semibold">Terjual</span>
                        @endif
                    </td>
                    <td class="px-6 py-4 text-right">
                        <div class="flex items-center justify-end gap-2">
                            <a href="{{ route('cars.show', $car) }}" target="_blank"
                               class="w-8 h-8 bg-blue-50 hover:bg-blue-100 text-blue-600 rounded-lg flex items-center justify-center transition-colors" title="Preview">
                                <i class="fas fa-eye text-xs"></i>
                            </a>
                            <a href="{{ route('admin.cars.edit', $car) }}"
                               class="w-8 h-8 bg-yellow-50 hover:bg-yellow-100 text-yellow-600 rounded-lg flex items-center justify-center transition-colors" title="Edit">
                                <i class="fas fa-edit text-xs"></i>
                            </a>
                            <form action="{{ route('admin.cars.destroy', $car) }}" method="POST" class="inline delete-form">
                                @csrf @method('DELETE')
                                <button type="button" onclick="handleDelete(this)"
                                        data-title="Hapus Mobil"
                                        data-message="Yakin ingin menghapus &quot;{{ $car->name }}&quot;? Data tidak bisa dikembalikan."
                                        class="w-8 h-8 bg-red-50 hover:bg-red-100 text-red-500 rounded-lg flex items-center justify-center transition-colors" title="Hapus">
                                    <i class="fas fa-trash text-xs"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- Pagination -->
    <div class="px-6 py-4 border-t border-gray-200">
        {{ $cars->links() }}
    </div>
    @else
    <div class="flex flex-col items-center justify-center py-20 text-gray-400">
        <i class="fas fa-car text-4xl mb-3 text-gray-300"></i>
        <p class="mb-4">Belum ada mobil</p>
        <a href="{{ route('admin.cars.create') }}" class="text-blue-600 hover:underline text-sm">Tambah mobil pertama →</a>
    </div>
    @endif
</div>
@endsection

@section('head')
<style>
    .pagination { display:flex; gap:6px; }
    .pagination span, .pagination a { display:inline-flex; align-items:center; justify-content:center; min-width:32px; height:32px; padding:0 8px; border-radius:6px; font-size:13px; }
    .pagination a { background:#f9fafb; color:#374151; border:1px solid #e5e7eb; }
    .pagination a:hover { background:#2563eb; color:#fff; }
    .pagination span[aria-current="page"] { background:#2563eb; color:#fff; }
</style>
@endsection

@section('scripts')
<script>
    function handleDelete(btn) {
        const form  = btn.closest('form');
        const title = btn.dataset.title   || 'Konfirmasi Hapus';
        const msg   = btn.dataset.message || 'Apakah Anda yakin?';
        customConfirm(title, msg).then(ok => { if (ok) form.submit(); });
    }
</script>
@endsection
