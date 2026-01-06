<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <div>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    Dashboard User
                </h2>
                <p class="text-sm text-gray-600 mt-1">
                    Kelola arsip digital divisi Anda
                </p>
            </div>
            <div class="text-sm text-gray-600">
                <span class="font-medium">Divisi:</span>
                <span class="px-3 py-1 bg-blue-100 text-blue-700 rounded-full">
                    {{ Auth::user()->divisi->nama_divisi ?? 'Tidak ada divisi' }}
                </span>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <!-- Welcome Card -->
            <div class="bg-gradient-to-r from-blue-600 to-blue-700 rounded-lg shadow-md p-6 mb-6">
                <div class="flex items-center space-x-4">
                    <div class="flex-shrink-0">
                        <div class="w-16 h-16 bg-white rounded-full flex items-center justify-center">
                            <span class="text-3xl">📁</span>
                        </div>
                    </div>
                    <div class="flex-1">
                        <h3 class="text-2xl font-bold text-white">
                            Selamat Datang, {{ Auth::user()->name }}!
                        </h3>
                        <p class="text-blue-100 mt-1">
                            Kelola dan organisir arsip digital divisi Anda dengan mudah
                        </p>
                    </div>
                </div>
            </div>

            <!-- Stats Cards -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
                <!-- Card 1: Total Arsip -->
                <div class="bg-white rounded-lg shadow-md p-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-gray-600">Total Arsip</p>
                            <p class="text-3xl font-bold text-gray-900 mt-2">
                                {{ \App\Models\Arsip::where('divisi_id', auth()->user()->divisi_id)->count() }}
                            </p>
                        </div>
                        <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center">
                            <span class="text-2xl">📄</span>
                        </div>
                    </div>
                    <p class="text-xs text-gray-500 mt-3">Total dokumen yang tersimpan</p>
                </div>

                <!-- Card 2: Arsip Bulan Ini -->
                <div class="bg-white rounded-lg shadow-md p-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-gray-600">Bulan Ini</p>
                            <p class="text-3xl font-bold text-gray-900 mt-2">
                                {{ \App\Models\Arsip::where('divisi_id', auth()->user()->divisi_id)
                                    ->whereMonth('created_at', date('m'))
                                    ->whereYear('created_at', date('Y'))
                                    ->count() }}
                            </p>
                        </div>
                        <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center">
                            <span class="text-2xl">📊</span>
                        </div>
                    </div>
                    <p class="text-xs text-gray-500 mt-3">Dokumen ditambahkan bulan ini</p>
                </div>

                <!-- Card 3: Arsip Saya -->
                <div class="bg-white rounded-lg shadow-md p-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-gray-600">Arsip Saya</p>
                            <p class="text-3xl font-bold text-gray-900 mt-2">
                                {{ \App\Models\Arsip::where('user_id', auth()->id())->count() }}
                            </p>
                        </div>
                        <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center">
                            <span class="text-2xl">👤</span>
                        </div>
                    </div>
                    <p class="text-xs text-gray-500 mt-3">Dokumen yang saya upload</p>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="bg-white rounded-lg shadow-md p-6 mb-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">Quick Actions</h3>
                <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                    <a href="{{ route('arsip.create') }}" class="flex items-center p-4 border-2 border-gray-200 rounded-lg hover:border-blue-500 hover:bg-blue-50 transition group">
                        <div class="w-12 h-12 bg-blue-100 group-hover:bg-blue-200 rounded-lg flex items-center justify-center mr-4 transition">
                            <span class="text-2xl">➕</span>
                        </div>
                        <div>
                            <h4 class="font-semibold text-gray-900">Tambah Arsip</h4>
                            <p class="text-sm text-gray-600">Upload dokumen baru</p>
                        </div>
                    </a>

                    <a href="{{ route('arsip.index') }}" class="flex items-center p-4 border-2 border-gray-200 rounded-lg hover:border-green-500 hover:bg-green-50 transition group">
                        <div class="w-12 h-12 bg-green-100 group-hover:bg-green-200 rounded-lg flex items-center justify-center mr-4 transition">
                            <span class="text-2xl">📋</span>
                        </div>
                        <div>
                            <h4 class="font-semibold text-gray-900">Lihat Arsip</h4>
                            <p class="text-sm text-gray-600">Daftar semua arsip</p>
                        </div>
                    </a>

                    <a href="{{ route('arsip.index') }}" class="flex items-center p-4 border-2 border-gray-200 rounded-lg hover:border-purple-500 hover:bg-purple-50 transition group">
                        <div class="w-12 h-12 bg-purple-100 group-hover:bg-purple-200 rounded-lg flex items-center justify-center mr-4 transition">
                            <span class="text-2xl">🔍</span>
                        </div>
                        <div>
                            <h4 class="font-semibold text-gray-900">Cari Arsip</h4>
                            <p class="text-sm text-gray-600">Temukan dokumen</p>
                        </div>
                    </a>

                    <a href="{{ route('arsip.index') }}" class="flex items-center p-4 border-2 border-gray-200 rounded-lg hover:border-orange-500 hover:bg-orange-50 transition group">
                        <div class="w-12 h-12 bg-orange-100 group-hover:bg-orange-200 rounded-lg flex items-center justify-center mr-4 transition">
                            <span class="text-2xl">📊</span>
                        </div>
                        <div>
                            <h4 class="font-semibold text-gray-900">Lihat Statistik</h4>
                            <p class="text-sm text-gray-600">Laporan arsip</p>
                        </div>
                    </a>
                </div>
            </div>

            <!-- Recent Activity -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                <!-- Arsip Terbaru -->
                <div class="bg-white rounded-lg shadow-md p-6">
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="text-lg font-semibold text-gray-900">Arsip Terbaru</h3>
                        <a href="{{ route('arsip.index') }}" class="text-sm text-blue-600 hover:text-blue-700">
                            Lihat Semua →
                        </a>
                    </div>
                    <div class="space-y-3">
                        @forelse(\App\Models\Arsip::where('divisi_id', auth()->user()->divisi_id)->latest()->take(5)->get() as $arsip)
                            <a href="{{ route('arsip.show', $arsip) }}" class="flex items-center justify-between p-3 bg-gray-50 rounded-lg hover:bg-gray-100 transition">
                                <div class="flex items-center space-x-3 flex-1 min-w-0">
                                    <div class="w-10 h-10 bg-gradient-to-br from-purple-400 to-purple-600 rounded-lg flex items-center justify-center text-white font-bold text-xs flex-shrink-0">
                                        {{ strtoupper($arsip->file_type) }}
                                    </div>
                                    <div class="min-w-0 flex-1">
                                        <p class="font-medium text-gray-900 truncate">{{ $arsip->judul }}</p>
                                        <p class="text-xs text-gray-500">{{ $arsip->created_at->diffForHumans() }}</p>
                                    </div>
                                </div>
                                <span class="text-xs text-gray-400 flex-shrink-0 ml-2">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                    </svg>
                                </span>
                            </a>
                        @empty
                            <div class="text-center py-8">
                                <span class="text-4xl mb-2 block">📄</span>
                                <p class="text-gray-500 text-sm">Belum ada arsip</p>
                                <a href="{{ route('arsip.create') }}" class="text-blue-600 text-sm hover:underline mt-2 inline-block">
                                    Tambah arsip pertama
                                </a>
                            </div>
                        @endforelse
                    </div>
                </div>

                <!-- Informasi Divisi -->
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Informasi Divisi</h3>
                    <div class="space-y-4">
                        <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                            <span class="text-sm text-gray-600">Nama Divisi</span>
                            <span class="font-medium text-gray-900">{{ auth()->user()->divisi->nama_divisi }}</span>
                        </div>
                        <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                            <span class="text-sm text-gray-600">Total Anggota</span>
                            <span class="font-medium text-gray-900">
                                {{ \App\Models\User::where('divisi_id', auth()->user()->divisi_id)->count() }} orang
                            </span>
                        </div>
                        <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                            <span class="text-sm text-gray-600">Total Arsip</span>
                            <span class="font-medium text-gray-900">
                                {{ \App\Models\Arsip::where('divisi_id', auth()->user()->divisi_id)->count() }} dokumen
                            </span>
                        </div>
                        <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                            <span class="text-sm text-gray-600">Role Anda</span>
                            <span class="px-2 py-1 text-xs font-medium rounded bg-blue-100 text-blue-700">
                                {{ ucfirst(auth()->user()->role->name) }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tips Card -->
            <div class="mt-6 bg-blue-50 border border-blue-200 rounded-lg p-6">
                <div class="flex items-start space-x-3">
                    <span class="text-2xl">💡</span>
                    <div>
                        <h4 class="font-semibold text-blue-900 mb-2">Tips Penggunaan</h4>
                        <ul class="text-sm text-blue-800 space-y-1">
                            <li>• Gunakan nama file yang deskriptif untuk memudahkan pencarian</li>
                            <li>• Semua anggota divisi {{ auth()->user()->divisi->nama_divisi }} dapat melihat dan mengelola arsip</li>
                            <li>• Pastikan ukuran file tidak melebihi 5MB</li>
                            <li>• Format file yang didukung: PDF, DOC, DOCX, XLS, XLSX, JPG, PNG</li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
