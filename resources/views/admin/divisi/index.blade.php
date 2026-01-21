<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between">
            <div>
                <h2 class="text-2xl font-bold text-gray-900">
                    Manajemen Divisi
                </h2>
                <p class="text-sm text-gray-600 mt-1">Kelola divisi dalam organisasi Anda</p>
            </div>
            <div class="mt-4 md:mt-0">
                <a href="{{ route('divisi.create') }}"
                    class="inline-flex items-center px-5 py-2.5 bg-blue-600 text-white font-medium rounded-lg hover:bg-blue-700 transition shadow-sm hover:shadow-md">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                    </svg>
                    Tambah Divisi
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            {{-- ✅ ALERT MANUAL SUDAH DIHAPUS - Toast akan handle otomatis --}}

            <!-- Card Container -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
                <!-- Table Header -->
                <div class="px-6 py-4 border-b border-gray-100 bg-gray-50">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <svg class="w-5 h-5 text-gray-500 mr-2" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                            </svg>
                            <h3 class="text-sm font-semibold text-gray-700">Daftar Divisi</h3>
                        </div>
                        <span class="text-xs text-gray-500">Total: <strong>{{ $divisis->count() }}</strong>
                            divisi</span>
                    </div>
                </div>

                <!-- Table -->
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead class="bg-gray-50 border-b border-gray-100">
                            <tr>
                                <th
                                    class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    No
                                </th>
                                <th
                                    class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Nama Divisi
                                </th>
                                <th
                                    class="px-6 py-4 text-right text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Aksi
                                </th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            @forelse ($divisis as $divisi)
                                <tr class="hover:bg-gray-50 transition">
                                    <td class="px-6 py-4 text-sm text-gray-600 font-medium">
                                        {{ $loop->iteration }}
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="flex items-center">
                                            <div class="w-10 h-10 rounded-lg flex items-center justify-center mr-3"
                                                style="background-color: {{ $divisi->color }};">
                                                <svg class="w-5 h-5" style="color: {{ $divisi->text_color }};"
                                                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                                </svg>
                                            </div>
                                            <div>
                                                <span
                                                    class="text-sm font-semibold text-gray-900">{{ $divisi->nama_divisi }}</span>
                                                <p class="text-xs text-gray-500 mt-0.5">{{ $divisi->users->count() }}
                                                    anggota</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 text-right">
                                        <div class="flex items-center justify-end space-x-2">
                                          <a href="{{ route('divisi.edit', $divisi) }}"
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
                                                action="{{ route('divisi.destroy', $divisi) }}">
                                                @csrf
                                                @method('DELETE')
                                               <button onclick="return confirm('Yakin ingin menghapus divisi {{ $divisi->nama_divisi }}?')" class="group relative flex h-14 w-14 flex-col items-center justify-center overflow-hidden rounded-xl border-2 border-red-800 bg-red-400 hover:bg-red-600">
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
                                    <td colspan="3" class="px-6 py-12 text-center">
                                        <div class="flex flex-col items-center">
                                            <div
                                                class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mb-4">
                                                <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
                                                </svg>
                                            </div>
                                            <p class="text-gray-600 font-medium mb-2">Belum ada divisi</p>
                                            <p class="text-sm text-gray-500 mb-4">Mulai dengan menambahkan divisi
                                                pertama</p>
                                            <a href="{{ route('divisi.create') }}"
                                                class="inline-flex items-center px-4 py-2 bg-blue-600 text-white text-sm font-medium rounded-lg hover:bg-blue-700 transition">
                                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                                </svg>
                                                Tambah Divisi
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
