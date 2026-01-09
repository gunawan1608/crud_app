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

        <!-- Alpine.js -->
        <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

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

            #toast-container > div {
                opacity: 0.95;
            }

            #toast-container > div:hover {
                opacity: 1;
            }
        </style>
    </head>
    <body class="font-sans antialiased bg-gray-50">
        <div class="min-h-screen">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-white shadow-sm">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>

        <!-- jQuery (required for Toastr) -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

        <!-- Toastr JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

        <!-- Toast Notification Component -->
        <x-toast />

        @stack('scripts')
    </body>
</html>
