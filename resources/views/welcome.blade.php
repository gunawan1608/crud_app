<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700&display=swap" rel="stylesheet" />

        <!-- Tailwind CSS -->
        <script src="https://cdn.tailwindcss.com"></script>

        <style>
            body {
                font-family: 'Inter', sans-serif;
            }
        </style>
    </head>
    <body class="bg-gray-50 antialiased">
        <!-- Header -->
        <header class="bg-white shadow-sm">
            <nav class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between items-center h-16">
                    <div class="flex items-center space-x-2">
                        <span class="text-2xl">📁</span>
                        <span class="text-lg font-semibold text-gray-900">Sistem Manajemen Arsip Digital</span>
                    </div>

                    @if (Route::has('login'))
                        <div class="flex items-center space-x-4">
                            @auth
                                <a href="{{ url('/dashboard') }}" class="text-gray-700 hover:text-blue-600 transition">Dashboard</a>
                            @else
                                <a href="{{ route('login') }}" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">Masuk</a>
                            @endauth
                        </div>
                    @endif
                </div>
            </nav>
        </header>

        <!-- Hero Section -->
        <main>
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 sm:py-24">
                <div class="text-center">
                    <div class="mb-6">
                        <span class="text-6xl sm:text-7xl">📁</span>
                    </div>

                    <h1 class="text-4xl sm:text-5xl lg:text-6xl font-bold text-gray-900 mb-6">
                        Kelola Arsip Digital
                        <span class="block text-blue-600 mt-2">Per Divisi dengan Mudah</span>
                    </h1>

                    <p class="text-lg sm:text-xl text-gray-600 max-w-2xl mx-auto mb-10">
                        Sistem manajemen dokumen yang efisien untuk mengorganisir, menyimpan, dan mengakses arsip digital setiap divisi dalam satu platform terpusat.
                    </p>

                    <div class="flex flex-col sm:flex-row gap-4 justify-center">
                        @guest
                            <a href="{{ route('login') }}" class="px-8 py-3 bg-blue-600 text-white text-lg font-semibold rounded-lg hover:bg-blue-700 transition shadow-md">
                                Masuk ke Sistem
                            </a>
                        @else
                            <a href="{{ url('/dashboard') }}" class="px-8 py-3 bg-blue-600 text-white text-lg font-semibold rounded-lg hover:bg-blue-700 transition shadow-md">
                                Buka Dashboard
                            </a>
                        @endguest
                    </div>
                </div>
            </div>

            <!-- Features Section -->
            <div class="bg-white py-16 sm:py-24">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="text-center mb-16">
                        <h2 class="text-3xl sm:text-4xl font-bold text-gray-900 mb-4">
                            Fitur Unggulan
                        </h2>
                        <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                            Solusi lengkap untuk kebutuhan manajemen arsip digital organisasi Anda
                        </p>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                        <div class="text-center p-6">
                            <div class="inline-flex items-center justify-center w-16 h-16 bg-blue-100 rounded-full mb-4">
                                <span class="text-3xl">🗂️</span>
                            </div>
                            <h3 class="text-xl font-semibold text-gray-900 mb-3">Organisasi Per Divisi</h3>
                            <p class="text-gray-600">Kelola arsip setiap divisi secara terpisah dengan sistem yang terstruktur dan mudah diakses.</p>
                        </div>

                        <div class="text-center p-6">
                            <div class="inline-flex items-center justify-center w-16 h-16 bg-blue-100 rounded-full mb-4">
                                <span class="text-3xl">🔒</span>
                            </div>
                            <h3 class="text-xl font-semibold text-gray-900 mb-3">Keamanan Terjamin</h3>
                            <p class="text-gray-600">Sistem authentikasi dan otorisasi yang ketat untuk melindungi dokumen penting Anda.</p>
                        </div>

                        <div class="text-center p-6">
                            <div class="inline-flex items-center justify-center w-16 h-16 bg-blue-100 rounded-full mb-4">
                                <span class="text-3xl">⚡</span>
                            </div>
                            <h3 class="text-xl font-semibold text-gray-900 mb-3">Akses Cepat</h3>
                            <p class="text-gray-600">Temukan dan akses dokumen yang Anda butuhkan dalam hitungan detik.</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Info Section -->
            <div class="bg-blue-600 py-16">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
                    <h2 class="text-3xl sm:text-4xl font-bold text-white mb-4">
                        Akses Sistem
                    </h2>
                    <p class="text-lg text-blue-100 mb-8 max-w-2xl mx-auto">
                        Akun pengguna dibuat dan dikelola oleh administrator sistem. Hubungi administrator Anda untuk mendapatkan akses.
                    </p>
                    @guest
                        <a href="{{ route('login') }}" class="inline-block px-8 py-3 bg-white text-blue-600 text-lg font-semibold rounded-lg hover:bg-gray-50 transition shadow-md">
                            Masuk ke Sistem
                        </a>
                    @endguest
                </div>
            </div>
        </main>

        <!-- Footer -->
        <footer class="bg-gray-900 text-gray-400 py-8">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
                <p>&copy; {{ date('Y') }} Sistem Manajemen Arsip Digital. All rights reserved.</p>
            </div>
        </footer>
    </body>
</html>
