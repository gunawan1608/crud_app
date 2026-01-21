<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <div>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    📄 Template Surat
                </h2>
                <p class="text-sm text-gray-600 mt-1">
                    Download surat profesional dengan data dinamis dalam format PDF
                </p>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <!-- Info Banner -->
            <div class="mb-6 bg-gradient-to-r from-blue-50 to-indigo-50 border border-blue-200 rounded-lg p-6">
                <div class="flex items-start">
                    <div class="flex-shrink-0">
                        <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <div class="ml-4 flex-1">
                        <h3 class="text-lg font-semibold text-blue-900 mb-2">Cara Menggunakan Template</h3>
                        <ul class="text-sm text-blue-800 space-y-1">
                            <li class="flex items-start">
                                <span class="mr-2">•</span>
                                <span>Isi formulir di bawah dengan data yang diperlukan</span>
                            </li>
                            <li class="flex items-start">
                                <span class="mr-2">•</span>
                                <span>Field yang kosong akan diisi dengan data default atau tanda "-"</span>
                            </li>
                            <li class="flex items-start">
                                <span class="mr-2">•</span>
                                <span>Klik "Lihat PDF" untuk preview atau langsung download file PDF</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Template Cards -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                @foreach($templates as $template)
                    <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-xl transition-shadow duration-300">
                        <!-- Card Header -->
                        <div class="bg-gradient-to-r {{ $template['key'] === 'surat-keterangan' ? 'from-blue-500 to-blue-600' : 'from-purple-500 to-purple-600' }} p-6 text-white">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center">
                                    <div class="w-12 h-12 bg-white bg-opacity-20 rounded-lg flex items-center justify-center mr-4">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                        </svg>
                                    </div>
                                    <div>
                                        <h3 class="text-xl font-bold">{{ $template['title'] }}</h3>
                                        <p class="text-sm text-white text-opacity-90 mt-1">{{ $template['description'] }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Card Body -->
                        <form method="GET" action="{{ route('surat-templates.download', $template['key']) }}" class="p-6">
                            <div class="space-y-4">
                                <!-- Row 1 -->
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div>
                                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                                            <span class="flex items-center">
                                                <svg class="w-4 h-4 mr-1.5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 20l4-16m2 16l4-16M6 9h14M4 15h14"/>
                                                </svg>
                                                Nomor Surat
                                            </span>
                                        </label>
                                        <input name="nomor_surat" type="text"
                                               class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition"
                                               placeholder="Contoh: 001/SK/2024" />
                                    </div>
                                    <div>
                                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                                            <span class="flex items-center">
                                                <svg class="w-4 h-4 mr-1.5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                                </svg>
                                                Tanggal
                                            </span>
                                        </label>
                                        <input name="tanggal" type="date"
                                               class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition"
                                               value="{{ now()->format('Y-m-d') }}" />
                                    </div>
                                </div>

                                <!-- Row 2 -->
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div>
                                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                                            <span class="flex items-center">
                                                <svg class="w-4 h-4 mr-1.5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                                </svg>
                                                Nama
                                            </span>
                                        </label>
                                        <input name="nama" type="text"
                                               class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition"
                                               placeholder="{{ auth()->user()->name }}" />
                                    </div>
                                    <div>
                                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                                            <span class="flex items-center">
                                                <svg class="w-4 h-4 mr-1.5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                                </svg>
                                                Jabatan
                                            </span>
                                        </label>
                                        <input name="jabatan" type="text"
                                               class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition"
                                               placeholder="(opsional)" />
                                    </div>
                                </div>

                                <!-- Row 3 -->
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div>
                                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                                            <span class="flex items-center">
                                                <svg class="w-4 h-4 mr-1.5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                                                </svg>
                                                Divisi
                                            </span>
                                        </label>
                                        <input name="divisi" type="text"
                                               class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition"
                                               placeholder="{{ auth()->user()->divisi->nama_divisi ?? '-' }}" />
                                    </div>
                                    <div>
                                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                                            <span class="flex items-center">
                                                <svg class="w-4 h-4 mr-1.5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"/>
                                                </svg>
                                                Nama File
                                            </span>
                                        </label>
                                        <input name="filename" type="text"
                                               class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition"
                                               placeholder="{{ $template['filename'] }}" />
                                    </div>
                                </div>

                                <!-- Row 4 - Penandatangan -->
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div>
                                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                                            <span class="flex items-center">
                                                <svg class="w-4 h-4 mr-1.5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                                </svg>
                                                Nama Penandatangan
                                            </span>
                                        </label>
                                        <input name="penandatangan_nama" type="text"
                                               class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition"
                                               placeholder="(opsional)" />
                                    </div>
                                    <div>
                                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                                            <span class="flex items-center">
                                                <svg class="w-4 h-4 mr-1.5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 21v-4m0 0V5a2 2 0 012-2h6.5l1 1H21l-3 6 3 6h-8.5l-1-1H5a2 2 0 00-2 2zm9-13.5V9"/>
                                                </svg>
                                                Jabatan Penandatangan
                                            </span>
                                        </label>
                                        <input name="penandatangan_jabatan" type="text"
                                               class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition"
                                               placeholder="(opsional)" />
                                    </div>
                                </div>

                                @if($template['key'] === 'surat-keterangan')
                                    <div>
                                        <label class="block text-sm font-semibold text-gray-700 mb-2">
                                            <span class="flex items-center">
                                                <svg class="w-4 h-4 mr-1.5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                                </svg>
                                                Keterangan
                                            </span>
                                        </label>
                                        <textarea name="keterangan" rows="4"
                                                  class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition"
                                                  placeholder="Isi keterangan surat (opsional)"></textarea>
                                    </div>
                                @endif

                                @if($template['key'] === 'surat-tugas')
                                    <div class="border-t border-gray-200 pt-4">
                                        <h4 class="text-sm font-semibold text-gray-700 mb-3">Detail Tugas</h4>
                                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                            <div>
                                                <label class="block text-sm font-medium text-gray-700 mb-2">Tujuan</label>
                                                <input name="tujuan" type="text"
                                                       class="w-full rounded-lg border-gray-300 focus:border-purple-500 focus:ring-2 focus:ring-purple-200 transition"
                                                       placeholder="(opsional)" />
                                            </div>
                                            <div>
                                                <label class="block text-sm font-medium text-gray-700 mb-2">Lokasi</label>
                                                <input name="lokasi" type="text"
                                                       class="w-full rounded-lg border-gray-300 focus:border-purple-500 focus:ring-2 focus:ring-purple-200 transition"
                                                       placeholder="(opsional)" />
                                            </div>
                                            <div>
                                                <label class="block text-sm font-medium text-gray-700 mb-2">Tanggal Mulai</label>
                                                <input name="tanggal_mulai" type="date"
                                                       class="w-full rounded-lg border-gray-300 focus:border-purple-500 focus:ring-2 focus:ring-purple-200 transition" />
                                            </div>
                                            <div>
                                                <label class="block text-sm font-medium text-gray-700 mb-2">Tanggal Selesai</label>
                                                <input name="tanggal_selesai" type="date"
                                                       class="w-full rounded-lg border-gray-300 focus:border-purple-500 focus:ring-2 focus:ring-purple-200 transition" />
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>

                            <!-- Action Buttons -->
                            <div class="mt-6 pt-6 border-t border-gray-200 flex gap-3">
                                <button type="submit"
                                        formaction="{{ route('surat-templates.view', $template['key']) }}"
                                        formtarget="_blank"
                                        class="flex-1 inline-flex items-center justify-center px-4 py-3 bg-gradient-to-r {{ $template['key'] === 'surat-keterangan' ? 'from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800' : 'from-purple-600 to-purple-700 hover:from-purple-700 hover:to-purple-800' }} border border-transparent rounded-lg font-semibold text-sm text-white uppercase tracking-wider shadow-md hover:shadow-lg transition-all duration-200">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                    </svg>
                                    Lihat PDF
                                </button>
                            </div>
                        </form>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
