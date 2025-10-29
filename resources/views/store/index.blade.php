@extends('layouts.app')

@section('content')
<h1 class="text-3xl font-bold mb-6">🎮 Store</h1>

<form method="GET" action="{{ route('store.index') }}" class="mb-6">
    <input type="text" name="search" value="{{ request('search') }}" placeholder="Search..." class="px-3 py-2 rounded-l bg-[#1f1f25] border border-gray-700">
    <button class="px-3 py-2 bg-yellow-500 text-black rounded-r">Search</button>
</form>

<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
    @foreach($games as $game)
        <div class="bg-[#1f1f25] rounded-xl p-4">
            <img src="{{ $game->image }}" alt="{{ $game->title }}" class="w-full h-40 object-cover rounded">
            <h3 class="text-lg font-semibold mt-3">{{ $game->title }}</h3>
            <p class="text-gray-400 text-sm mt-1">{{ Str::limit($game->description, 80) }}</p>
            <div class="mt-3 flex justify-between items-center">
                <div class="text-yellow-400 font-bold">Rp {{ number_format($game->price,0,',','.') }}</div>
                <form action="{{ route('cart.add', $game->id) }}" method="POST">
                    @csrf
                    <button class="bg-yellow-500 px-3 py-1 rounded text-black">Add</button>
                </form>
            </div>
        </div>
    @endforeach
</div>
@endsection
