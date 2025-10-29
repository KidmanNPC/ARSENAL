@extends('layouts.app')

@section('content')
<h1 class="text-2xl font-bold mb-4">Library Saya</h1>

@if($purchases->isEmpty())
    <p>Kamu belum membeli game apapun.</p>
@else
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
        @foreach($purchases as $purchase)
            <div class="bg-[#1f1f25] p-4 rounded">
                <img src="{{ $purchase->game->image }}" alt="{{ $purchase->game->title }}" class="w-full h-40 object-cover rounded">
                <h3 class="mt-3 font-semibold">{{ $purchase->game->title }}</h3>
                <div class="text-yellow-400 font-bold">Rp {{ number_format($purchase->game->price,0,',','.') }}</div>
                <div class="text-gray-400 text-sm mt-2">Dibeli: {{ optional($purchase->purchased_at)->format('d M Y H:i') }}</div>
            </div>
        @endforeach
    </div>
@endif
@endsection
