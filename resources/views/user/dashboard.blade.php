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
                            <p class="text-3xl font-bold text-gray-900 mt-2">0</p>
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
                            <p class="text-3xl font-bold text-gray-900 mt-2">0</p>
                        </div>
                        <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center">
                            <span class="text-2xl">📊</span>
                        </div>
                    </div>
                    <p class="text-xs text-gray-500 mt-3">Dokumen ditambahkan bulan ini</p>
                </div>

                <!-- Card 3: Kategori -->
                <div class="bg-white rounded-lg shadow-md p-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-gray-600">Kategori</p>
                            <p class="text-3xl font-bold text-gray-900 mt-2">0</p>
                        </div>
                        <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center">
                            <span class="text-2xl">🗂️</span>
                        </div>
                    </div>
                    <p class="text-xs text-gray-500 mt-3">Kategori arsip tersedia</p>
                </div>
            </div>

            <!-- Main Content Area -->
            <div class="bg-white rounded-lg shadow-md p-6">
                <div class="flex justify-between items-center mb-6">
                    <div>
                        <h3 class="text-lg font-semibold text-gray-900">Manajemen Arsip Digital</h3>
                        <p class="text-sm text-gray-600 mt-1">Kelola dokumen dan arsip divisi Anda di sini</p>
                    </div>
                    <button class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition font-medium">
                        + Tambah Arsip
                    </button>
                </div>

                <!-- Placeholder untuk CRUD -->
                <div class="border-2 border-dashed border-gray-300 rounded-lg p-12">
                    <div class="text-center">
                        <div class="inline-flex items-center justify-center w-16 h-16 bg-gray-100 rounded-full mb-4">
                            <span class="text-3xl">🚧</span>
                        </div>
                        <h4 class="text-lg font-semibold text-gray-900 mb-2">Area CRUD Arsip</h4>
                        <p class="text-gray-600 max-w-md mx-auto">
                            Bagian ini akan diisi dengan tabel data arsip, form tambah/edit, dan fungsi hapus.
                            Sesuaikan dengan kebutuhan manajemen arsip digital divisi Anda.
                        </p>
                        <div class="mt-6 space-y-2">
                            <p class="text-sm text-gray-500">Fitur yang akan ditambahkan:</p>
                            <ul class="text-sm text-gray-600 space-y-1">
                                <li>✓ Tabel list arsip dengan pagination</li>
                                <li>✓ Form upload/tambah arsip baru</li>
                                <li>✓ Edit detail arsip</li>
                                <li>✓ Hapus arsip</li>
                                <li>✓ Filter & pencarian arsip</li>
                                <li>✓ Download/preview dokumen</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Quick Actions (Optional) -->
                <div class="mt-6 pt-6 border-t border-gray-200">
                    <h4 class="text-sm font-semibold text-gray-700 mb-3">Quick Actions</h4>
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-3">
                        <button class="p-3 border border-gray-200 rounded-lg hover:bg-gray-50 transition text-left">
                            <span class="text-xl mb-1 block">📤</span>
                            <span class="text-sm font-medium text-gray-700">Upload Dokumen</span>
                        </button>
                        <button class="p-3 border border-gray-200 rounded-lg hover:bg-gray-50 transition text-left">
                            <span class="text-xl mb-1 block">🔍</span>
                            <span class="text-sm font-medium text-gray-700">Cari Arsip</span>
                        </button>
                        <button class="p-3 border border-gray-200 rounded-lg hover:bg-gray-50 transition text-left">
                            <span class="text-xl mb-1 block">📋</span>
                            <span class="text-sm font-medium text-gray-700">Kategori</span>
                        </button>
                        <button class="p-3 border border-gray-200 rounded-lg hover:bg-gray-50 transition text-left">
                            <span class="text-xl mb-1 block">📊</span>
                            <span class="text-sm font-medium text-gray-700">Laporan</span>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Tips Card (Optional) -->
            <div class="mt-6 bg-blue-50 border border-blue-200 rounded-lg p-6">
                <div class="flex items-start space-x-3">
                    <span class="text-2xl">💡</span>
                    <div>
                        <h4 class="font-semibold text-blue-900 mb-1">Tips Penggunaan</h4>
                        <ul class="text-sm text-blue-800 space-y-1">
                            <li>• Gunakan nama file yang deskriptif untuk memudahkan pencarian</li>
                            <li>• Pilih kategori yang sesuai saat mengunggah dokumen</li>
                            <li>• Pastikan ukuran file tidak melebihi batas maksimal</li>
                            <li>• Backup arsip penting secara berkala</li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
