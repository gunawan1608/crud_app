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

            {{-- WELCOME --}}
            <div class="bg-gradient-to-r from-blue-600 to-blue-700 rounded-lg shadow-md p-6 mb-6">
                <h3 class="text-2xl font-bold text-white">
                    Selamat Datang, {{ auth()->user()->name }} 👋
                </h3>
                <p class="text-blue-100 mt-1">
                    Akses dan lihat arsip resmi divisi Anda
                </p>
            </div>

            {{-- STATS --}}
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
                <div class="bg-white rounded-lg shadow-md p-6">
                    <p class="text-sm text-gray-600">Total Arsip Divisi</p>
                    <p class="text-3xl font-bold mt-2">
                        {{ \App\Models\Arsip::where('divisi_id', auth()->user()->divisi_id)->count() }}
                    </p>
                </div>

                <div class="bg-white rounded-lg shadow-md p-6">
                    <p class="text-sm text-gray-600">Arsip Bulan Ini</p>
                    <p class="text-3xl font-bold mt-2">
                        {{ \App\Models\Arsip::where('divisi_id', auth()->user()->divisi_id)
                            ->whereMonth('created_at', now()->month)
                            ->whereYear('created_at', now()->year)
                            ->count() }}
                    </p>
                </div>

                <div class="bg-white rounded-lg shadow-md p-6">
                    <p class="text-sm text-gray-600">Arsip Saya</p>
                    <p class="text-3xl font-bold mt-2">
                        {{ \App\Models\Arsip::where('user_id', auth()->id())->count() }}
                    </p>
                </div>
            </div>

            {{-- ARSIP TERBARU --}}
            <div class="bg-white rounded-lg shadow-md p-6 mb-6">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-lg font-semibold">Arsip Terbaru</h3>
                    <a href="{{ route('arsip.index') }}" class="text-sm text-blue-600 hover:underline">
                        Lihat Semua →
                    </a>
                </div>

                <div class="space-y-3">
                    @forelse(\App\Models\Arsip::where('divisi_id', auth()->user()->divisi_id)->latest()->take(5)->get() as $arsip)
                        <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">

                            <div class="flex items-center space-x-3 flex-1 min-w-0">
                                <div class="w-10 h-10 bg-blue-600 rounded-lg flex items-center justify-center text-white text-xs font-bold">
                                    {{ strtoupper($arsip->file_type) }}
                                </div>
                                <div class="min-w-0">
                                    <p class="font-medium truncate">{{ $arsip->judul }}</p>
                                    <p class="text-xs text-gray-500">{{ $arsip->created_at->diffForHumans() }}</p>
                                </div>
                            </div>

                            {{-- 🔥 VIEW PDF --}}
                            <a href="{{ route('arsip.pdf', $arsip->id) }}"
                               target="_blank"
                               class="ml-3 px-3 py-1 text-xs bg-red-600 text-white rounded hover:bg-red-700">
                                Lihat PDF
                            </a>
                        </div>
                    @empty
                        <div class="text-center text-gray-500 py-6">
                            Belum ada arsip
                        </div>
                    @endforelse
                </div>
            </div>

            {{-- INFO DIVISI --}}
            <div class="bg-white rounded-lg shadow-md p-6">
                <h3 class="text-lg font-semibold mb-4">Informasi Divisi</h3>
                <ul class="space-y-2 text-sm">
                    <li><strong>Nama Divisi:</strong> {{ auth()->user()->divisi->nama_divisi }}</li>
                    <li><strong>Total Anggota:</strong>
                        {{ \App\Models\User::where('divisi_id', auth()->user()->divisi_id)->count() }}
                    </li>
                    <li><strong>Total Arsip:</strong>
                        {{ \App\Models\Arsip::where('divisi_id', auth()->user()->divisi_id)->count() }}
                    </li>
                    <li><strong>Role:</strong>
                        <span class="px-2 py-1 bg-blue-100 text-blue-700 rounded text-xs">
                            {{ ucfirst(auth()->user()->role->name) }}
                        </span>
                    </li>
                </ul>
            </div>

        </div>
    </div>
</x-app-layout>
