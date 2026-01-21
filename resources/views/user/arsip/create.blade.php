<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center">
            <a href="{{ route('arsip.index') }}" class="mr-4 text-gray-600 hover:text-gray-900">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                </svg>
            </a>
            <div>
                <h2 class="text-2xl font-bold text-gray-900">
                    Tambah Arsip Baru
                </h2>
                <p class="text-sm text-gray-600 mt-1">Upload dokumen arsip baru untuk divisi {{ Auth::user()->divisi->nama_divisi }}</p>
            </div>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">

            <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
                <!-- Form Header -->
                <div class="px-6 py-4 border-b border-gray-100 bg-gray-50">
                    <div class="flex items-center">
                        <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center mr-3">
                            <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                            </svg>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900">Informasi Arsip</h3>
                    </div>
                </div>

                <!-- Form Content -->
                <form method="POST" action="{{ route('arsip.store') }}" enctype="multipart/form-data" class="p-6">
                    @csrf

                    <div class="space-y-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Nomor Arsip -->
                            <div>
                                <label for="nomor_arsip" class="block text-sm font-semibold text-gray-700 mb-2">
                                    Nomor Arsip <span class="text-red-500">*</span>
                                </label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 20l4-16m2 16l4-16M6 9h14M4 15h14"/>
                                        </svg>
                                    </div>
                                    <input
                                        type="text"
                                        id="nomor_arsip"
                                        name="nomor_arsip"
                                        value="{{ old('nomor_arsip') }}"
                                        placeholder="Contoh: ARS-2024-001"
                                        @class([
                                            'pl-10 w-full border rounded-lg px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition',
                                            'border-gray-300' => !$errors->has('nomor_arsip'),
                                            'border-red-300' => $errors->has('nomor_arsip'),
                                        ])
                                        required>
                                </div>
                                @error('nomor_arsip')
                                    <p class="mt-2 text-sm text-red-600 flex items-center">
                                        <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                        </svg>
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>

                            <!-- Tanggal Arsip -->
                            <div>
                                <label for="tanggal_arsip" class="block text-sm font-semibold text-gray-700 mb-2">
                                    Tanggal Arsip <span class="text-red-500">*</span>
                                </label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                        </svg>
                                    </div>
                                    <input
                                        type="date"
                                        id="tanggal_arsip"
                                        name="tanggal_arsip"
                                        value="{{ old('tanggal_arsip', date('Y-m-d')) }}"
                                        @class([
                                            'pl-10 w-full border rounded-lg px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition',
                                            'border-gray-300' => !$errors->has('tanggal_arsip'),
                                            'border-red-300' => $errors->has('tanggal_arsip'),
                                        ])
                                        required>
                                </div>
                                @error('tanggal_arsip')
                                    <p class="mt-2 text-sm text-red-600 flex items-center">
                                        <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                        </svg>
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>
                        </div>

                        <!-- Judul Arsip -->
                        <div>
                            <label for="judul" class="block text-sm font-semibold text-gray-700 mb-2">
                                Judul Arsip <span class="text-red-500">*</span>
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                    </svg>
                                </div>
                                <input
                                    type="text"
                                    id="judul"
                                    name="judul"
                                    value="{{ old('judul') }}"
                                    placeholder="Judul dokumen arsip"
                                    @class([
                                        'pl-10 w-full border rounded-lg px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition',
                                        'border-gray-300' => !$errors->has('judul'),
                                        'border-red-300' => $errors->has('judul'),
                                    ])
                                    required>
                            </div>
                            @error('judul')
                                <p class="mt-2 text-sm text-red-600 flex items-center">
                                    <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                    </svg>
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <!-- Kategori -->
                        <div>
                            <label for="kategori" class="block text-sm font-semibold text-gray-700 mb-2">
                                Kategori <span class="text-red-500">*</span>
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
                                    </svg>
                                </div>
                                <select
                                    name="kategori"
                                    id="kategori"
                                    @class([
                                        'pl-10 w-full border rounded-lg px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition',
                                        'border-gray-300' => !$errors->has('kategori'),
                                        'border-red-300' => $errors->has('kategori'),
                                    ])
                                    required>
                                    <option value="">Pilih Kategori</option>
                                    <option value="Surat Masuk" {{ old('kategori') == 'Surat Masuk' ? 'selected' : '' }}>Surat Masuk</option>
                                    <option value="Surat Keluar" {{ old('kategori') == 'Surat Keluar' ? 'selected' : '' }}>Surat Keluar</option>
                                    <option value="Laporan" {{ old('kategori') == 'Laporan' ? 'selected' : '' }}>Laporan</option>
                                    <option value="Notulen" {{ old('kategori') == 'Notulen' ? 'selected' : '' }}>Notulen</option>
                                    <option value="Proposal" {{ old('kategori') == 'Proposal' ? 'selected' : '' }}>Proposal</option>
                                    <option value="Lainnya" {{ old('kategori') == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                                </select>
                            </div>
                            @error('kategori')
                                <p class="mt-2 text-sm text-red-600 flex items-center">
                                    <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                    </svg>
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <!-- Keterangan -->
                        <div>
                            <label for="keterangan" class="block text-sm font-semibold text-gray-700 mb-2">
                                Keterangan
                            </label>
                            <textarea
                                id="keterangan"
                                name="keterangan"
                                rows="4"
                                placeholder="Deskripsi atau keterangan tambahan (opsional)"
                                @class([
                                    'w-full border rounded-lg px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition resize-none',
                                    'border-gray-300' => !$errors->has('keterangan'),
                                    'border-red-300' => $errors->has('keterangan'),
                                ])>{{ old('keterangan') }}</textarea>
                            @error('keterangan')
                                <p class="mt-2 text-sm text-red-600 flex items-center">
                                    <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                    </svg>
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <!-- File Upload -->
                        <div>
                            <label for="file" class="block text-sm font-semibold text-gray-700 mb-2">
                                Upload File <span class="text-red-500">*</span>
                            </label>
                            <div class="mt-2">
                                <div
                                    x-data="{
                                        fileName: '',
                                        fileSize: 0,
                                        isDragging: false,
                                        handleFiles(files) {
                                            if (files.length > 0) {
                                                const file = files[0];
                                                this.fileName = file.name;
                                                this.fileSize = (file.size / (1024 * 1024)).toFixed(2);

                                                // Validasi ukuran file
                                                if (file.size > 5 * 1024 * 1024) {
                                                    alert('Ukuran file terlalu besar! Maksimal 5MB');
                                                    this.fileName = '';
                                                    this.fileSize = 0;
                                                    $refs.fileInput.value = '';
                                                    return;
                                                }

                                                // Validasi tipe file
                                                const validTypes = ['application/pdf', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document'];
                                                if (!validTypes.includes(file.type)) {
                                                    alert('Tipe file tidak valid! Hanya PDF, XLSX, dan DOCX yang diperbolehkan');
                                                    this.fileName = '';
                                                    this.fileSize = 0;
                                                    $refs.fileInput.value = '';
                                                }
                                            }
                                        }
                                    }"
                                    @dragover.prevent="isDragging = true"
                                    @dragleave.prevent="isDragging = false"
                                    @drop.prevent="isDragging = false; handleFiles($event.dataTransfer.files)"
                                    :class="isDragging ? 'border-blue-500 bg-blue-50' : 'border-gray-300'"
                                    @class([
                                        'relative border-2 border-dashed rounded-lg p-6 transition-colors',
                                        'border-gray-300' => !$errors->has('file'),
                                        'border-red-300 bg-red-50' => $errors->has('file'),
                                    ])>

                                    <input
                                        type="file"
                                        id="file"
                                        name="file"
                                        x-ref="fileInput"
                                        @change="handleFiles($event.target.files)"
                                        accept=".pdf,.xlsx,.docx"
                                        class="absolute inset-0 w-full h-full opacity-0 cursor-pointer"
                                        required>

                                    <div class="text-center">
                                        <template x-if="!fileName">
                                            <div>
                                                <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48">
                                                    <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                </svg>
                                                <div class="mt-4">
                                                    <p class="text-sm text-gray-600">
                                                        <span class="font-semibold text-blue-600 hover:text-blue-700">Klik untuk upload</span>
                                                        atau drag & drop
                                                    </p>
                                                    <p class="mt-1 text-xs text-gray-500">
                                                        PDF, XLSX, DOCX (Maks. 5MB)
                                                    </p>
                                                </div>
                                            </div>
                                        </template>

                                        <template x-if="fileName">
                                            <div class="flex items-center justify-center space-x-3">
                                                <div class="flex-shrink-0">
                                                    <svg class="h-10 w-10 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                                    </svg>
                                                </div>
                                                <div class="text-left">
                                                    <p class="text-sm font-medium text-gray-900" x-text="fileName"></p>
                                                    <p class="text-xs text-gray-500"><span x-text="fileSize"></span> MB</p>
                                                </div>
                                                <button
                                                    type="button"
                                                    @click.stop="fileName = ''; fileSize = 0; $refs.fileInput.value = ''"
                                                    class="text-red-600 hover:text-red-700">
                                                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                                    </svg>
                                                </button>
                                            </div>
                                        </template>
                                    </div>
                                </div>
                            </div>
                            @error('file')
                                <p class="mt-2 text-sm text-red-600 flex items-center">
                                    <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                    </svg>
                                    {{ $message }}
                                </p>
                            @enderror
                            <p class="mt-2 text-xs text-gray-500">
                                <strong>Format yang didukung:</strong> PDF, Excel (.xlsx), Word (.docx) | <strong>Ukuran maksimal:</strong> 5 MB
                            </p>
                        </div>

                        <!-- Info Box -->
                        <div class="bg-blue-50 border border-blue-200 rounded-lg p-4">
                            <div class="flex items-start">
                                <svg class="w-5 h-5 text-blue-600 mr-3 mt-0.5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
                                </svg>
                                <div>
                                    <p class="text-sm font-semibold text-blue-900 mb-1">Informasi Upload</p>
                                    <ul class="text-sm text-blue-800 space-y-1 list-disc list-inside">
                                        <li>File akan otomatis di-resize jika melebihi 5MB</li>
                                        <li>Pastikan nama file jelas dan deskriptif</li>
                                        <li>Arsip yang diupload hanya bisa diakses oleh divisi Anda</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Form Actions -->
                    <div class="mt-8 flex items-center justify-end space-x-3 pt-6 border-t border-gray-100">
                        <a href="{{ route('arsip.index') }}"
                           class="inline-flex items-center px-5 py-2.5 bg-white border border-gray-300 text-gray-700 font-medium rounded-lg hover:bg-gray-50 transition">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                            </svg>
                            Batal
                        </a>
                        <button type="submit"
                                class="inline-flex items-center px-5 py-2.5 bg-blue-600 text-white font-medium rounded-lg hover:bg-blue-700 transition shadow-sm hover:shadow-md">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"/>
                            </svg>
                            Upload Arsip
                        </button>
                    </div>

                </form>
            </div>

        </div>
    </div>
</x-app-layout>
