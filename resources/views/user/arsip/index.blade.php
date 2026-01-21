<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between">
            <div>
                <h2 class="text-2xl font-bold text-gray-900">
                    Manajemen Arsip
                </h2>
                <p class="text-sm text-gray-600 mt-1">Kelola arsip digital divisi {{ Auth::user()->divisi->nama_divisi }}
                </p>
            </div>
            <div class="mt-4 md:mt-0">
                <a href="{{ route('arsip.create') }}"
                    class="inline-flex items-center px-5 py-2.5 bg-blue-600 text-white font-medium rounded-lg hover:bg-blue-700 transition shadow-sm hover:shadow-md">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                    </svg>
                    Tambah Arsip
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <!-- Stats Cards -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
                <div class="bg-white rounded-lg shadow-sm p-6 border border-gray-100">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-gray-600">Total Arsip</p>
                            <p class="text-3xl font-bold text-gray-900 mt-2">{{ $arsips->total() }}</p>
                        </div>
                        <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center">
                            <span class="text-2xl">📄</span>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-lg shadow-sm p-6 border border-gray-100">
                    <div>
                        <p class="text-sm font-medium text-gray-600">Divisi Anda</p>
                        <p class="text-xl font-bold text-gray-900 mt-2">{{ Auth::user()->divisi->nama_divisi }}</p>
                    </div>
                </div>

                <div class="bg-white rounded-lg shadow-sm p-6 border border-gray-100">
                    <div>
                        <p class="text-sm font-medium text-gray-600">Bulan Ini</p>
                        <p class="text-3xl font-bold text-gray-900 mt-2">
                            {{ $arsips->where('created_at', '>=', now()->startOfMonth())->count() }}</p>
                    </div>
                </div>
            </div>

            <!-- Search & Filter Section -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 mb-6">
                <form method="GET" action="{{ route('arsip.index') }}" class="space-y-4">
                    <!-- Search Bar -->
                    <div class="flex flex-col md:flex-row gap-4">
                        <!-- Search Input -->
                        <div class="flex-1">
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                    </svg>
                                </div>
                                <input type="text" name="search" value="{{ request('search') }}"
                                    placeholder="Cari berdasarkan judul, nomor arsip, atau keterangan..."
                                    class="pl-10 w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                            </div>
                        </div>

                        <!-- Filter Button (Mobile Toggle) -->
                        <button type="button"
                            onclick="document.getElementById('advancedFilters').classList.toggle('hidden')"
                            class="md:hidden inline-flex items-center justify-center px-4 py-2.5 bg-gray-100 text-gray-700 font-medium rounded-lg hover:bg-gray-200 transition">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z" />
                            </svg>
                            Filter
                        </button>

                        <!-- Action Buttons -->
                        <div class="flex gap-2">
                            <button type="submit"
                                class="px-6 py-2.5 bg-blue-600 text-white font-medium rounded-lg hover:bg-blue-700 transition shadow-sm">
                                <span class="hidden md:inline">Cari</span>
                                <svg class="w-5 h-5 md:hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                </svg>
                            </button>

                            @if (request()->hasAny(['search', 'kategori', 'tanggal_dari', 'tanggal_sampai', 'file_type']))
                                <a href="{{ route('arsip.index') }}"
                                    class="px-4 py-2.5 bg-gray-200 text-gray-700 font-medium rounded-lg hover:bg-gray-300 transition">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                </a>
                            @endif
                        </div>
                    </div>

                    <!-- Advanced Filters -->
                    <div id="advancedFilters" class="hidden md:block pt-4 border-t border-gray-200">
                        <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                            <!-- Kategori Filter -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Kategori</label>
                                <select name="kategori"
                                    class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                    <option value="">Semua Kategori</option>
                                    <option value="Surat Masuk"
                                        {{ request('kategori') == 'Surat Masuk' ? 'selected' : '' }}>Surat Masuk
                                    </option>
                                    <option value="Surat Keluar"
                                        {{ request('kategori') == 'Surat Keluar' ? 'selected' : '' }}>Surat Keluar
                                    </option>
                                    <option value="Laporan" {{ request('kategori') == 'Laporan' ? 'selected' : '' }}>
                                        Laporan</option>
                                    <option value="Notulen" {{ request('kategori') == 'Notulen' ? 'selected' : '' }}>
                                        Notulen</option>
                                    <option value="Proposal"
                                        {{ request('kategori') == 'Proposal' ? 'selected' : '' }}>Proposal</option>
                                    <option value="Lainnya" {{ request('kategori') == 'Lainnya' ? 'selected' : '' }}>
                                        Lainnya</option>
                                </select>
                            </div>

                            <!-- File Type Filter -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Tipe File</label>
                                <select name="file_type"
                                    class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                    <option value="">Semua Tipe</option>
                                    @if (isset($fileTypes) && $fileTypes->count() > 0)
                                        @foreach ($fileTypes as $type)
                                            <option value="{{ $type }}"
                                                {{ request('file_type') == $type ? 'selected' : '' }}>
                                                {{ strtoupper($type) }}
                                            </option>
                                        @endforeach
                                    @else
                                        <option disabled>Tidak ada file</option>
                                    @endif
                                </select>
                            </div>

                            <!-- Tanggal Dari -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Tanggal Dari</label>
                                <input type="date" name="tanggal_dari" value="{{ request('tanggal_dari') }}"
                                    class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                            </div>

                            <!-- Tanggal Sampai -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Tanggal Sampai</label>
                                <input type="date" name="tanggal_sampai" value="{{ request('tanggal_sampai') }}"
                                    class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                            </div>
                        </div>
                    </div>

                    <!-- Active Filters Display -->
                    @if (request()->hasAny(['search', 'kategori', 'tanggal_dari', 'tanggal_sampai', 'file_type']))
                        <div class="flex items-center gap-2 pt-4 border-t border-gray-200">
                            <span class="text-sm font-medium text-gray-700">Filter Aktif:</span>
                            <div class="flex flex-wrap gap-2">
                                @if (request('search'))
                                    <span
                                        class="inline-flex items-center px-3 py-1 bg-blue-100 text-blue-800 text-sm rounded-full">
                                        Search: "{{ request('search') }}"
                                        <a href="{{ route('arsip.index', request()->except('search')) }}"
                                            class="ml-2 text-blue-600 hover:text-blue-800">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M6 18L18 6M6 6l12 12" />
                                            </svg>
                                        </a>
                                    </span>
                                @endif

                                @if (request('kategori'))
                                    <span
                                        class="inline-flex items-center px-3 py-1 bg-purple-100 text-purple-800 text-sm rounded-full">
                                        Kategori: {{ request('kategori') }}
                                        <a href="{{ route('arsip.index', request()->except('kategori')) }}"
                                            class="ml-2 text-purple-600 hover:text-purple-800">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M6 18L18 6M6 6l12 12" />
                                            </svg>
                                        </a>
                                    </span>
                                @endif

                                @if (request('file_type'))
                                    <span
                                        class="inline-flex items-center px-3 py-1 bg-green-100 text-green-800 text-sm rounded-full">
                                        Tipe: {{ strtoupper(request('file_type')) }}
                                        <a href="{{ route('arsip.index', request()->except('file_type')) }}"
                                            class="ml-2 text-green-600 hover:text-green-800">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M6 18L18 6M6 6l12 12" />
                                            </svg>
                                        </a>
                                    </span>
                                @endif

                                @if (request('tanggal_dari') || request('tanggal_sampai'))
                                    <span
                                        class="inline-flex items-center px-3 py-1 bg-orange-100 text-orange-800 text-sm rounded-full">
                                        Tanggal:
                                        {{ request('tanggal_dari') ? \Carbon\Carbon::parse(request('tanggal_dari'))->format('d/m/Y') : '...' }}
                                        -
                                        {{ request('tanggal_sampai') ? \Carbon\Carbon::parse(request('tanggal_sampai'))->format('d/m/Y') : '...' }}
                                        <a href="{{ route('arsip.index', request()->except(['tanggal_dari', 'tanggal_sampai'])) }}"
                                            class="ml-2 text-orange-600 hover:text-orange-800">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M6 18L18 6M6 6l12 12" />
                                            </svg>
                                        </a>
                                    </span>
                                @endif
                            </div>
                        </div>
                    @endif
                </form>
            </div>

            <!-- Hasil Pencarian Info -->
            @if (request()->hasAny(['search', 'kategori', 'tanggal_dari', 'tanggal_sampai', 'file_type']))
                <div class="mb-4 px-6 py-3 bg-blue-50 border-l-4 border-blue-500 rounded-r">
                    <p class="text-sm text-blue-800">
                        <strong>{{ $arsips->total() }}</strong> arsip ditemukan
                        @if (request('search'))
                            untuk pencarian <strong>"{{ request('search') }}"</strong>
                        @endif
                    </p>
                </div>
            @endif

            <!-- Card Container -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
                <!-- Table Header -->
                <div class="px-6 py-4 border-b border-gray-100 bg-gray-50">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <svg class="w-5 h-5 text-gray-500 mr-2" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                            <h3 class="text-sm font-semibold text-gray-700">Daftar Arsip</h3>
                        </div>
                    </div>
                </div>

                <!-- Table -->
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead class="bg-gray-50 border-b border-gray-100">
                            <tr>
                                <th
                                    class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    No. Arsip
                                </th>
                                <th
                                    class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Judul
                                </th>
                                <th
                                    class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Kategori
                                </th>
                                <th
                                    class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Tanggal
                                </th>
                                <th
                                    class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    File
                                </th>
                                <th
                                    class="px-6 py-4 text-right text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Aksi
                                </th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            @forelse ($arsips as $arsip)
                                <tr class="hover:bg-gray-50 transition">
                                    <td class="px-6 py-4">
                                        <span
                                            class="text-sm font-semibold text-gray-900">{{ $arsip->nomor_arsip }}</span>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="flex items-start">
                                            <div
                                                class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center mr-3 flex-shrink-0">
                                                <svg class="w-5 h-5 text-blue-600" fill="none"
                                                    stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                                </svg>
                                            </div>
                                            <div>
                                                <p class="text-sm font-semibold text-gray-900">{{ $arsip->judul }}</p>
                                                @if ($arsip->keterangan)
                                                    <p class="text-xs text-gray-500 mt-1">
                                                        {{ Str::limit($arsip->keterangan, 50) }}</p>
                                                @endif
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <span
                                            class="inline-flex items-center px-3 py-1 bg-purple-100 text-purple-800 text-xs font-medium rounded-full">
                                            {{ $arsip->kategori }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="text-sm text-gray-600">
                                            <div class="flex items-center">
                                                <svg class="w-4 h-4 mr-1.5 text-gray-400" fill="none"
                                                    stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                                </svg>
                                                {{ \Carbon\Carbon::parse($arsip->tanggal_arsip)->format('d M Y') }}
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="flex items-center text-sm">
                                            @php
                                                $extension = pathinfo($arsip->file_path, PATHINFO_EXTENSION);
                                                // FIX: Gunakan disk 'public' tanpa prefix 'public/'
                                                $fileSize = Storage::disk('public')->exists($arsip->file_path)
                                                    ? Storage::disk('public')->size($arsip->file_path)
                                                    : $arsip->file_size ?? 0;
                                                $fileSizeMB = number_format($fileSize / 1048576, 2);
                                            @endphp
                                            <span
                                                class="px-2 py-1 bg-gray-100 text-gray-700 rounded text-xs font-medium uppercase">
                                                {{ $extension }}
                                            </span>
                                            <span class="ml-2 text-xs text-gray-500">{{ $fileSizeMB }} MB</span>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 text-right">
                                        <div class="flex items-center justify-end space-x-2">
                                            <!-- Download Button -->
                                            <a href="{{ route('arsip.download', $arsip) }}"
                                                class="inline-flex items-center px-3 py-1.5 bg-green-50 text-green-700 text-sm font-medium rounded-lg hover:bg-green-100 transition border border-green-200">
                                                <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                                                </svg>
                                                Download
                                            </a>

                                            <!-- Edit Button -->
                                        <a href="{{ route('arsip.edit', $arsip) }}"
                                        class="group relative flex h-14 w-14 items-center justify-center overflow-hidden rounded-xl border-2 border-yellow-700 bg-yellow-400 hover:bg-yellow-500 transition">

                                            <!-- Pencil -->
                                            <svg viewBox="0 0 24 24"
                                                class="absolute -top-6 left-1/2 -translate-x-1/2 w-4 h-4 fill-white
                                                    group-hover:top-6 group-hover:rotate-[-25deg]
                                                    transition-all duration-700 ease-out">
                                                <path d="M3 17.25V21h3.75L17.8 9.94l-3.75-3.75L3 17.25z"/>
                                                <path d="M20.7 7.04a1 1 0 0 0 0-1.41l-2.34-2.34a1 1 0 0 0-1.41 0l-1.83 1.83 3.75 3.75 1.83-1.83z"/>
                                            </svg>

                                            <!-- Board / Paper -->
                                            <svg width="22" height="26" viewBox="0 0 24 24" fill="none">
                                                <rect x="4" y="3" width="16" height="18" rx="3"
                                                    stroke="white" stroke-width="2"/>
                                                <line x1="7" y1="8" x2="17" y2="8" stroke="white" stroke-width="2"/>
                                                <line x1="7" y1="12" x2="17" y2="12" stroke="white" stroke-width="2"/>
                                                <line x1="7" y1="16" x2="14" y2="16" stroke="white" stroke-width="2"/>
                                            </svg>
                                        </a>

                                            <!-- Delete Button -->
                                            <form class="inline" method="POST"
                                                action="{{ route('arsip.destroy', $arsip) }}">
                                                @csrf
                                                @method('DELETE')
                                                 <button onclick="return confirm('Yakin ingin menghapus arsip {{ $arsip->judul }}?')" class="group relative flex h-14 w-14 flex-col items-center justify-center overflow-hidden rounded-xl border-2 border-red-800 bg-red-400 hover:bg-red-600">
                                                    <svg viewBox="0 0 1.625 1.625" class="absolute -top-7 fill-white delay-100 group-hover:top-6 group-hover:animate-[spin_1.4s] group-hover:duration-1000" height="15" width="15">
                                                        <path d="M.471 1.024v-.52a.1.1 0 0 0-.098.098v.618c0 .054.044.098.098.098h.487a.1.1 0 0 0 .098-.099h-.39c-.107 0-.195 0-.195-.195"/>
                                                        <path d="M1.219.601h-.163A.1.1 0 0 1 .959.504V.341A.033.033 0 0 0 .926.309h-.26a.1.1 0 0 0-.098.098v.618c0 .054.044.098.098.098h.487a.1.1 0 0 0 .098-.099v-.39a.033.033 0 0 0-.032-.033"/>
                                                        <path d="m1.245.465-.15-.15a.02.02 0 0 0-.016-.006.023.023 0 0 0-.023.022v.108c0 .036.029.065.065.065h.107a.023.023 0 0 0 .023-.023.02.02 0 0 0-.007-.016"/>
                                                    </svg>
                                                    <svg width="16" fill="none" viewBox="0 0 39 7" class="origin-right duration-500 group-hover:rotate-90">
                                                        <line stroke-width="4" stroke="white" y2="5" x2="39" y1="5"></line>
                                                        <line stroke-width="3" stroke="white" y2="1.5" x2="26.0357" y1="1.5" x1="12"></line>
                                                    </svg>
                                                    <svg width="16" fill="none" viewBox="0 0 33 39" class="">
                                                        <mask fill="white" id="path-1-inside-1_8_19">
                                                        <path d="M0 0H33V35C33 37.2091 31.2091 39 29 39H4C1.79086 39 0 37.2091 0 35V0Z"/>
                                                        </mask>
                                                        <path mask="url(#path-1-inside-1_8_19)" fill="white" d="M0 0H33H0ZM37 35C37 39.4183 33.4183 43 29 43H4C-0.418278 43 -4 39.4183 -4 35H4H29H37ZM4 43C-0.418278 43 -4 39.4183 -4 35V0H4V35V43ZM37 0V35C37 39.4183 33.4183 43 29 43V35V0H37Z"/>
                                                        <path stroke-width="4" stroke="white" d="M12 6L12 29"/>
                                                        <path stroke-width="4" stroke="white" d="M21 6V29"/>
                                                    </svg>
                                                    </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="px-6 py-12 text-center">
                                        <div class="flex flex-col items-center">
                                            <div
                                                class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mb-4">
                                                <svg class="w-8 h-8 text-gray-400" fill="none"
                                                    stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                                </svg>
                                            </div>
                                            <p class="text-gray-600 font-medium mb-2">Belum ada arsip</p>
                                            <p class="text-sm text-gray-500 mb-4">Mulai dengan menambahkan arsip
                                                pertama</p>
                                            <a href="{{ route('arsip.create') }}"
                                                class="inline-flex items-center px-4 py-2 bg-blue-600 text-white text-sm font-medium rounded-lg hover:bg-blue-700 transition">
                                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                                </svg>
                                                Tambah Arsip
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                @if ($arsips->hasPages())
                    <div class="px-6 py-4 border-t border-gray-100">
                        {{ $arsips->links() }}
                    </div>
                @endif
            </div>

        </div>
    </div>
</x-app-layout>
