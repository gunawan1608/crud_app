<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700&display=swap" rel="stylesheet" />

    <!-- Tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Toastr -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <style>
        body { font-family: 'Inter', sans-serif; }

        .dark-mesh-bg {
            background: #0a0a0f;
            position: relative;
            overflow: hidden;
        }

        .dark-mesh-bg::before {
            content: '';
            position: absolute;
            inset: -50%;
            background:
                radial-gradient(circle at 20% 30%, rgba(59,130,246,.15), transparent 50%),
                radial-gradient(circle at 80% 70%, rgba(139,92,246,.15), transparent 50%),
                radial-gradient(circle at 40% 80%, rgba(16,185,129,.1), transparent 50%);
        }

        .grid-pattern {
            background-image:
                linear-gradient(rgba(255,255,255,.02) 1px, transparent 1px),
                linear-gradient(90deg, rgba(255,255,255,.02) 1px, transparent 1px);
            background-size: 50px 50px;
        }

        .glass-card {
            background: rgba(255,255,255,.03);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255,255,255,.1);
        }

        .input-dark {
            background: rgba(255,255,255,.05);
            border: 1px solid rgba(255,255,255,.1);
            color: #fff;
        }

        .hover-lift {
            transition: transform .2s ease, box-shadow .2s ease;
        }

        .hover-lift:hover {
            transform: translateY(-2px);
        }
    </style>
</head>

<body class="antialiased dark-mesh-bg">
<div class="grid-pattern min-h-screen flex flex-col relative z-10">

    <!-- MAIN CONTENT -->
    <div class="flex-1 flex flex-col items-center justify-center px-4 py-5">

        <!-- Logo -->
        <div class="text-center mb-5">
            <h1 class="text-3xl font-bold text-white mb-2">
                Archive Management System
            </h1>
            <p class="text-slate-400">
                Secure Document Control & Digital Archive
            </p>
        </div>

        <!-- Card -->
        <div class="w-full sm:max-w-md glass-card rounded-2xl p-8 sm:p-10 hover-lift">
            {{ $slot }}
        </div>
    </div>

    <!-- FOOTER -->
    <footer class="py-6 text-center space-y-4">
        <div class="flex items-center justify-center space-x-6 text-sm">
            <a href="{{ url('/') }}" class="text-slate-400 hover:text-white transition font-medium">
                ← Beranda
            </a>
            <span class="text-slate-700">|</span>
            <a href="#" class="text-slate-400 hover:text-white transition font-medium">
                Dokumentasi
            </a>
            <span class="text-slate-700">|</span>
            <a href="#" class="text-slate-400 hover:text-white transition font-medium">
                Bantuan
            </a>
        </div>

        <p class="text-xs text-slate-500">
            &copy; 2024 Archive Management System. Hak Cipta Dilindungi.
        </p>
    </footer>

</div>

<!-- Scripts -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<x-toast />

</body>
</html>