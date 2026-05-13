@extends('layouts.admin')

@section('title', 'Daftar Inquiry')
@section('page-title', 'Inquiry Masuk')
@section('page-subtitle', 'Pesan dari calon pembeli')

@section('content')
<div class="flex items-center justify-between mb-6">
    <p class="text-gray-500 text-sm">Total: <span class="text-gray-900 font-semibold">{{ $inquiries->total() }}</span> inquiry</p>
</div>

<div class="bg-white rounded-2xl border border-gray-200 shadow-sm overflow-hidden">
    @if($inquiries->isNotEmpty())
    <div class="overflow-x-auto">
        <table class="w-full text-sm">
            <thead>
                <tr class="border-b border-gray-200">
                    <th class="text-left px-6 py-3 text-gray-400 text-xs uppercase tracking-wider">#</th>
                    <th class="text-left px-6 py-3 text-gray-400 text-xs uppercase tracking-wider">Nama</th>
                    <th class="text-left px-6 py-3 text-gray-400 text-xs uppercase tracking-wider">Email</th>
                    <th class="text-left px-6 py-3 text-gray-400 text-xs uppercase tracking-wider">Mobil</th>
                    <th class="text-left px-6 py-3 text-gray-400 text-xs uppercase tracking-wider">Pesan</th>
                    <th class="text-left px-6 py-3 text-gray-400 text-xs uppercase tracking-wider">Tanggal</th>
                    <th class="text-right px-6 py-3 text-gray-400 text-xs uppercase tracking-wider">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($inquiries as $inquiry)
                <tr class="border-b border-gray-100 hover:bg-gray-50 transition-colors">
                    <td class="px-6 py-4 text-gray-300">{{ $inquiry->id }}</td>
                    <td class="px-6 py-4">
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 rounded-full flex items-center justify-center text-white text-xs font-black flex-shrink-0" style="background:linear-gradient(135deg,#1d4ed8,#3b82f6)">
                                {{ substr($inquiry->name, 0, 1) }}
                            </div>
                            <span class="text-gray-900 font-medium">{{ $inquiry->name }}</span>
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        <a href="mailto:{{ $inquiry->email }}" class="text-blue-600 hover:text-blue-700 transition-colors">{{ $inquiry->email }}</a>
                    </td>
                    <td class="px-6 py-4">
                        @if($inquiry->car)
                        <a href="{{ route('cars.show', $inquiry->car) }}" target="_blank"
                           class="bg-blue-50 text-blue-600 border border-blue-200 px-2 py-1 rounded-lg text-xs hover:bg-blue-100 transition-colors">
                            {{ $inquiry->car->name }}
                        </a>
                        @else
                        <span class="text-gray-300 text-xs">Mobil dihapus</span>
                        @endif
                    </td>
                    <td class="px-6 py-4">
                        <div class="text-gray-500 text-sm max-w-xs" title="{{ $inquiry->message }}">
                            {{ Str::limit($inquiry->message, 60) }}
                        </div>
                    </td>
                    <td class="px-6 py-4 text-gray-400 text-xs whitespace-nowrap">
                        {{ $inquiry->created_at->format('d M Y') }}<br>
                        <span class="text-gray-300">{{ $inquiry->created_at->format('H:i') }}</span>
                    </td>
                    <td class="px-6 py-4 text-right">
                        <div class="flex items-center justify-end gap-2">
                            <a href="https://wa.me/{{ preg_replace('/\D/', '', $inquiry->email) }}" target="_blank"
                               class="w-8 h-8 bg-green-50 hover:bg-green-100 text-green-600 rounded-lg flex items-center justify-center transition-colors" title="Balas via WA">
                                <i class="fab fa-whatsapp text-xs"></i>
                            </a>
                            <form action="{{ route('admin.inquiries.destroy', $inquiry) }}" method="POST" class="inline">
                                @csrf @method('DELETE')
                                <button type="button" onclick="handleDelete(this)"
                                        data-title="Hapus Inquiry"
                                        data-message="Yakin ingin menghapus inquiry dari &quot;{{ $inquiry->name }}&quot;?"
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
    <div class="px-6 py-4 border-t border-gray-200">
        {{ $inquiries->links() }}
    </div>
    @else
    <div class="flex flex-col items-center justify-center py-20 text-gray-400">
        <i class="fas fa-inbox text-4xl mb-3 text-gray-300"></i>
        <p>Belum ada inquiry masuk</p>
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
