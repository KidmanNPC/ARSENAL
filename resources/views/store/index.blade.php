@extends('layouts.app')

@section('content')
<div class="text-center mb-10">
    <h1 class="text-4xl font-extrabold text-white mb-3">🎮 Arsenal Game Store</h1>
    <p class="text-gray-400 text-lg">Tempat terbaik untuk menemukan game impianmu!</p>
</div>

<form method="GET" action="{{ route('store.index') }}" class="flex justify-center mb-8">
    <input
        type="text"
        name="search"
        value="{{ request('search') }}"
        placeholder="🔍 Cari game..."
        class="w-1/3 px-4 py-2 rounded-l bg-[#1f1f25] border border-gray-700 text-white focus:outline-none focus:border-yellow-500"
    >
    <button class="px-5 py-2 bg-yellow-500 text-black font-semibold rounded-r hover:bg-yellow-400 transition">
        Search
    </button>
</form>

<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
    @foreach($games as $game)
        <div class="bg-[#1b1b22] hover:bg-[#22222b] transition rounded-xl shadow-lg p-4 border border-gray-800">
            <img src="{{ $game->image }}" alt="{{ $game->title }}" class="w-full h-48 object-cover rounded">
            <h3 class="text-xl font-bold mt-4 text-white">{{ $game->title }}</h3>
            <p class="text-gray-400 text-sm mt-2">{{ Str::limit($game->description, 100) }}</p>
            <div class="mt-4 flex justify-between items-center">
                <span class="text-yellow-400 font-semibold text-lg">
                    Rp {{ number_format($game->price, 0, ',', '.') }}
                </span>
                <form action="{{ route('cart.add', $game->id) }}" method="POST">
                    @csrf
                    <button
                        class="bg-yellow-500 hover:bg-yellow-400 text-black px-4 py-1 rounded-lg font-semibold transition"
                    >
                        + Add
                    </button>
                </form>
            </div>
        </div>
    @endforeach

    {{-- Dummy games sementara (kalau database masih isi 3) --}}
    @php
        $dummyGames = [
            [
                'title' => 'Ghost of Tsushima',
                'description' => 'Rasakan perjalanan epik samurai dalam dunia terbuka yang menawan.',
                'price' => 720000,
                'image' => 'https://cdn.cloudflare.steamstatic.com/steam/apps/2215430/header.jpg',
            ],
            [
                'title' => 'Horizon Forbidden West',
                'description' => 'Petualangan futuristik di dunia pasca-apokaliptik yang penuh robot.',
                'price' => 690000,
                'image' => 'https://cdn.cloudflare.steamstatic.com/steam/apps/2051610/header.jpg',
            ],
            [
                'title' => 'God of War Ragnarök',
                'description' => 'Kratos dan Atreus kembali dalam kisah epik mitologi Nordik.',
                'price' => 799000,
                'image' => 'https://cdn.cloudflare.steamstatic.com/steam/apps/1593500/header.jpg',
            ],
        ];
    @endphp

    @foreach($dummyGames as $game)
        <div class="bg-[#1b1b22] hover:bg-[#22222b] transition rounded-xl shadow-lg p-4 border border-gray-800">
            <img src="{{ $game['image'] }}" alt="{{ $game['title'] }}" class="w-full h-48 object-cover rounded">
            <h3 class="text-xl font-bold mt-4 text-white">{{ $game['title'] }}</h3>
            <p class="text-gray-400 text-sm mt-2">{{ Str::limit($game['description'], 100) }}</p>
            <div class="mt-4 flex justify-between items-center">
                <span class="text-yellow-400 font-semibold text-lg">
                    Rp {{ number_format($game['price'], 0, ',', '.') }}
                </span>
                <button
                    class="bg-yellow-500 hover:bg-yellow-400 text-black px-4 py-1 rounded-lg font-semibold transition cursor-not-allowed opacity-70"
                    disabled
                >
                    Added
                </button>
            </div>
        </div>
    @endforeach
</div>
@endsection
