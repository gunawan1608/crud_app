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

        <!-- Tailwind CSS -->
        <script src="https://cdn.tailwindcss.com"></script>

        <!-- Toastr CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

        <style>
            body {
                font-family: 'Inter', sans-serif;
            }

            /* Custom Toastr Styling */
            .toast {
                font-family: 'Inter', sans-serif !important;
                border-radius: 0.75rem !important;
                box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05) !important;
            }

            .toast-success {
                background-color: #10b981 !important;
            }

            .toast-error {
                background-color: #ef4444 !important;
            }

            .toast-info {
                background-color: #3b82f6 !important;
            }

            .toast-warning {
                background-color: #f59e0b !important;
            }

            .toast-message {
                font-size: 0.875rem;
            }

            .toast-title {
                font-weight: 600;
                font-size: 0.9375rem;
            }
        </style>
    </head>
    <body class="bg-gray-50 antialiased">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 px-4">
            <!-- Logo & Brand -->
            <div class="text-center mb-8">
                <div class="inline-flex items-center justify-center w-16 h-16 bg-blue-600 rounded-xl mb-4 shadow-lg">
                    <span class="text-3xl">📁</span>
                </div>
                <h1 class="text-2xl font-bold text-gray-900 mb-1">
                    Sistem Manajemen Arsip Digital
                </h1>
                <p class="text-sm text-gray-600">
                    Masuk untuk mengelola arsip divisi Anda
                </p>
            </div>

            <!-- Card Container -->
            <div class="w-full sm:max-w-md bg-white shadow-md rounded-lg p-8">
                {{ $slot }}
            </div>

            <!-- Footer Link -->
            <div class="mt-6 text-center">
                <a href="{{ url('/') }}" class="text-sm text-blue-600 hover:text-blue-700 hover:underline">
                    ← Kembali ke Beranda
                </a>
            </div>
        </div>

        <!-- jQuery (required for Toastr) -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

        <!-- Toastr JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

        <!-- Toast Notification Component -->
        <x-toast />
    </body>
</html>
