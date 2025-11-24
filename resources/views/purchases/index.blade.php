@extends('layouts.app')

@section('content')
<h1 class="text-3xl font-bold mb-6 text-yellow-400">📚 Library Saya</h1>

@if($purchases->isEmpty())
    <div class="bg-[#1a1a24] p-6 rounded-lg text-center text-gray-400 shadow-md">
        <p class="text-lg">Kamu belum membeli game apapun.</p>
        <a href="{{ route('store.index') }}" class="inline-block mt-4 bg-yellow-500 text-black px-4 py-2 rounded font-semibold hover:bg-yellow-400 transition">
            🎮 Kunjungi Store
        </a>
    </div>
@else
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
        @foreach($purchases as $purchase)
            <div class="bg-[#1f1f25] hover:bg-[#2a2a32] transition rounded-xl p-4 shadow-md group">
                <img src="{{ $purchase->game->image }}" 
                    alt="{{ $purchase->game->title }}" 
                    class="w-full h-48 object-cover rounded-lg mb-3 group-hover:opacity-90 transition">

                <h3 class="text-lg font-semibold text-gray-100 group-hover:text-yellow-400 transition">
                    {{ $purchase->game->title }}
                </h3>

                <div class="text-yellow-400 font-bold mt-1">
                    Rp {{ number_format($purchase->game->price, 0, ',', '.') }}
                </div>

                <div class="text-gray-400 text-sm mt-1">
                    Dibeli: {{ optional($purchase->purchased_at)->format('d M Y H:i') ?? 'Tidak diketahui' }}
                </div>

                <div class="mt-4">
                    <button class="bg-yellow-500 text-black px-3 py-1.5 rounded font-semibold hover:bg-yellow-400 transition w-full">
                        ▶ Mainkan
                    </button>
                </div>
            </div>
        @endforeach
    </div>
@endif
@endsection
