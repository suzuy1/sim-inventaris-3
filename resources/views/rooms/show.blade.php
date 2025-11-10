@extends('dashboard')

@section('content')
    <div class="max-w-5xl mx-auto p-4 sm:p-6 lg:p-8">
        <!-- Header -->
        <div class="mb-8 flex flex-col sm:flex-row sm:items-center sm:justify-between">
            <h1 class="text-3xl font-extrabold text-gray-900 tracking-tight">
                <span class="inline-flex items-center">
                    <svg class="w-8 h-8 mr-3 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                    </svg>
                    {{ $room->nama_ruangan }}
                </span>
            </h1>
            <a href="{{ route('rooms.index') }}" class="mt-3 sm:mt-0 inline-flex items-center text-sm font-medium text-indigo-600 hover:text-indigo-800 transition">
                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                Kembali
            </a>
        </div>

        <!-- Card Utama -->
        <div class="bg-white rounded-2xl shadow-lg overflow-hidden border border-gray-100">
            <div class="bg-gradient-to-r from-indigo-500 to-purple-600 h-2"></div>
            
            <div class="p-6 sm:p-8">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Kolom Kiri -->
                    <div class="space-y-5">
                        <div>
                            <p class="text-sm font-semibold text-gray-500 uppercase tracking-wider">Nama Ruangan</p>
                            <p class="mt-1 text-xl font-bold text-gray-900">{{ $room->nama_ruangan }}</p>
                        </div>

                        <div>
                            <p class="text-sm font-semibold text-gray-500 uppercase tracking-wider">Lokasi</p>
                            <p class="mt-1 text-lg text-gray-800 flex items-center">
                                <svg class="w-5 h-5 mr-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                                {{ $room->lokasi ?? 'Tidak tersedia' }}
                            </p>
                        </div>

                        <div>
                            <p class="text-sm font-semibold text-gray-500 uppercase tracking-wider">Unit</p>
                            <p class="mt-1 inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-indigo-100 text-indigo-800">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2"></path>
                                </svg>
                                {{ $room->unit->nama_unit ?? 'Tidak terdaftar' }}
                            </p>
                        </div>
                    </div>

                    <!-- Kolom Kanan -->
                    <div class="space-y-5">
                        <div>
                            <p class="text-sm font-semibold text-gray-500 uppercase tracking-wider">Dibuat Pada</p>
                            <p class="mt-1 text-gray-800 flex items-center">
                                <svg class="w-5 h-5 mr-2 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                                {{ $room->created_at->format('d M Y, H:i') }}
                            </p>
                        </div>

                        <div>
                            <p class="text-sm font-semibold text-gray-500 uppercase tracking-wider">Terakhir Diperbarui</p>
                            <p class="mt-1 text-gray-800 flex items-center">
                                <svg class="w-5 h-5 mr-2 text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                {{ $room->updated_at->diffForHumans() }}
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="mt-8 pt-6 border-t border-gray-200 flex flex-col sm:flex-row gap-3 justify-end">
                    <a href="{{ route('rooms.edit', $room->id) }}"
                       class="inline-flex items-center justify-center px-5 py-2.5 border border-transparent text-sm font-medium rounded-lg text-white bg-gradient-to-r from-yellow-500 to-amber-600 hover:from-yellow-600 hover:to-amber-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500 transition transform hover:-translate-y-0.5 shadow-md">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                        </svg>
                        Edit Ruangan
                    </a>

                    <form action="{{ route('rooms.destroy', $room->id) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                                onclick="return confirm('Yakin hapus ruangan ini? Data akan hilang permanen.')"
                                class="inline-flex items-center justify-center px-5 py-2.5 border border-transparent text-sm font-medium rounded-lg text-white bg-gradient-to-r from-red-600 to-rose-600 hover:from-red-700 hover:to-rose-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 transition transform hover:-translate-y-0.5 shadow-md">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                            </svg>
                            Hapus Ruangan
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Optional: Mini Stats atau Info Tambahan (bisa dikembangin nanti) -->
        <div class="mt-6 text-center text-xs text-gray-400">
            ID Ruangan: #{{ $room->id }} | Sistem Manajemen Ruangan v1.0
        </div>
    </div>
@endsection