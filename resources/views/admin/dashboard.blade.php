<x-app-layout>
    <x-slot name="header">
        <!-- Skeleton Loading -->
<div class="py-12" id="skeleton">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6 animate-pulse">

        <!-- Welcome Skeleton -->
        <div class="h-28 rounded-lg bg-gray-300"></div>

        <!-- Stats Skeleton -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
            @for($i=0;$i<4;$i++)
                <div class="bg-white p-6 rounded-lg shadow space-y-4">
                    <div class="h-4 bg-gray-300 rounded w-1/2"></div>
                    <div class="h-8 bg-gray-300 rounded w-1/3"></div>
                </div>
            @endfor
        </div>

        <!-- Quick Action Skeleton -->
        <div class="bg-white p-6 rounded-lg shadow space-y-4">
            <div class="h-5 bg-gray-300 w-1/4 rounded"></div>
            <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                @for($i=0;$i<4;$i++)
                    <div class="h-16 bg-gray-300 rounded"></div>
                @endfor
            </div>
        </div>

        <!-- List Skeleton -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            @for($i=0;$i<2;$i++)
                <div class="bg-white p-6 rounded-lg shadow space-y-3">
                    <div class="h-5 bg-gray-300 w-1/3 rounded"></div>
                    @for($x=0;$x<4;$x++)
                        <div class="h-10 bg-gray-200 rounded"></div>
                    @endfor
                </div>
            @endfor
        </div>

    </div>
</div>


        <div class="flex justify-between items-center">
            <div>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    Dashboard Admin
                </h2>
                <p class="text-sm text-gray-600 mt-1">
                    Kelola sistem manajemen arsip digital
                </p>
            </div>
            <div>
                <span class="px-3 py-1 bg-red-100 text-red-700 rounded-full text-sm font-medium">
                    Administrator
                </span>
            </div>
        </div>
    </x-slot>

  <div class="py-12 hidden" id="real-content">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <!-- Welcome Card -->
            <div class="bg-gradient-to-r from-blue-600 to-blue-700 rounded-lg shadow-md p-6 mb-6">
                <div class="flex items-center space-x-4">
                    <div class="flex-shrink-0">
                        <div class="w-16 h-16 bg-white rounded-full flex items-center justify-center">
                            <span class="text-3xl">👨‍💼</span>
                        </div>
                    </div>
                    <div class="flex-1">
                        <h3 class="text-2xl font-bold text-white">
                            Selamat Datang, {{ Auth::user()->name }}!
                        </h3>
                        <p class="text-blue-100 mt-1">
                            Kelola user, divisi, dan seluruh sistem arsip digital
                        </p>
                    </div>
                </div>
            </div>

            <!-- Stats Cards -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-6">
                <!-- Card 1: Total Users -->
                <div class="bg-white rounded-lg shadow-md p-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-gray-600">Total Users</p>
                            <p class="text-3xl font-bold text-gray-900 mt-2">
                                {{ \App\Models\User::count() }}
                            </p>
                        </div>
                        <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center">
                            <span class="text-2xl">👥</span>
                        </div>
                    </div>
                    <p class="text-xs text-gray-500 mt-3">Pengguna terdaftar</p>
                </div>

                <!-- Card 2: Total Divisi -->
                <div class="bg-white rounded-lg shadow-md p-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-gray-600">Total Divisi</p>
                            <p class="text-3xl font-bold text-gray-900 mt-2">
                                {{ \App\Models\Divisi::count() }}
                            </p>
                        </div>
                        <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center">
                            <span class="text-2xl">🏢</span>
                        </div>
                    </div>
                    <p class="text-xs text-gray-500 mt-3">Divisi tersedia</p>
                </div>

                <!-- Card 3: Total Arsip -->
                <div class="bg-white rounded-lg shadow-md p-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-gray-600">Total Arsip</p>
                            <p class="text-3xl font-bold text-gray-900 mt-2">
                                {{ \App\Models\Arsip::count() }}
                            </p>
                        </div>
                        <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center">
                            <span class="text-2xl">📄</span>
                        </div>
                    </div>
                    <p class="text-xs text-gray-500 mt-3">Dokumen tersimpan</p>
                </div>

                <!-- Card 4: Arsip Bulan Ini -->
                <div class="bg-white rounded-lg shadow-md p-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-gray-600">Bulan Ini</p>
                            <p class="text-3xl font-bold text-gray-900 mt-2">
                                {{ \App\Models\Arsip::whereMonth('created_at', date('m'))->whereYear('created_at', date('Y'))->count() }}
                            </p>
                        </div>
                        <div class="w-12 h-12 bg-orange-100 rounded-lg flex items-center justify-center">
                            <span class="text-2xl">📊</span>
                        </div>
                    </div>
                    <p class="text-xs text-gray-500 mt-3">Arsip baru bulan ini</p>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="bg-white rounded-lg shadow-md p-6 mb-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">Quick Actions</h3>
                <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                    <a href="{{ route('users.create') }}" class="flex items-center p-4 border-2 border-gray-200 rounded-lg hover:border-blue-500 hover:bg-blue-50 transition group">
                        <div class="w-12 h-12 bg-blue-100 group-hover:bg-blue-200 rounded-lg flex items-center justify-center mr-4 transition">
                            <span class="text-2xl">➕</span>
                        </div>
                        <div>
                            <h4 class="font-semibold text-gray-900">Tambah User</h4>
                            <p class="text-sm text-gray-600">Buat akun user baru</p>
                        </div>
                    </a>

                    <a href="{{ route('divisi.create') }}" class="flex items-center p-4 border-2 border-gray-200 rounded-lg hover:border-green-500 hover:bg-green-50 transition group">
                        <div class="w-12 h-12 bg-green-100 group-hover:bg-green-200 rounded-lg flex items-center justify-center mr-4 transition">
                            <span class="text-2xl">🏢</span>
                        </div>
                        <div>
                            <h4 class="font-semibold text-gray-900">Tambah Divisi</h4>
                            <p class="text-sm text-gray-600">Buat divisi baru</p>
                        </div>
                    </a>

                    <a href="{{ route('admin.arsip.index') }}" class="flex items-center p-4 border-2 border-gray-200 rounded-lg hover:border-purple-500 hover:bg-purple-50 transition group">
                        <div class="w-12 h-12 bg-purple-100 group-hover:bg-purple-200 rounded-lg flex items-center justify-center mr-4 transition">
                            <span class="text-2xl">📄</span>
                        </div>
                        <div>
                            <h4 class="font-semibold text-gray-900">Lihat Arsip</h4>
                            <p class="text-sm text-gray-600">Semua arsip sistem</p>
                        </div>
                    </a>

                    <a href="{{ route('users.index') }}" class="flex items-center p-4 border-2 border-gray-200 rounded-lg hover:border-orange-500 hover:bg-orange-50 transition group">
                        <div class="w-12 h-12 bg-orange-100 group-hover:bg-orange-200 rounded-lg flex items-center justify-center mr-4 transition">
                            <span class="text-2xl">📊</span>
                        </div>
                        <div>
                            <h4 class="font-semibold text-gray-900">Kelola User</h4>
                            <p class="text-sm text-gray-600">Manajemen pengguna</p>
                        </div>
                    </a>
                </div>
            </div>

            <!-- Recent Activity & Arsip Terbaru -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                <!-- Recent Users -->
                <div class="bg-white rounded-lg shadow-md p-6">
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="text-lg font-semibold text-gray-900">User Terbaru</h3>
                        <a href="{{ route('users.index') }}" class="text-sm text-blue-600 hover:text-blue-700">
                            Lihat Semua →
                        </a>
                    </div>
                    <div class="space-y-3">
                        @forelse(\App\Models\User::latest()->take(5)->get() as $user)
                            <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                                <div class="flex items-center space-x-3">
                                    <div class="w-10 h-10 bg-blue-100 rounded-full flex items-center justify-center">
                                        <span class="font-semibold text-blue-600">
                                            {{ strtoupper(substr($user->name, 0, 1)) }}
                                        </span>
                                    </div>
                                    <div>
                                        <p class="font-medium text-gray-900">{{ $user->name }}</p>
                                        <p class="text-xs text-gray-500">{{ $user->email }}</p>
                                    </div>
                                </div>
                                <span class="px-2 py-1 text-xs rounded {{ $user->role->name === 'admin' ? 'bg-red-100 text-red-700' : 'bg-gray-100 text-gray-700' }}">
                                    {{ $user->role->name }}
                                </span>
                            </div>
                        @empty
                            <p class="text-center text-gray-500 py-4">Belum ada user</p>
                        @endforelse
                    </div>
                </div>

                <!-- Arsip Terbaru -->
                <div class="bg-white rounded-lg shadow-md p-6">
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="text-lg font-semibold text-gray-900">Arsip Terbaru</h3>
                        <a href="{{ route('admin.arsip.index') }}" class="text-sm text-blue-600 hover:text-blue-700">
                            Lihat Semua →
                        </a>
                    </div>
                    <div class="space-y-3">
                        @forelse(\App\Models\Arsip::with(['divisi', 'user'])->latest()->take(5)->get() as $arsip)
                            <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg hover:bg-gray-100 transition">
                                <div class="flex items-center space-x-3 flex-1 min-w-0">
                                    <div class="w-10 h-10 bg-gradient-to-br from-purple-400 to-purple-600 rounded-lg flex items-center justify-center text-white font-bold text-xs flex-shrink-0">
                                        {{ strtoupper($arsip->file_type) }}
                                    </div>
                                    <div class="min-w-0 flex-1">
                                        <p class="font-medium text-gray-900 truncate">{{ $arsip->judul }}</p>
                                        <p class="text-xs text-gray-500">{{ $arsip->divisi->nama_divisi }} • {{ $arsip->created_at->diffForHumans() }}</p>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <p class="text-center text-gray-500 py-4">Belum ada arsip</p>
                        @endforelse
                    </div>
                </div>
            </div>

            <!-- Tips for Admin -->
            <div class="mt-6 bg-blue-50 border border-blue-200 rounded-lg p-6">
                <div class="flex items-start space-x-3">
                    <span class="text-2xl">ℹ️</span>
                    <div>
                        <h4 class="font-semibold text-blue-900 mb-2">Tips untuk Administrator</h4>
                        <ul class="text-sm text-blue-800 space-y-1">
                            <li>• Pastikan setiap user memiliki divisi yang sesuai untuk akses arsip</li>
                            <li>• Review dan kelola user secara berkala untuk keamanan sistem</li>
                            <li>• Monitor arsip yang diupload oleh setiap divisi</li>
                            <li>• Backup database secara rutin untuk mencegah kehilangan data</li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
