<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Arsenal Store') }}</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <script src="//unpkg.com/alpinejs" defer></script>
    </head>
    <body class="font-sans antialiased bg-gray-100 dark:bg-gray-900 text-gray-900 dark:text-gray-100 min-h-screen flex flex-col">

        @include('layouts.navigation')

        @isset($header)
            <header class="bg-white dark:bg-gray-800 shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endisset

        <main class="flex-1 p-6">
            {{-- 1. Pesan Notifikasi (Success/Error) untuk Cart --}}
            @if(session('success'))
                <div class="max-w-7xl mx-auto mb-6 bg-green-500 text-white px-4 py-3 rounded shadow">
                    {{ session('success') }}
                </div>
            @endif
            @if(session('error'))
                <div class="max-w-7xl mx-auto mb-6 bg-red-500 text-white px-4 py-3 rounded shadow">
                    {{ session('error') }}
                </div>
            @endif

            {{-- 2. Hybrid Logic: Cek apakah pakai Slot (Breeze) atau Yield (Toko) --}}
            @if (isset($slot) && $slot->isNotEmpty())
                {{-- Jika variabel $slot ada isinya (Halaman Dashboard/Profile) --}}
                {{ $slot }}
            @else
                {{-- Jika tidak, cari section 'content' (Halaman Store/Cart/Checkout) --}}
                @yield('content')
            @endif
        </main>

        <footer class="bg-white dark:bg-gray-800 text-center text-gray-500 text-sm py-4 mt-auto border-t border-gray-200 dark:border-gray-700">
            <p>© {{ date('Y') }} Arsenal Store — Inspired by Steam</p>
        </footer>
    </body>
</html>
