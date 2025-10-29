<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arsenal Store</title>
    @vite('resources/css/app.css')
    <script src="//unpkg.com/alpinejs" defer></script>
</head>
<body class="bg-gray-100">
    <nav class="bg-gray-900 text-white px-6 py-4 flex justify-between">
        <a href="{{ route('store.index') }}" class="font-bold text-lg">🎮 Arsemal Store</a>
        <div class="flex gap-4">
            <a href="{{ route('cart.index') }}">🛒 Cart</a>
            <a href="{{ route('checkout.index') }}">💳 Checkout</a>
        </div>
    </nav>

    <main class="p-6">
        @if(session('success'))
            <div
                x-data="{ show: true }"
                x-show="show"
                x-init="setTimeout(() => show = false, 3000)"
                class="bg-green-500 text-white px-4 py-2 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        @yield('content')
    </main>
</body>
</html>
