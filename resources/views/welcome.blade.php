<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistem Manajemen Arsip Digital</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700,800&display=swap" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
        
        .hero-section {
            background: linear-gradient(to bottom, #ffffff 0%, #f8fafc 100%);
        }
        
        .accent-line {
            background: linear-gradient(90deg, #3b82f6 0%, #1e40af 100%);
        }
        
        .card-hover {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        
        .card-hover:hover {
            transform: translateY(-4px);
            box-shadow: 0 20px 40px rgba(0,0,0,0.08);
        }
        
        .smooth-transition {
            transition: all 0.3s ease;
        }
        
        .text-primary {
            color: #1e40af;
        }
        
        .bg-primary {
            background-color: #1e40af;
        }
        
        .border-primary {
            border-color: #3b82f6;
        }
    </style>
</head>
<body class="bg-white antialiased">
    <!-- Navigation -->
    <nav class="fixed w-full top-0 z-50 bg-slate-200 border-b border-gray-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <div class="flex items-center space-x-3">
                    <span class="text-xl font-bold text-gray-900">ArchiveHub</span>
                </div>
                <a href="/login" class="px-6 py-2.5 bg-primary text-white rounded-lg font-semibold smooth-transition hover:bg-blue-900">
                    Masuk
                </a>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero-section pt-32 pb-20 px-4 sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto">
            <div class="grid lg:grid-cols-2 gap-16 items-center">
                <!-- Left Content -->
                <div>                   
                    <h1 class="text-5xl lg:text-6xl font-bold text-gray-900 leading-tight mb-6">
                        Kelola Arsip Digital
                        <span class="block text-primary mt-2">Dengan Efisien</span>
                    </h1>
                    
                    <p class="text-xl text-gray-600 mb-10 leading-relaxed">
                        Platform terintegrasi untuk mengelola dokumen dan arsip setiap divisi dalam satu sistem yang aman, terstruktur, dan mudah diakses.
                    </p>
                    
                    <div class="flex flex-col sm:flex-row gap-4 mb-12">
                        <a href="/login" class="px-8 py-4 bg-primary text-white text-lg font-semibold rounded-lg smooth-transition hover:bg-blue-900 inline-flex items-center justify-center">
                            Mulai Sekarang
                            <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                            </svg>
                        </a>
                        <a href="#features" class="px-8 py-4 border-2 border-gray-300 text-gray-700 text-lg font-semibold rounded-lg smooth-transition hover:border-gray-400 inline-flex items-center justify-center">
                            Pelajari Lebih Lanjut
                        </a>
                    </div>
                    
                    <!-- Stats -->
                    <div class="grid grid-cols-3 gap-8 pt-8 border-t border-gray-200">
                        <div>
                            <div class="text-3xl font-bold text-gray-900">99.9%</div>
                            <div class="text-sm text-gray-600 mt-1">Uptime</div>
                        </div>
                        <div>
                            <div class="text-3xl font-bold text-gray-900">256-bit</div>
                            <div class="text-sm text-gray-600 mt-1">Enkripsi</div>
                        </div>
                        <div>
                            <div class="text-3xl font-bold text-gray-900">24/7</div>
                            <div class="text-sm text-gray-600 mt-1">Support</div>
                        </div>
                    </div>
                </div>
                
                <!-- Right Visual -->
                <div class="hidden lg:block">
                    <div class="bg-white rounded-2xl shadow-xl p-8 border border-gray-200">
                        <div class="flex items-center justify-between mb-6 pb-4 border-b border-gray-200">
                            <div class="text-sm font-semibold text-gray-900">Dashboard Arsip</div>
                            <div class="flex items-center space-x-2">
                                <div class="w-2 h-2 bg-green-500 rounded-full"></div>
                                <span class="text-xs text-gray-600">Online</span>
                            </div>
                        </div>
                        
                        <div class="space-y-4">
                            <!-- Division 1 -->
                            <div class="border border-gray-200 rounded-xl p-5 smooth-transition hover:border-blue-300 hover:shadow-md">
                                <div class="flex items-center space-x-4 mb-3">
                                    <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center flex-shrink-0">
                                        <svg class="w-6 h-6 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                        </svg>
                                    </div>
                                    <div class="flex-1">
                                        <div class="font-semibold text-gray-900">Divisi Keuangan</div>
                                        <div class="text-sm text-gray-500">2,847 Dokumen</div>
                                    </div>
                                    <div class="text-xs font-semibold text-green-600 bg-green-50 px-3 py-1 rounded-full">
                                        Aktif
                                    </div>
                                </div>
                                <div class="h-2 bg-gray-100 rounded-full overflow-hidden">
                                    <div class="h-full bg-blue-600 rounded-full" style="width: 78%"></div>
                                </div>
                            </div>
                            
                            <!-- Division 2 -->
                            <div class="border border-gray-200 rounded-xl p-5 smooth-transition hover:border-blue-300 hover:shadow-md">
                                <div class="flex items-center space-x-4 mb-3">
                                    <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center flex-shrink-0">
                                        <svg class="w-6 h-6 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                        </svg>
                                    </div>
                                    <div class="flex-1">
                                        <div class="font-semibold text-gray-900">Divisi SDM</div>
                                        <div class="text-sm text-gray-500">1,563 Dokumen</div>
                                    </div>
                                    <div class="text-xs font-semibold text-green-600 bg-green-50 px-3 py-1 rounded-full">
                                        Aktif
                                    </div>
                                </div>
                                <div class="h-2 bg-gray-100 rounded-full overflow-hidden">
                                    <div class="h-full bg-blue-600 rounded-full" style="width: 92%"></div>
                                </div>
                            </div>
                            
                            <!-- Division 3 -->
                            <div class="border border-gray-200 rounded-xl p-5 smooth-transition hover:border-blue-300 hover:shadow-md">
                                <div class="flex items-center space-x-4 mb-3">
                                    <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center flex-shrink-0">
                                        <svg class="w-6 h-6 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                                        </svg>
                                    </div>
                                    <div class="flex-1">
                                        <div class="font-semibold text-gray-900">Divisi Operasional</div>
                                        <div class="text-sm text-gray-500">3,921 Dokumen</div>
                                    </div>
                                    <div class="text-xs font-semibold text-green-600 bg-green-50 px-3 py-1 rounded-full">
                                        Aktif
                                    </div>
                                </div>
                                <div class="h-2 bg-gray-100 rounded-full overflow-hidden">
                                    <div class="h-full bg-blue-600 rounded-full" style="width: 65%"></div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="mt-6 pt-4 border-t border-gray-200 flex items-center justify-between text-sm">
                            <div class="text-gray-600">Total Storage: <span class="font-semibold text-gray-900">8.3 TB</span></div>
                            <div class="text-gray-600">Status: <span class="font-semibold text-green-600">Tersinkronisasi</span></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section id="features" class="py-24 bg-gray-900">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-4xl lg:text-5xl font-bold text-white mb-4">
                    Solusi Lengkap untuk <span class="text-primary">Manajemen Arsip</span>
                </h2>
                <p class="text-xl text-cyan-50 max-w-3xl mx-auto">
                    Teknologi terdepan yang dirancang khusus untuk kebutuhan pengelolaan dokumen perusahaan modern
                </p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Feature 1 -->
                <div class="group relative overflow-hidden bg-gray-800 rounded-2xl p-8 smooth-transition hover:shadow-2xl">
                    <!-- Decorative blur orbs -->
                    <div class="absolute w-64 h-64 rounded-full bg-blue-600 blur-3xl opacity-0 group-hover:opacity-30 smooth-transition -right-12 -bottom-16"></div>
                    <div class="absolute w-32 h-32 rounded-full bg-blue-500 blur-2xl opacity-0 group-hover:opacity-40 smooth-transition right-8 bottom-8"></div>
                    <div class="absolute w-40 h-40 rounded-full bg-blue-700 blur-3xl opacity-0 group-hover:opacity-25 smooth-transition -right-8 -top-8"></div>
                    
                    <div class="relative z-10 flex flex-col h-full">
                        <div class="w-14 h-14 bg-blue-600 bg-opacity-20 rounded-xl flex items-center justify-center mb-6 group-hover:bg-opacity-30 smooth-transition">
                            <svg class="w-7 h-7 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-white mb-3">Manajemen Multi-Divisi</h3>
                        <p class="text-gray-300 leading-relaxed mb-6 flex-grow">Organisasi arsip terstruktur per divisi dengan hierarki folder yang dapat disesuaikan dan permission management yang detail.</p>
                        <div class="flex items-center text-blue-400 font-semibold text-sm group-hover:text-blue-300 smooth-transition">
                            Selengkapnya
                            <svg class="w-4 h-4 ml-2 group-hover:translate-x-1 smooth-transition" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Feature 2 -->
                <div class="group relative overflow-hidden bg-gray-800 rounded-2xl p-8 smooth-transition hover:shadow-2xl">
                    <div class="absolute w-64 h-64 rounded-full bg-indigo-600 blur-3xl opacity-0 group-hover:opacity-30 smooth-transition -right-12 -bottom-16"></div>
                    <div class="absolute w-32 h-32 rounded-full bg-indigo-500 blur-2xl opacity-0 group-hover:opacity-40 smooth-transition right-8 bottom-8"></div>
                    <div class="absolute w-40 h-40 rounded-full bg-indigo-700 blur-3xl opacity-0 group-hover:opacity-25 smooth-transition -right-8 -top-8"></div>
                    
                    <div class="relative z-10 flex flex-col h-full">
                        <div class="w-14 h-14 bg-indigo-600 bg-opacity-20 rounded-xl flex items-center justify-center mb-6 group-hover:bg-opacity-30 smooth-transition">
                            <svg class="w-7 h-7 text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-white mb-3">Keamanan Terjamin</h3>
                        <p class="text-gray-300 leading-relaxed mb-6 flex-grow">Enkripsi end-to-end dengan standar AES-256, autentikasi dua faktor, dan audit trail lengkap untuk setiap aktivitas.</p>
                        <div class="flex items-center text-indigo-400 font-semibold text-sm group-hover:text-indigo-300 smooth-transition">
                            Selengkapnya
                            <svg class="w-4 h-4 ml-2 group-hover:translate-x-1 smooth-transition" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Feature 3 -->
                <div class="group relative overflow-hidden bg-gray-800 rounded-2xl p-8 smooth-transition hover:shadow-2xl">
                    <div class="absolute w-64 h-64 rounded-full bg-cyan-600 blur-3xl opacity-0 group-hover:opacity-30 smooth-transition -right-12 -bottom-16"></div>
                    <div class="absolute w-32 h-32 rounded-full bg-cyan-500 blur-2xl opacity-0 group-hover:opacity-40 smooth-transition right-8 bottom-8"></div>
                    <div class="absolute w-40 h-40 rounded-full bg-cyan-700 blur-3xl opacity-0 group-hover:opacity-25 smooth-transition -right-8 -top-8"></div>
                    
                    <div class="relative z-10 flex flex-col h-full">
                        <div class="w-14 h-14 bg-cyan-600 bg-opacity-20 rounded-xl flex items-center justify-center mb-6 group-hover:bg-opacity-30 smooth-transition">
                            <svg class="w-7 h-7 text-cyan-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-white mb-3">Pencarian Cerdas</h3>
                        <p class="text-gray-300 leading-relaxed mb-6 flex-grow">Temukan dokumen dengan cepat menggunakan pencarian full-text, filter advanced, dan kategorisasi otomatis berbasis AI.</p>
                        <div class="flex items-center text-cyan-400 font-semibold text-sm group-hover:text-cyan-300 smooth-transition">
                            Selengkapnya
                            <svg class="w-4 h-4 ml-2 group-hover:translate-x-1 smooth-transition" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Feature 4 -->
                <div class="group relative overflow-hidden bg-gray-800 rounded-2xl p-8 smooth-transition hover:shadow-2xl">
                    <div class="absolute w-64 h-64 rounded-full bg-violet-600 blur-3xl opacity-0 group-hover:opacity-30 smooth-transition -right-12 -bottom-16"></div>
                    <div class="absolute w-32 h-32 rounded-full bg-violet-500 blur-2xl opacity-0 group-hover:opacity-40 smooth-transition right-8 bottom-8"></div>
                    <div class="absolute w-40 h-40 rounded-full bg-violet-700 blur-3xl opacity-0 group-hover:opacity-25 smooth-transition -right-8 -top-8"></div>
                    
                    <div class="relative z-10 flex flex-col h-full">
                        <div class="w-14 h-14 bg-violet-600 bg-opacity-20 rounded-xl flex items-center justify-center mb-6 group-hover:bg-opacity-30 smooth-transition">
                            <svg class="w-7 h-7 text-violet-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-white mb-3">Kolaborasi Tim</h3>
                        <p class="text-gray-300 leading-relaxed mb-6 flex-grow">Berbagi dokumen antar divisi dengan kontrol akses yang ketat, version control, dan tracking aktivitas real-time.</p>
                        <div class="flex items-center text-violet-400 font-semibold text-sm group-hover:text-violet-300 smooth-transition">
                            Selengkapnya
                            <svg class="w-4 h-4 ml-2 group-hover:translate-x-1 smooth-transition" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Feature 5 -->
                <div class="group relative overflow-hidden bg-gray-800 rounded-2xl p-8 smooth-transition hover:shadow-2xl">
                    <div class="absolute w-64 h-64 rounded-full bg-emerald-600 blur-3xl opacity-0 group-hover:opacity-30 smooth-transition -right-12 -bottom-16"></div>
                    <div class="absolute w-32 h-32 rounded-full bg-emerald-500 blur-2xl opacity-0 group-hover:opacity-40 smooth-transition right-8 bottom-8"></div>
                    <div class="absolute w-40 h-40 rounded-full bg-emerald-700 blur-3xl opacity-0 group-hover:opacity-25 smooth-transition -right-8 -top-8"></div>
                    
                    <div class="relative z-10 flex flex-col h-full">
                        <div class="w-14 h-14 bg-emerald-600 bg-opacity-20 rounded-xl flex items-center justify-center mb-6 group-hover:bg-opacity-30 smooth-transition">
                            <svg class="w-7 h-7 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-white mb-3">Analytics & Reporting</h3>
                        <p class="text-gray-300 leading-relaxed mb-6 flex-grow">Dashboard komprehensif untuk monitoring penggunaan, storage, dan aktivitas dokumen dengan laporan detail.</p>
                        <div class="flex items-center text-emerald-400 font-semibold text-sm group-hover:text-emerald-300 smooth-transition">
                            Selengkapnya
                            <svg class="w-4 h-4 ml-2 group-hover:translate-x-1 smooth-transition" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Feature 6 -->
                <div class="group relative overflow-hidden bg-gray-800 rounded-2xl p-8 smooth-transition hover:shadow-2xl">
                    <div class="absolute w-64 h-64 rounded-full bg-sky-600 blur-3xl opacity-0 group-hover:opacity-30 smooth-transition -right-12 -bottom-16"></div>
                    <div class="absolute w-32 h-32 rounded-full bg-sky-500 blur-2xl opacity-0 group-hover:opacity-40 smooth-transition right-8 bottom-8"></div>
                    <div class="absolute w-40 h-40 rounded-full bg-sky-700 blur-3xl opacity-0 group-hover:opacity-25 smooth-transition -right-8 -top-8"></div>
                    
                    <div class="relative z-10 flex flex-col h-full">
                        <div class="w-14 h-14 bg-sky-600 bg-opacity-20 rounded-xl flex items-center justify-center mb-6 group-hover:bg-opacity-30 smooth-transition">
                            <svg class="w-7 h-7 text-sky-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 15a4 4 0 004 4h9a5 5 0 10-.1-9.999 5.002 5.002 0 10-9.78 2.096A4.001 4.001 0 003 15z"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-white mb-3">Cloud Storage</h3>
                        <p class="text-gray-300 leading-relaxed mb-6 flex-grow">Penyimpanan cloud yang scalable dengan backup otomatis, disaster recovery, dan uptime 99.9% SLA guarantee.</p>
                        <div class="flex items-center text-sky-400 font-semibold text-sm group-hover:text-sky-300 smooth-transition">
                            Selengkapnya
                            <svg class="w-4 h-4 ml-2 group-hover:translate-x-1 smooth-transition" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Benefits Section -->
    <section class="py-24 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid lg:grid-cols-2 gap-16 items-center">
                <div>
                    <div class="inline-block px-4 py-2 bg-blue-50 rounded-full mb-6">
                        <span class="text-primary font-semibold text-sm">Keunggulan Platform</span>
                    </div>
                    <h2 class="text-4xl lg:text-5xl font-bold text-gray-900 mb-6">
                        Mengapa Memilih <span class="text-primary">ArchiveHub</span>
                    </h2>
                    <p class="text-lg text-gray-600 mb-8">
                        Solusi enterprise yang dirancang untuk meningkatkan efisiensi dan keamanan pengelolaan arsip perusahaan Anda.
                    </p>
                    
                    <div class="space-y-6">
                        <div class="flex items-start space-x-4">
                            <div class="w-6 h-6 bg-blue-100 rounded-lg flex items-center justify-center flex-shrink-0 mt-1">
                                <svg class="w-4 h-4 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-lg font-bold text-gray-900 mb-1">Efisiensi Operasional</h3>
                                <p class="text-gray-600">Hemat waktu hingga 70% dalam pencarian dan pengelolaan dokumen dengan sistem yang terintegrasi.</p>
                            </div>
                        </div>
                        
                        <div class="flex items-start space-x-4">
                            <div class="w-6 h-6 bg-blue-100 rounded-lg flex items-center justify-center flex-shrink-0 mt-1">
                                <svg class="w-4 h-4 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-lg font-bold text-gray-900 mb-1">Compliance Ready</h3>
                                <p class="text-gray-600">Memenuhi standar regulasi dan compliance dengan fitur audit trail dan retention policy.</p>
                            </div>
                        </div>
                        
                        <div class="flex items-start space-x-4">
                            <div class="w-6 h-6 bg-blue-100 rounded-lg flex items-center justify-center flex-shrink-0 mt-1">
                                <svg class="w-4 h-4 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-lg font-bold text-gray-900 mb-1">Skalabilitas Tinggi</h3>
                                <p class="text-gray-600">Platform yang dapat berkembang sesuai kebutuhan dari puluhan hingga ribuan pengguna.</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div>
                    <div class="grid grid-cols-2 gap-6">
                        <div class="bg-gray-50 rounded-2xl p-8 text-center border border-gray-200">
                            <div class="text-5xl font-bold text-gray-900 mb-2">850+</div>
                            <div class="text-gray-600 font-medium">Perusahaan</div>
                        </div>
                        <div class="bg-gray-50 rounded-2xl p-8 text-center border border-gray-200">
                            <div class="text-5xl font-bold text-gray-900 mb-2">25M+</div>
                            <div class="text-gray-600 font-medium">Dokumen</div>
                        </div>
                        <div class="bg-gray-50 rounded-2xl p-8 text-center border border-gray-200">
                            <div class="text-5xl font-bold text-gray-900 mb-2">15K+</div>
                            <div class="text-gray-600 font-medium">Pengguna</div>
                        </div>
                        <div class="bg-gray-50 rounded-2xl p-8 text-center border border-gray-200">
                            <div class="text-5xl font-bold text-gray-900 mb-2">98%</div>
                            <div class="text-gray-600 font-medium">Kepuasan</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

   <!-- Footer -->
<footer class="bg-gray-900 text-gray-400 py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid md:grid-cols-4 gap-12 mb-12">
            
            <!-- Brand + Social Media -->
            <div>
                <div class="flex items-center space-x-3 mb-4">
                    <span class="text-xl font-bold text-white">ArchiveHub</span>
                </div>

                <p class="text-gray-400 text-sm leading-relaxed mb-6">
                    Platform manajemen arsip digital enterprise untuk organisasi modern.
                </p>

                <!-- Social Media -->
                <div class="flex gap-4 flex-wrap">
                    <!-- Instagram -->
                    <a href="https://instagram.com/username" target="_blank">
                       <button class="group w-12 hover:w-44 h-12 bg-gradient-to-r from-purple-500 via-pink-500 to-orange-500 relative rounded text-white duration-700 font-bold flex justify-start gap-2 items-center p-2 pr-6 before:absolute before:-z-10 before:left-8 before:hover:left-40 before:w-6 before:h-6 before:bg-pink-600 before:hover:bg-pink-500 before:rotate-45 before:duration-700">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-8 h-8 shrink-0 fill-white">
                            <path d="M7.8 2h8.4C19.4 2 22 4.6 22 7.8v8.4a5.8 5.8 0 0 1-5.8 5.8H7.8C4.6 22 2 19.4 2 16.2V7.8A5.8 5.8 0 0 1 7.8 2m-.2 2A3.6 3.6 0 0 0 4 7.6v8.8C4 18.39 5.61 20 7.6 20h8.8a3.6 3.6 0 0 0 3.6-3.6V7.6C20 5.61 18.39 4 16.4 4H7.6m9.65 1.5a1.25 1.25 0 0 1 1.25 1.25A1.25 1.25 0 0 1 17.25 8 1.25 1.25 0 0 1 16 6.75a1.25 1.25 0 0 1 1.25-1.25M12 7a5 5 0 0 1 5 5 5 5 0 0 1-5 5 5 5 0 0 1-5-5 5 5 0 0 1 5-5m0 2a3 3 0 0 0-3 3 3 3 0 0 0 3 3 3 3 0 0 0 3-3 3 3 0 0 0-3-3z"/>
                        </svg>
                        <span class="origin-left inline-flex duration-100 group-hover:duration-300 group-hover:delay-500 opacity-0 group-hover:opacity-100 border-l-2 px-1 transform scale-x-0 group-hover:scale-x-100 transition-all">@username</span>
                        </button>
                    </a>

                    <!-- Facebook -->
                    <a href="https://facebook.com/username" target="_blank">
                       <button class="group w-12 hover:w-44 h-12 bg-gradient-to-r from-blue-600 to-blue-700 relative rounded text-white duration-700 font-bold flex justify-start gap-2 items-center p-2 pr-6 before:absolute before:-z-10 before:left-8 before:hover:left-40 before:w-6 before:h-6 before:bg-blue-500 before:hover:bg-blue-400 before:rotate-45 before:duration-700">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-8 h-8 shrink-0 fill-white">
                            <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                        </svg>
                        <span class="origin-left inline-flex duration-100 group-hover:duration-300 group-hover:delay-500 opacity-0 group-hover:opacity-100 border-l-2 px-1 transform scale-x-0 group-hover:scale-x-100 transition-all">Facebook</span>
                        </button>
                    </a>
                </div>
            </div>

            <!-- Platform -->
            <div>
                <h4 class="text-white font-bold mb-4">Platform</h4>
                <ul class="space-y-3">
                    <li><a href="#technology" class="text-gray-400 hover:text-white text-sm">Teknologi</a></li>
                    <li><a href="#features" class="text-gray-400 hover:text-white text-sm">Fitur</a></li>
                    <li><a href="#solutions" class="text-gray-400 hover:text-white text-sm">Solusi</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-white text-sm">Keamanan</a></li>
                </ul>
            </div>

            <!-- Perusahaan -->
            <div>
                <h4 class="text-white font-bold mb-4">Perusahaan</h4>
                <ul class="space-y-3">
                    <li><a href="#" class="text-gray-400 hover:text-white text-sm">Tentang Kami</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-white text-sm">Studi Kasus</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-white text-sm">Dokumentasi</a></li>
                    <li><a href="#contact" class="text-gray-400 hover:text-white text-sm">Hubungi</a></li>
                </ul>
            </div>

            <!-- Legal -->
            <div>
                <h4 class="text-white font-bold mb-4">Legal</h4>
                <ul class="space-y-3">
                    <li><a href="#" class="text-gray-400 hover:text-white text-sm">Privacy Policy</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-white text-sm">Terms of Service</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-white text-sm">Compliance</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-white text-sm">Security</a></li>
                </ul>
            </div>
        </div>

        <div class="pt-8 border-t border-gray-800 text-center">
            <p class="text-gray-500 text-sm">
                &copy; 2026 ArchiveHub. All rights reserved.
            </p>
        </div>
    </div>
</footer>

</body>
</html>