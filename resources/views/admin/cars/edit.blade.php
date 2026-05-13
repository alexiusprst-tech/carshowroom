@extends('layouts.admin')

@section('title', 'Edit Mobil')
@section('page-title', 'Edit Mobil')
@section('page-subtitle', $car->name)

@section('content')
<div class="max-w-2xl">
    <form action="{{ route('admin.cars.update', $car) }}" method="POST" enctype="multipart/form-data">
        @csrf @method('PUT')

        <div class="bg-white rounded-2xl border border-gray-200 shadow-sm p-7 space-y-5">

            <div>
                <label class="block text-gray-600 text-xs uppercase tracking-wider mb-2">Nama Mobil *</label>
                <input type="text" name="name" value="{{ old('name', $car->name) }}"
                       class="w-full bg-white border border-gray-300 text-gray-900 rounded-xl px-4 py-3 text-sm focus:outline-none focus:border-blue-500 transition-colors @error('name') border-red-500 @enderror">
                @error('name')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-gray-600 text-xs uppercase tracking-wider mb-2">Brand *</label>
                    <select name="brand"
                            class="w-full bg-white border border-gray-300 text-gray-900 rounded-xl px-4 py-3 text-sm focus:outline-none focus:border-blue-500 transition-colors @error('brand') border-red-500 @enderror">
                        <option value="">-- Pilih Brand --</option>
                        @foreach(['Audi','BMW','Chevrolet','Daihatsu','Honda','Hyundai','Kia','Mazda','Mercedes-Benz','Mitsubishi','Nissan','Subaru','Suzuki','Toyota','Volkswagen','Wuling'] as $b)
                        <option value="{{ $b }}" {{ old('brand', $car->brand) == $b ? 'selected' : '' }}>{{ $b }}</option>
                        @endforeach
                    </select>
                    @error('brand')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label class="block text-gray-600 text-xs uppercase tracking-wider mb-2">Tahun *</label>
                    <input type="number" name="year" value="{{ old('year', $car->year) }}"
                           min="1980" max="{{ date('Y') + 1 }}"
                           class="w-full bg-white border border-gray-300 text-gray-900 rounded-xl px-4 py-3 text-sm focus:outline-none focus:border-blue-500 transition-colors @error('year') border-red-500 @enderror">
                    @error('year')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                </div>
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-gray-600 text-xs uppercase tracking-wider mb-2">Harga (Rp) *</label>
                    <input type="number" name="price" value="{{ old('price', $car->price) }}"
                           min="0" step="1000000"
                           class="w-full bg-white border border-gray-300 text-gray-900 rounded-xl px-4 py-3 text-sm focus:outline-none focus:border-blue-500 transition-colors @error('price') border-red-500 @enderror">
                    @error('price')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label class="block text-gray-600 text-xs uppercase tracking-wider mb-2">Status *</label>
                    <select name="status"
                            class="w-full bg-white border border-gray-300 text-gray-900 rounded-xl px-4 py-3 text-sm focus:outline-none focus:border-blue-500 transition-colors appearance-none @error('status') border-red-500 @enderror">
                        <option value="available" {{ old('status', $car->status) === 'available' ? 'selected' : '' }}>✅ Tersedia</option>
                        <option value="sold"      {{ old('status', $car->status) === 'sold'      ? 'selected' : '' }}>🔴 Terjual</option>
                    </select>
                    @error('status')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                </div>
            </div>

            <div>
                <label class="block text-gray-600 text-xs uppercase tracking-wider mb-2">Deskripsi</label>
                <textarea name="description" rows="4"
                          class="w-full bg-white border border-gray-300 text-gray-900 rounded-xl px-4 py-3 text-sm focus:outline-none focus:border-blue-500 transition-colors resize-none @error('description') border-red-500 @enderror">{{ old('description', $car->description) }}</textarea>
                @error('description')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
            </div>

            <!-- Current Image + New Upload -->
            <div>
                <label class="block text-gray-600 text-xs uppercase tracking-wider mb-2">Foto Mobil</label>
                @if($car->image)
                <div class="mb-3 p-3 bg-gray-50 border border-gray-200 rounded-xl inline-block">
                    <img src="{{ asset('storage/'.$car->image) }}" alt="{{ $car->name }}"
                         class="h-32 w-auto rounded-lg" id="currentImg">
                    <p class="text-gray-400 text-xs mt-2">Foto saat ini</p>
                </div>
                @endif
                <div class="border-2 border-dashed border-gray-300 rounded-xl p-5 text-center hover:border-blue-400 transition-colors cursor-pointer" onclick="document.getElementById('imageInput').click()">
                    <div id="previewContainer" class="hidden mb-3">
                        <img id="imagePreview" src="#" alt="Preview" class="max-h-32 mx-auto rounded-lg">
                    </div>
                    <i class="fas fa-cloud-upload-alt text-gray-400 text-2xl mb-2 block"></i>
                    <p class="text-gray-600 text-sm">Klik untuk ganti foto</p>
                    <p class="text-gray-400 text-xs mt-1">PNG, JPG, WEBP — Max 2MB</p>
                    <input type="file" name="image" id="imageInput" accept="image/*" class="hidden">
                </div>
                @error('image')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
            </div>

        </div>

        <div class="flex gap-3 mt-6">
            <button type="submit" class="flex-1 text-white font-bold py-3.5 rounded-xl flex items-center justify-center gap-2"
                    style="background:linear-gradient(135deg,#1d4ed8,#3b82f6);">
                <i class="fas fa-save"></i> Simpan Perubahan
            </button>
            <a href="{{ route('admin.cars.index') }}"
               class="px-6 py-3.5 rounded-xl bg-gray-100 text-gray-600 font-semibold hover:bg-gray-200 transition-colors text-center">
                Batal
            </a>
        </div>
    </form>
</div>

@section('scripts')
<script>
    document.getElementById('imageInput').addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (!file) return;
        const reader = new FileReader();
        reader.onload = (e) => {
            document.getElementById('imagePreview').src = e.target.result;
            document.getElementById('previewContainer').classList.remove('hidden');
            const ci = document.getElementById('currentImg');
            if (ci) ci.src = e.target.result;
        };
        reader.readAsDataURL(file);
    });
</script>
@endsection
@endsection
