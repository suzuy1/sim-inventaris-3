@extends('dashboard')

@section('content')
<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <!-- Header Section -->
    <div class="mb-8">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between">
            <div class="mb-4 md:mb-0">
                <div class="flex items-center gap-3 mb-2">
                    <a href="{{ route('inventaris.index') }}" class="inline-flex items-center text-gray-500 hover:text-gray-700 transition-colors duration-200">
                        <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                        </svg>
                        Kembali ke Daftar
                    </a>
                </div>
                <h1 class="text-3xl font-bold text-gray-900 mb-2">Tambah Inventaris Baru</h1>
                <p class="text-gray-600">Tambahkan barang baru ke dalam sistem inventaris kampus</p>
            </div>
            <div class="flex gap-3">
                <a href="{{ route('inventaris.index') }}" class="inline-flex items-center gap-2 rounded-lg bg-gray-600 px-4 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-gray-500 transition-colors duration-200">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                    Batal
                </a>
            </div>
        </div>
    </div>

    <!-- Error Message -->
    @if(session('error'))
    <div class="rounded-xl bg-red-50 border border-red-200 p-4 mb-6 animate-fade-in">
        <div class="flex items-center">
            <div class="flex-shrink-0">
                <svg class="h-5 w-5 text-red-400" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                </svg>
            </div>
            <div class="ml-3">
                <p class="text-sm font-medium text-red-800">{{ session('error') }}</p>
            </div>
        </div>
    </div>
    @endif

    <!-- Success Message -->
    @if(session('success'))
    <div class="rounded-xl bg-green-50 border border-green-200 p-4 mb-6 animate-fade-in">
        <div class="flex items-center">
            <div class="flex-shrink-0">
                <svg class="h-5 w-5 text-green-400" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                </svg>
            </div>
            <div class="ml-3">
                <p class="text-sm font-medium text-green-800">{{ session('success') }}</p>
            </div>
        </div>
    </div>
    @endif

    <!-- Form Section -->
    <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden">
        <div class="bg-gradient-to-r from-blue-50 to-indigo-50 px-6 py-4 border-b border-gray-200">
            <h2 class="text-lg font-semibold text-gray-900">Form Tambah Inventaris</h2>
            <p class="text-sm text-gray-600 mt-1">Isi informasi lengkap untuk menambahkan barang baru</p>
        </div>

        <div class="p-6">
            <form action="{{ route('inventaris.store') }}" method="POST" x-data="{ 
                kategori: '{{ old('kategori', 'tidak_habis_pakai') }}',
                totalStok: 0,
                calculateTotal() {
                    const baik = parseInt(document.getElementById('kondisi_baik')?.value) || 0;
                    const ringan = parseInt(document.getElementById('kondisi_rusak_ringan')?.value) || 0;
                    const berat = parseInt(document.getElementById('kondisi_rusak_berat')?.value) || 0;
                    this.totalStok = baik + ringan + berat;
                }
            }" x-init="calculateTotal()">
                @csrf

                <!-- Basic Information Section -->
                <div class="mb-8">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
                        <div class="bg-blue-100 text-blue-600 p-2 rounded-lg mr-3">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                        Informasi Dasar Barang
                    </h3>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Nama Barang -->
                        <div class="md:col-span-2">
                            <label for="nama_barang" class="block text-sm font-medium text-gray-700 mb-2">
                                Nama Barang <span class="text-red-500">*</span>
                            </label>
                            <div class="relative">
                                <input 
                                    type="text" 
                                    name="nama_barang" 
                                    id="nama_barang" 
                                    class="block w-full pl-4 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200 @error('nama_barang') border-red-300 @enderror" 
                                    value="{{ old('nama_barang') }}" 
                                    required
                                    placeholder="Contoh: Laptop Dell Latitude, Meja Kerja, dll."
                                >
                                @error('nama_barang')
                                    <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                        <svg class="h-5 w-5 text-red-500" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                        </svg>
                                    </div>
                                @enderror
                            </div>
                            @error('nama_barang')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Kategori -->
                        <div>
                            <label for="kategori" class="block text-sm font-medium text-gray-700 mb-2">
                                Kategori Inventaris <span class="text-red-500">*</span>
                            </label>
                            <select 
                                name="kategori" 
                                id="kategori" 
                                x-model="kategori"
                                class="block w-full pl-4 pr-10 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                                required
                            >
                                <option value="tidak_habis_pakai">Barang Tidak Habis Pakai</option>
                                <option value="habis_pakai">Barang Habis Pakai</option>
                                <option value="aset_tetap">Aset Tetap</option>
                            </select>
                            @error('kategori')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Initial Stock for Habis Pakai -->
                        <div x-show="kategori === 'habis_pakai'" x-transition>
                            <label for="initial_stok" class="block text-sm font-medium text-gray-700 mb-2">
                                Stok Awal <span class="text-red-500">*</span>
                                <span class="text-xs text-gray-500">(untuk barang habis pakai)</span>
                            </label>
                            <input 
                                type="number" 
                                name="initial_stok" 
                                id="initial_stok" 
                                class="block w-full pl-4 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200" 
                                value="{{ old('initial_stok', 0) }}" 
                                min="0"
                                placeholder="0"
                            >
                            @error('initial_stok')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Ownership & Funding Section -->
                <div class="mb-8">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
                        <div class="bg-green-100 text-green-600 p-2 rounded-lg mr-3">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 11c0 3.517-1.009 6.799-2.753 9.571m-3.44-2.04l.054-.09A13.916 13.916 0 008 11a4 4 0 118 0c0 1.017-.07 2.019-.203 3m-2.118 6.844A21.88 21.88 0 0015.171 17m3.839 1.132c.645-2.266.99-4.659.99-7.132A8 8 0 008 4.07M3 15.364c.64-1.319 1-2.8 1-4.364 0-1.457.39-2.823 1.07-4"/>
                            </svg>
                        </div>
                        Kepemilikan & Pembiayaan
                    </h3>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Pemilik -->
                        <div>
                            <label for="pemilik" class="block text-sm font-medium text-gray-700 mb-2">
                                Pemilik <span class="text-red-500">*</span>
                            </label>
                            <input 
                                type="text" 
                                name="pemilik" 
                                id="pemilik" 
                                class="block w-full pl-4 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200 @error('pemilik') border-red-300 @enderror" 
                                value="{{ old('pemilik') }}" 
                                required
                                placeholder="Contoh: feb, ftk, fkip"
                            >
                            @error('pemilik')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Sumber Dana -->
                        <div>
                            <label for="sumber_dana" class="block text-sm font-medium text-gray-700 mb-2">
                                Sumber Dana <span class="text-red-500">*</span>
                            </label>
                            <input 
                                type="text" 
                                name="sumber_dana" 
                                id="sumber_dana" 
                                class="block w-full pl-4 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200 @error('sumber_dana') border-red-300 @enderror" 
                                value="{{ old('sumber_dana') }}" 
                                required
                                placeholder="Contoh: pp-pts, dana-dikti, boptn"
                            >
                            @error('sumber_dana')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Tahun Beli -->
                        <div>
                            <label for="tahun_beli" class="block text-sm font-medium text-gray-700 mb-2">
                                Tanggal Pembelian <span class="text-red-500">*</span>
                            </label>
                            <input 
                                type="date" 
                                name="tahun_beli" 
                                id="tahun_beli" 
                                class="block w-full pl-4 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200 @error('tahun_beli') border-red-300 @enderror" 
                                value="{{ old('tahun_beli', date('Y-m-d')) }}" 
                                required
                            >
                            @error('tahun_beli')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Nomor Unit -->
                        <div>
                            <label for="nomor_unit" class="block text-sm font-medium text-gray-700 mb-2">
                                Nomor Unit <span class="text-red-500">*</span>
                            </label>
                            <input 
                                type="number" 
                                name="nomor_unit" 
                                id="nomor_unit" 
                                class="block w-full pl-4 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200 @error('nomor_unit') border-red-300 @enderror" 
                                value="{{ old('nomor_unit') }}" 
                                required 
                                min="1"
                                placeholder="Contoh: 1, 2, 3"
                            >
                            @error('nomor_unit')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Condition & Location Section -->
                <div class="mb-8">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
                        <div class="bg-purple-100 text-purple-600 p-2 rounded-lg mr-3">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                            </svg>
                        </div>
                        Kondisi & Lokasi
                        <span class="ml-auto text-sm font-normal text-gray-500">
                            Total: <span class="font-semibold" x-text="totalStok"></span> unit
                        </span>
                    </h3>
                    
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
                        <!-- Kondisi Baik -->
                        <div class="bg-green-50 border border-green-200 rounded-lg p-4">
                            <label for="kondisi_baik" class="block text-sm font-medium text-green-800 mb-2 flex items-center">
                                <span class="w-2 h-2 bg-green-500 rounded-full mr-2"></span>
                                Kondisi Baik
                            </label>
                            <input 
                                type="number" 
                                name="kondisi_baik" 
                                id="kondisi_baik" 
                                class="block w-full px-3 py-2 border border-green-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 transition duration-200 bg-white" 
                                value="{{ old('kondisi_baik', 0) }}" 
                                min="0"
                                x-on:input="calculateTotal()"
                                placeholder="0"
                            >
                        </div>

                        <!-- Rusak Ringan -->
                        <div class="bg-yellow-50 border border-yellow-200 rounded-lg p-4">
                            <label for="kondisi_rusak_ringan" class="block text-sm font-medium text-yellow-800 mb-2 flex items-center">
                                <span class="w-2 h-2 bg-yellow-500 rounded-full mr-2"></span>
                                Rusak Ringan
                            </label>
                            <input 
                                type="number" 
                                name="kondisi_rusak_ringan" 
                                id="kondisi_rusak_ringan" 
                                class="block w-full px-3 py-2 border border-yellow-300 rounded-lg focus:ring-2 focus:ring-yellow-500 focus:border-yellow-500 transition duration-200 bg-white" 
                                value="{{ old('kondisi_rusak_ringan', 0) }}" 
                                min="0"
                                x-on:input="calculateTotal()"
                                placeholder="0"
                            >
                        </div>

                        <!-- Rusak Berat -->
                        <div class="bg-red-50 border border-red-200 rounded-lg p-4">
                            <label for="kondisi_rusak_berat" class="block text-sm font-medium text-red-800 mb-2 flex items-center">
                                <span class="w-2 h-2 bg-red-500 rounded-full mr-2"></span>
                                Rusak Berat
                            </label>
                            <input 
                                type="number" 
                                name="kondisi_rusak_berat" 
                                id="kondisi_rusak_berat" 
                                class="block w-full px-3 py-2 border border-red-300 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 transition duration-200 bg-white" 
                                value="{{ old('kondisi_rusak_berat', 0) }}" 
                                min="0"
                                x-on:input="calculateTotal()"
                                placeholder="0"
                            >
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Unit -->
                        <div>
                            <label for="unit_id" class="block text-sm font-medium text-gray-700 mb-2">
                                Unit Kerja <span class="text-red-500">*</span>
                            </label>
                            <select 
                                name="unit_id" 
                                id="unit_id" 
                                class="block w-full pl-4 pr-10 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200 @error('unit_id') border-red-300 @enderror" 
                                required
                            >
                                <option value="">Pilih Unit Kerja</option>
                                @foreach($units as $unit)
                                    <option value="{{ $unit->id }}" {{ old('unit_id') == $unit->id ? 'selected' : '' }}>
                                        {{ $unit->nama_unit }}
                                    </option>
                                @endforeach
                            </select>
                            @error('unit_id')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Ruangan -->
                        <div>
                            <label for="room_id" class="block text-sm font-medium text-gray-700 mb-2">
                                Ruangan <span class="text-red-500">*</span>
                            </label>
                            <select 
                                name="room_id" 
                                id="room_id" 
                                class="block w-full pl-4 pr-10 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200 @error('room_id') border-red-300 @enderror" 
                                required
                            >
                                <option value="">Pilih Ruangan</option>
                                @foreach($rooms as $room)
                                    <option value="{{ $room->id }}" {{ old('room_id') == $room->id ? 'selected' : '' }}>
                                        {{ $room->nama_ruangan }}
                                    </option>
                                @endforeach
                            </select>
                            @error('room_id')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Lokasi -->
                        <div class="md:col-span-2">
                            <label for="lokasi" class="block text-sm font-medium text-gray-700 mb-2">Lokasi Spesifik (Opsional)</label>
                            <input 
                                type="text" 
                                name="lokasi" 
                                id="lokasi" 
                                class="block w-full pl-4 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200 @error('lokasi') border-red-300 @enderror" 
                                value="{{ old('lokasi') }}" 
                                placeholder="Contoh: Rak Buku No. 3, Lemari Arsip, dll."
                            >
                            @error('lokasi')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Additional Information -->
                <div class="mb-8">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
                        <div class="bg-gray-100 text-gray-600 p-2 rounded-lg mr-3">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"/>
                            </svg>
                        </div>
                        Informasi Tambahan
                    </h3>
                    
                    <div>
                        <label for="keterangan" class="block text-sm font-medium text-gray-700 mb-2">Keterangan (Opsional)</label>
                        <textarea 
                            name="keterangan" 
                            id="keterangan" 
                            rows="4" 
                            class="block w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200"
                            placeholder="Tambahkan catatan atau keterangan khusus tentang barang ini..."
                        >{{ old('keterangan') }}</textarea>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="flex flex-col-reverse md:flex-row gap-3 md:justify-end pt-6 border-t border-gray-200">
                    <a href="{{ route('inventaris.index') }}" class="inline-flex justify-center items-center gap-2 rounded-lg bg-gray-600 px-6 py-3 text-sm font-semibold text-white shadow-sm hover:bg-gray-500 transition-colors duration-200">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                        Batal
                    </a>
                    <button type="submit" class="inline-flex justify-center items-center gap-2 rounded-lg bg-gradient-to-r from-blue-600 to-purple-600 px-6 py-3 text-sm font-semibold text-white shadow-lg hover:shadow-xl transform hover:scale-105 transition-all duration-200">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                        </svg>
                        Tambah Inventaris
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<style>
.animate-fade-in {
    animation: fadeIn 0.5s ease-in-out;
}

@keyframes fadeIn {
    from { opacity: 0; transform: translateY(-10px); }
    to { opacity: 1; transform: translateY(0); }
}
</style>
@endsection