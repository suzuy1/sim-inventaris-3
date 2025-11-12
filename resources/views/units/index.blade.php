@extends("dashboard")

@section("content")
<div class="max-w-8xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <!-- Header Section dengan Enhanced Design -->
    <div class="mb-8">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between">
            <div class="mb-4 md:mb-0">
                <h1 class="text-3xl lg:text-4xl font-bold bg-gradient-to-r from-gray-900 to-gray-700 bg-clip-text text-transparent mb-3">
                    Manajemen Unit Kerja
                </h1>
                <p class="text-lg text-gray-600 max-w-2xl">
                    Kelola fakultas, departemen, dan unit organisasi kampus secara terpusat
                </p>
            </div>
            <div class="flex flex-wrap gap-3">
                <a href="{{ route('units.create') }}" class="group inline-flex items-center gap-3 rounded-xl bg-gradient-to-r from-indigo-600 to-purple-600 px-5 py-3.5 text-sm font-bold text-white shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-300">
                    <svg class="w-5 h-5 group-hover:scale-110 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                    </svg>
                    Tambah Unit Baru
                </a>
            </div>
        </div>
    </div>

    <!-- Success Message dengan Enhanced Design -->
    @if (session("success"))
    <div class="rounded-2xl bg-gradient-to-r from-green-50 to-emerald-50 border border-green-200 p-5 mb-8 animate-fade-in shadow-lg">
        <div class="flex items-center">
            <div class="flex-shrink-0">
                <div class="bg-gradient-to-br from-green-500 to-emerald-500 text-white p-2.5 rounded-xl shadow-sm">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                    </svg>
                </div>
            </div>
            <div class="ml-4">
                <p class="text-base font-bold text-green-800">{{ session("success") }}</p>
            </div>
        </div>
    </div>
    @endif

    <!-- Stats Cards dengan Enhanced Design -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <!-- Total Unit -->
        <div class="group bg-white/80 backdrop-blur-sm rounded-2xl shadow-lg border border-gray-200/50 p-6 hover:shadow-2xl transform hover:-translate-y-1 transition-all duration-300">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-semibold text-gray-500 mb-1">Total Unit</p>
                    <p class="text-3xl font-bold text-gray-900">{{ $units->total() }}</p>
                    <p class="text-xs text-gray-400 mt-1">Semua unit terdaftar</p>
                </div>
                <div class="bg-gradient-to-br from-blue-500 to-blue-600 text-white p-4 rounded-2xl shadow-lg group-hover:scale-110 transition-transform duration-300">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                    </svg>
                </div>
            </div>
        </div>

        <!-- Ruangan Terkait -->
        <div class="group bg-white/80 backdrop-blur-sm rounded-2xl shadow-lg border border-gray-200/50 p-6 hover:shadow-2xl transform hover:-translate-y-1 transition-all duration-300">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-semibold text-gray-500 mb-1">Ruangan Terkait</p>
                    <p class="text-3xl font-bold text-gray-900">{{ $totalRooms ?? 0 }}</p>
                    <p class="text-xs text-gray-400 mt-1">Total ruangan</p>
                </div>
                <div class="bg-gradient-to-br from-green-500 to-green-600 text-white p-4 rounded-2xl shadow-lg group-hover:scale-110 transition-transform duration-300">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                    </svg>
                </div>
            </div>
        </div>

        <!-- Inventaris -->
        <div class="group bg-white/80 backdrop-blur-sm rounded-2xl shadow-lg border border-gray-200/50 p-6 hover:shadow-2xl transform hover:-translate-y-1 transition-all duration-300">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-semibold text-gray-500 mb-1">Inventaris</p>
                    <p class="text-3xl font-bold text-gray-900">{{ $totalInventory ?? 0 }}</p>
                    <p class="text-xs text-gray-400 mt-1">Total barang</p>
                </div>
                <div class="bg-gradient-to-br from-purple-500 to-purple-600 text-white p-4 rounded-2xl shadow-lg group-hover:scale-110 transition-transform duration-300">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
                    </svg>
                </div>
            </div>
        </div>

        <!-- Aktif -->
        <div class="group bg-white/80 backdrop-blur-sm rounded-2xl shadow-lg border border-gray-200/50 p-6 hover:shadow-2xl transform hover:-translate-y-1 transition-all duration-300">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-semibold text-gray-500 mb-1">Unit Aktif</p>
                    <p class="text-3xl font-bold text-gray-900">{{ $units->count() }}</p>
                    <p class="text-xs text-gray-400 mt-1">Sedang beroperasi</p>
                </div>
                <div class="bg-gradient-to-br from-amber-500 to-amber-600 text-white p-4 rounded-2xl shadow-lg group-hover:scale-110 transition-transform duration-300">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/>
                    </svg>
                </div>
            </div>
        </div>
    </div>

    <!-- Search and Filter Section dengan Enhanced Design -->
    <div class="bg-white/80 backdrop-blur-sm rounded-2xl shadow-lg border border-gray-200/50 p-6 mb-8">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
            <div class="flex-1">
                <div class="relative max-w-md">
                    <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                        <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                    </div>
                    <input 
                        type="text" 
                        placeholder="Cari unit kerja berdasarkan nama atau penanggung jawab..." 
                        class="block w-full rounded-xl border-0 bg-gray-50/50 pl-10 pr-4 py-3.5 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-indigo-500 focus:bg-white transition-all duration-200 sm:text-sm"
                    >
                </div>
            </div>
            <div class="flex gap-3">
                <select class="rounded-xl border-0 bg-gray-50/50 py-3.5 pl-4 pr-10 text-sm shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-indigo-500 focus:bg-white transition-all duration-200">
                    <option>Semua Tipe</option>
                    <option>Fakultas</option>
                    <option>Departemen</option>
                    <option>Unit Kerja</option>
                    <option>Laboratorium</option>
                </select>
                <button class="rounded-xl bg-gradient-to-r from-gray-600 to-slate-700 px-5 py-3.5 text-sm font-bold text-white shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-200">
                    Terapkan Filter
                </button>
            </div>
        </div>
    </div>

    <!-- Units Table dengan Enhanced Design -->
    <div class="bg-white/80 backdrop-blur-sm rounded-2xl shadow-lg border border-gray-200/50 overflow-hidden">
        <div class="bg-gradient-to-r from-gray-50 to-slate-50 px-6 py-5 border-b border-gray-200/50">
            <div class="flex items-center justify-between">
                <div>
                    <h3 class="text-xl font-bold text-gray-900">Daftar Unit Kerja</h3>
                    <p class="text-sm text-gray-600 mt-1">Semua fakultas, departemen, dan unit organisasi yang terdaftar</p>
                </div>
                <span class="bg-blue-100 text-blue-800 text-sm font-bold px-3 py-1.5 rounded-full border border-blue-200">
                    {{ $units->total() }} Unit
                </span>
            </div>
        </div>
        
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200/50">
                <thead class="bg-gray-50/80">
                    <tr>
                        <th scope="col" class="px-6 py-4 text-left text-xs font-bold text-gray-700 uppercase tracking-wider border-r border-gray-200/50">Unit Kerja</th>
                        <th scope="col" class="px-6 py-4 text-left text-xs font-bold text-gray-700 uppercase tracking-wider border-r border-gray-200/50">Tipe</th>
                        <th scope="col" class="px-6 py-4 text-left text-xs font-bold text-gray-700 uppercase tracking-wider border-r border-gray-200/50">Ruangan</th>
                        <th scope="col" class="px-6 py-4 text-left text-xs font-bold text-gray-700 uppercase tracking-wider border-r border-gray-200/50">Status</th>
                        <th scope="col" class="relative px-6 py-4">
                            <span class="sr-only">Aksi</span>
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white/50 divide-y divide-gray-200/30">
                    @forelse ($units as $unit)
                    <tr class="hover:bg-gray-50/80 transition-all duration-200 group">
                        <td class="px-6 py-5 whitespace-nowrap">
                            <div class="flex items-center">
                                <div class="bg-gradient-to-br from-blue-500 to-purple-600 text-white p-3 rounded-xl mr-4 shadow-sm group-hover:shadow-md transition-shadow duration-200">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                                    </svg>
                                </div>
                                <div>
                                    <div class="text-base font-bold text-gray-900 group-hover:text-gray-700 transition-colors">{{ $unit->nama_unit }}</div>
                                    <div class="text-sm text-gray-500 group-hover:text-gray-600 transition-colors flex items-center mt-1">
                                        <svg class="w-3 h-3 mr-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                        </svg>
                                        {{ $unit->penanggung_jawab ?? "Belum diatur" }}
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-5 whitespace-nowrap">
                            @php
                                $typeColors = [
                                    'fakultas' => 'from-blue-100 to-blue-200 text-blue-800 border-blue-200',
                                    'departemen' => 'from-green-100 to-green-200 text-green-800 border-green-200',
                                    'laboratorium' => 'from-purple-100 to-purple-200 text-purple-800 border-purple-200',
                                    'unit_kerja' => 'from-gray-100 to-gray-200 text-gray-800 border-gray-200'
                                ];
                                $typeColor = $typeColors[$unit->tipe ?? 'unit_kerja'] ?? $typeColors['unit_kerja'];
                            @endphp
                            <span class="inline-flex items-center px-3 py-1.5 rounded-full text-sm font-bold bg-gradient-to-r {{ $typeColor }} border shadow-sm capitalize">
                                {{ $unit->tipe ?? "Unit Kerja" }}
                            </span>
                        </td>
                        <td class="px-6 py-5 whitespace-nowrap">
                            <div class="flex items-center">
                                <div class="text-center mr-4">
                                    <div class="text-xl font-bold text-gray-900 group-hover:text-blue-600 transition-colors">{{ $unit->rooms_count ?? 0 }}</div>
                                    <div class="text-xs text-gray-500">Ruangan</div>
                                </div>
                                @if($unit->rooms_count > 0)
                                <div class="border-l border-gray-200 pl-4">
                                    <div class="text-sm font-semibold text-gray-700">{{ $unit->inventaris_count ?? 0 }}</div>
                                    <div class="text-xs text-gray-500">Inventaris</div>
                                </div>
                                @endif
                            </div>
                        </td>
                        <td class="px-6 py-5 whitespace-nowrap">
                            <span class="inline-flex items-center px-3 py-1.5 rounded-full text-sm font-bold bg-gradient-to-r from-green-100 to-emerald-100 text-green-800 border border-green-200 shadow-sm">
                                <svg class="w-3 h-3 mr-1.5" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                </svg>
                                Aktif
                            </span>
                        </td>
                        <td class="px-6 py-5 whitespace-nowrap text-right text-sm font-medium">
                            <div class="flex items-center justify-end space-x-3 opacity-70 group-hover:opacity-100 transition-all duration-300">
                                <a href="{{ route('units.show', $unit->id) }}" class="text-blue-600 hover:text-blue-800 transition-colors duration-200 group/action" title="Lihat Detail">
                                    <div class="flex items-center gap-2 bg-blue-50 hover:bg-blue-100 px-3 py-2 rounded-lg border border-blue-200 transition-all duration-200">
                                        <svg class="w-4 h-4 group-hover/action:scale-110 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                        </svg>
                                        <span class="text-xs font-bold">Detail</span>
                                    </div>
                                </a>
                                <a href="{{ route('units.edit', $unit->id) }}" class="text-amber-600 hover:text-amber-800 transition-colors duration-200 group/action" title="Edit">
                                    <div class="flex items-center gap-2 bg-amber-50 hover:bg-amber-100 px-3 py-2 rounded-lg border border-amber-200 transition-all duration-200">
                                        <svg class="w-4 h-4 group-hover/action:scale-110 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                        </svg>
                                        <span class="text-xs font-bold">Edit</span>
                                    </div>
                                </a>
                                <form action="{{ route('units.destroy', $unit->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method("DELETE")
                                    <button type="submit" class="text-red-600 hover:text-red-800 transition-colors duration-200 group/action" title="Hapus" onclick="return confirm('Apakah Anda yakin ingin menghapus unit ini? Tindakan ini tidak dapat dibatalkan.')">
                                        <div class="flex items-center gap-2 bg-red-50 hover:bg-red-100 px-3 py-2 rounded-lg border border-red-200 transition-all duration-200">
                                            <svg class="w-4 h-4 group-hover/action:scale-110 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                            </svg>
                                            <span class="text-xs font-bold">Hapus</span>
                                        </div>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="px-6 py-16 text-center">
                            <div class="flex flex-col items-center justify-center">
                                <div class="bg-gradient-to-br from-gray-100 to-gray-200 text-gray-400 p-8 rounded-2xl mb-6 shadow-sm">
                                    <svg class="w-20 h-20" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                                    </svg>
                                </div>
                                <h3 class="text-2xl font-bold text-gray-900 mb-3">Belum ada unit kerja</h3>
                                <p class="text-gray-500 mb-8 max-w-md text-lg">Mulai dengan menambahkan unit pertama untuk mengorganisir struktur kampus</p>
                                <a href="{{ route('units.create') }}" class="group inline-flex items-center gap-3 rounded-xl bg-gradient-to-r from-indigo-600 to-purple-600 px-6 py-3.5 text-sm font-bold text-white shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-300">
                                    <svg class="w-5 h-5 group-hover:scale-110 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                                    </svg>
                                    Tambah Unit Pertama
                                </a>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        <!-- Pagination dengan Enhanced Design -->
        @if($units->hasPages())
        <div class="bg-gray-50/80 px-6 py-5 border-t border-gray-200/50">
            <div class="flex flex-col sm:flex-row items-center justify-between gap-4">
                <div class="text-sm text-gray-600 bg-white/50 backdrop-blur-sm rounded-lg px-4 py-2.5 shadow-sm">
                    Menampilkan 
                    <span class="font-bold text-gray-900">{{ $units->firstItem() }}</span>
                    sampai
                    <span class="font-bold text-gray-900">{{ $units->lastItem() }}</span>
                    dari
                    <span class="font-bold text-gray-900">{{ $units->total() }}</span>
                    unit
                </div>
                <div class="flex justify-end">
                    {{ $units->links() }}
                </div>
            </div>
        </div>
        @endif
    </div>
</div>

<style>
.animate-fade-in {
    animation: fadeIn 0.5s ease-in-out;
}

@keyframes fadeIn {
    from { 
        opacity: 0; 
        transform: translateY(-10px); 
    }
    to { 
        opacity: 1; 
        transform: translateY(0); 
    }
}

/* Custom pagination styling */
.pagination {
    display: flex;
    gap: 0.5rem;
}

.pagination .page-item .page-link {
    padding: 0.75rem 1rem;
    border-radius: 0.75rem;
    border: 1px solid #e5e7eb;
    background: white;
    color: #374151;
    font-weight: 600;
    transition: all 0.2s;
}

.pagination .page-item.active .page-link {
    background: linear-gradient(135deg, #4f46e5, #7c3aed);
    border-color: #4f46e5;
    color: white;
}

.pagination .page-item .page-link:hover {
    background: #f3f4f6;
    transform: translateY(-1px);
    box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
}
</style>
@endsection