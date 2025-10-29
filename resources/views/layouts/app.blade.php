<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arsenal Store</title>
    @vite('resources/css/app.css')
    <script src="//unpkg.com/alpinejs" defer></script>
</head>
<body class="bg-[#0f0f17] text-gray-200 min-h-screen flex flex-col">

    {{-- 🔹 Navbar --}}
    <nav class="bg-[#1a1a24] text-gray-100 px-8 py-4 flex justify-between items-center shadow-md">
        <a href="{{ route('store.index') }}" class="font-bold text-xl text-yellow-400 hover:text-yellow-300 transition">
            🎮 Arsenal Store
        </a>

        <div class="flex gap-6 items-center text-sm">
            <a href="{{ route('store.index') }}" class="hover:text-yellow-300 transition">🏪 Store</a>
            <a href="{{ route('cart.index') }}" class="hover:text-yellow-400 transition">🛒 Cart</a>
            <a href="{{ route('checkout.index') }}" class="hover:text-yellow-400 transition">💳 Checkout</a>
            <a href="{{ route('purchases.index') }}" class="hover:text-yellow-400 transition">📚 Library</a>
        </div>
    </nav>

    {{-- 🔹 Main Content --}}
    <main class="flex-1 p-8">
        @if(session('success'))
            <div
                x-data="{ show: true }"
                x-show="show"
                x-init="setTimeout(() => show = false, 3000)"
                class="bg-green-600 text-white px-4 py-3 rounded mb-6 shadow">
                {{ session('success') }}
            </div>
        @endif

        @yield('content')
    </main>

    {{-- 🔹 Footer --}}
    <footer class="bg-[#1a1a24] text-center text-gray-500 text-sm py-4 mt-auto">
        <p>© {{ date('Y') }} Arsenal Store — Inspired by Steam</p>
    </footer>

</body>
</html>
