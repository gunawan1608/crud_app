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

            @if (session('success'))
                <div class="mb-6 flex items-center p-4 bg-green-50 border border-green-200 rounded-lg">
                    <svg class="w-5 h-5 text-green-600 mr-3" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                            clip-rule="evenodd" />
                    </svg>
                    <span class="text-green-800 font-medium">{{ session('success') }}</span>
                </div>
            @endif

            @if (session('error'))
                <div class="mb-6 flex items-center p-4 bg-red-50 border border-red-200 rounded-lg">
                    <svg class="w-5 h-5 text-red-600 mr-3" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
                            clip-rule="evenodd" />
                    </svg>
                    <span class="text-red-800 font-medium">{{ session('error') }}</span>
                </div>
            @endif

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
                                                class="inline-flex items-center px-3 py-1.5 bg-yellow-50 text-yellow-700 text-sm font-medium rounded-lg hover:bg-yellow-100 transition border border-yellow-200">
                                                <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                </svg>
                                                Edit
                                            </a>

                                            <!-- Delete Button -->
                                            <form class="inline" method="POST"
                                                action="{{ route('arsip.destroy', $arsip) }}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    onclick="return confirm('Yakin ingin menghapus arsip {{ $arsip->judul }}?')"
                                                    class="inline-flex items-center px-3 py-1.5 bg-red-50 text-red-700 text-sm font-medium rounded-lg hover:bg-red-100 transition border border-red-200">
                                                    <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                    </svg>
                                                    Hapus
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
