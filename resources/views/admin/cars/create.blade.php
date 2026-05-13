@extends('layouts.admin')

@section('title', 'Tambah Mobil')
@section('page-title', 'Tambah Mobil Baru')
@section('page-subtitle', 'Upload unit mobil baru ke katalog')

@section('content')
<div class="max-w-2xl">
    <form action="{{ route('admin.cars.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="bg-white rounded-2xl border border-gray-200 shadow-sm p-7 space-y-5">

            <!-- Name -->
            <div>
                <label class="block text-gray-600 text-xs uppercase tracking-wider mb-2">Nama Mobil *</label>
                <input type="text" name="name" value="{{ old('name') }}"
                       placeholder="Contoh: Toyota Alphard 2.5 G A/T"
                       class="w-full bg-white border border-gray-300 text-gray-900 placeholder-gray-400 rounded-xl px-4 py-3 text-sm focus:outline-none focus:border-blue-500 transition-colors @error('name') border-red-500 @enderror">
                @error('name')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
            </div>

            <!-- Brand + Year -->
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-gray-600 text-xs uppercase tracking-wider mb-2">Brand / Merek *</label>
                    <select name="brand"
                            class="w-full bg-white border border-gray-300 text-gray-900 rounded-xl px-4 py-3 text-sm focus:outline-none focus:border-blue-500 transition-colors @error('brand') border-red-500 @enderror">
                        <option value="">-- Pilih Brand --</option>
                        @foreach(['Audi','BMW','Chevrolet','Daihatsu','Honda','Hyundai','Kia','Mazda','Mercedes-Benz','Mitsubishi','Nissan','Subaru','Suzuki','Toyota','Volkswagen','Wuling'] as $b)
                        <option value="{{ $b }}" {{ old('brand') == $b ? 'selected' : '' }}>{{ $b }}</option>
                        @endforeach
                    </select>
                    @error('brand')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label class="block text-gray-600 text-xs uppercase tracking-wider mb-2">Tahun *</label>
                    <input type="number" name="year" value="{{ old('year', date('Y')) }}"
                           min="1980" max="{{ date('Y') + 1 }}"
                           class="w-full bg-white border border-gray-300 text-gray-900 placeholder-gray-400 rounded-xl px-4 py-3 text-sm focus:outline-none focus:border-blue-500 transition-colors @error('year') border-red-500 @enderror">
                    @error('year')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                </div>
            </div>

            <!-- Price + Status -->
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-gray-600 text-xs uppercase tracking-wider mb-2">Harga (Rp) *</label>
                    <input type="number" name="price" value="{{ old('price') }}"
                           placeholder="250000000"
                           min="0" step="1000000"
                           class="w-full bg-white border border-gray-300 text-gray-900 placeholder-gray-400 rounded-xl px-4 py-3 text-sm focus:outline-none focus:border-blue-500 transition-colors @error('price') border-red-500 @enderror">
                    @error('price')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label class="block text-gray-600 text-xs uppercase tracking-wider mb-2">Status *</label>
                    <select name="status"
                            class="w-full bg-white border border-gray-300 text-gray-900 rounded-xl px-4 py-3 text-sm focus:outline-none focus:border-blue-500 transition-colors appearance-none @error('status') border-red-500 @enderror">
                        <option value="available" {{ old('status','available') == 'available' ? 'selected' : '' }}>✅ Tersedia</option>
                        <option value="sold"      {{ old('status') == 'sold' ? 'selected' : '' }}>🔴 Terjual</option>
                    </select>
                    @error('status')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                </div>
            </div>

            <!-- Description -->
            <div>
                <label class="block text-gray-600 text-xs uppercase tracking-wider mb-2">Deskripsi</label>
                <textarea name="description" rows="4"
                          placeholder="Deskripsi lengkap kondisi, fitur, dan keunggulan mobil..."
                          class="w-full bg-white border border-gray-300 text-gray-900 placeholder-gray-400 rounded-xl px-4 py-3 text-sm focus:outline-none focus:border-blue-500 transition-colors resize-none @error('description') border-red-500 @enderror">{{ old('description') }}</textarea>
                @error('description')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
            </div>

            <!-- Image Upload -->
            <div>
                <label class="block text-gray-600 text-xs uppercase tracking-wider mb-2">Foto Mobil</label>
                <div class="border-2 border-dashed border-gray-300 rounded-xl p-6 text-center hover:border-blue-400 transition-colors cursor-pointer" onclick="document.getElementById('imageInput').click()">
                    <div id="previewContainer" class="hidden mb-4">
                        <img id="imagePreview" src="#" alt="Preview" class="max-h-40 mx-auto rounded-lg">
                    </div>
                    <div id="uploadPlaceholder">
                        <i class="fas fa-cloud-upload-alt text-gray-400 text-3xl mb-3 block"></i>
                        <p class="text-gray-600 text-sm">Klik untuk upload foto</p>
                        <p class="text-gray-400 text-xs mt-1">PNG, JPG, WEBP — Max 2MB</p>
                    </div>
                    <input type="file" name="image" id="imageInput" accept="image/*" class="hidden">
                </div>
                @error('image')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
            </div>

        </div>

        <!-- Actions -->
        <div class="flex gap-3 mt-6">
            <button type="submit" class="flex-1 text-white font-bold py-3.5 rounded-xl flex items-center justify-center gap-2 transition-all"
                    style="background:linear-gradient(135deg,#1d4ed8,#3b82f6);">
                <i class="fas fa-save"></i> Simpan Mobil
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
            document.getElementById('uploadPlaceholder').classList.add('hidden');
        };
        reader.readAsDataURL(file);
    });
</script>
@endsection
@endsection
