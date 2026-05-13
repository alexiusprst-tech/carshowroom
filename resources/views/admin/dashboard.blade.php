@extends('layouts.admin')

@section('title', 'Dashboard')
@section('page-title', 'Dashboard')
@section('page-subtitle', 'Overview Urban Wheels Indonesia')

@section('content')

<!-- Stats Cards -->
<div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-5 mb-8">
    @foreach([
        ['fas fa-car','Total Mobil',$totalCars,'bg-blue-50','text-blue-600','border-blue-200'],
        ['fas fa-check-circle','Tersedia',$availableCars,'bg-green-50','text-green-600','border-green-200'],
        ['fas fa-times-circle','Terjual',$soldCars,'bg-red-50','text-red-600','border-red-200'],
        ['fas fa-envelope','Total Inquiry',$totalInquiries,'bg-yellow-50','text-yellow-600','border-yellow-200'],
    ] as [$icon,$label,$value,$bg,$color,$border])
    <div class="bg-white rounded-2xl border {{ $border }} shadow-sm p-6 flex items-center gap-4">
        <div class="w-14 h-14 {{ $bg }} rounded-xl flex items-center justify-center flex-shrink-0">
            <i class="{{ $icon }} {{ $color }} text-xl"></i>
        </div>
        <div>
            <p class="text-gray-500 text-xs uppercase tracking-wider">{{ $label }}</p>
            <p class="text-3xl font-black text-gray-900 mt-1">{{ $value }}</p>
        </div>
    </div>
    @endforeach
</div>

<!-- Quick Actions -->
<div class="grid grid-cols-1 md:grid-cols-3 gap-5 mb-8">
    <a href="{{ route('admin.cars.create') }}"
       class="bg-white border border-gray-200 hover:border-blue-300 rounded-2xl p-5 flex items-center gap-4 transition-all duration-300 group shadow-sm">
        <div class="w-12 h-12 gold-gradient rounded-xl flex items-center justify-center">
            <i class="fas fa-plus text-white text-lg"></i>
        </div>
        <div>
            <p class="text-gray-900 font-bold group-hover:text-blue-600 transition-colors">Tambah Mobil Baru</p>
            <p class="text-gray-400 text-xs">Upload unit terbaru</p>
        </div>
        <i class="fas fa-arrow-right text-gray-400 group-hover:text-blue-600 ml-auto transition-colors"></i>
    </a>
    <a href="{{ route('admin.cars.index') }}"
       class="bg-white border border-gray-200 hover:border-blue-300 rounded-2xl p-5 flex items-center gap-4 transition-all duration-300 group shadow-sm">
        <div class="w-12 h-12 bg-blue-50 rounded-xl flex items-center justify-center">
            <i class="fas fa-list text-blue-600 text-lg"></i>
        </div>
        <div>
            <p class="text-gray-900 font-bold group-hover:text-blue-600 transition-colors">Kelola Mobil</p>
            <p class="text-gray-400 text-xs">Edit, hapus, & ubah status</p>
        </div>
        <i class="fas fa-arrow-right text-gray-400 group-hover:text-blue-600 ml-auto transition-colors"></i>
    </a>
    <a href="{{ route('admin.inquiries.index') }}"
       class="bg-white border border-gray-200 hover:border-blue-300 rounded-2xl p-5 flex items-center gap-4 transition-all duration-300 group shadow-sm">
        <div class="w-12 h-12 bg-purple-50 rounded-xl flex items-center justify-center">
            <i class="fas fa-inbox text-purple-600 text-lg"></i>
        </div>
        <div>
            <p class="text-gray-900 font-bold group-hover:text-blue-600 transition-colors">Lihat Inquiries</p>
            <p class="text-gray-400 text-xs">Pesan dari calon pembeli</p>
        </div>
        <i class="fas fa-arrow-right text-gray-400 group-hover:text-blue-600 ml-auto transition-colors"></i>
    </a>
</div>

<!-- Recent Inquiries Table -->
<div class="bg-white rounded-2xl border border-gray-200 shadow-sm overflow-hidden">
    <div class="flex items-center justify-between px-6 py-4 border-b border-gray-200">
        <h3 class="text-gray-900 font-bold text-lg">Inquiry Terbaru</h3>
        <a href="{{ route('admin.inquiries.index') }}" class="text-blue-600 text-sm hover:underline">Lihat Semua →</a>
    </div>

    @if($recentInquiries->isNotEmpty())
    <div class="overflow-x-auto">
        <table class="w-full text-sm">
            <thead>
                <tr class="border-b border-gray-200">
                    <th class="text-left px-6 py-3 text-gray-400 text-xs uppercase tracking-wider">Nama</th>
                    <th class="text-left px-6 py-3 text-gray-400 text-xs uppercase tracking-wider">Email</th>
                    <th class="text-left px-6 py-3 text-gray-400 text-xs uppercase tracking-wider">Mobil</th>
                    <th class="text-left px-6 py-3 text-gray-400 text-xs uppercase tracking-wider">Pesan</th>
                    <th class="text-left px-6 py-3 text-gray-400 text-xs uppercase tracking-wider">Tanggal</th>
                </tr>
            </thead>
            <tbody>
                @foreach($recentInquiries as $inquiry)
                <tr class="border-b border-gray-100 hover:bg-gray-50 transition-colors">
                    <td class="px-6 py-4">
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 rounded-full flex items-center justify-center text-white text-xs font-black" style="background:linear-gradient(135deg,#1d4ed8,#3b82f6)">
                                {{ substr($inquiry->name, 0, 1) }}
                            </div>
                            <span class="text-gray-900 font-medium">{{ $inquiry->name }}</span>
                        </div>
                    </td>
                    <td class="px-6 py-4 text-gray-500">{{ $inquiry->email }}</td>
                    <td class="px-6 py-4">
                        @if($inquiry->car)
                        <span class="bg-blue-50 text-blue-600 px-2 py-1 rounded-lg text-xs">{{ $inquiry->car->name }}</span>
                        @else
                        <span class="text-gray-300">—</span>
                        @endif
                    </td>
                    <td class="px-6 py-4 text-gray-500 max-w-48 truncate">{{ $inquiry->message }}</td>
                    <td class="px-6 py-4 text-gray-400 text-xs">{{ $inquiry->created_at->format('d M Y H:i') }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @else
    <div class="flex flex-col items-center justify-center py-16 text-gray-400">
        <i class="fas fa-inbox text-4xl mb-3 text-gray-300"></i>
        <p>Belum ada inquiry masuk</p>
    </div>
    @endif
</div>
@endsection
