@extends('layouts.app')

@section('content')
<h1 class="text-2xl font-bold mb-4">🛒 Cart</h1>

@if(empty($cart) || count($cart) === 0)
    <p>Your cart is empty.</p>
@else
    <div class="space-y-3">
        @php $total = 0; @endphp
        @foreach($cart as $id => $item)
            @php $subtotal = $item['price'] * $item['quantity']; $total += $subtotal; @endphp
            <div class="bg-[#1f1f25] p-3 rounded flex justify-between items-center">
                <div class="flex items-center gap-4">
                    <img src="{{ $item['image'] }}" alt="{{ $item['title'] }}" class="w-20 h-20 object-cover rounded">
                    <div>
                        <div class="font-semibold">{{ $item['title'] }}</div>
                        <div class="text-gray-400">Qty: {{ $item['quantity'] }}</div>
                    </div>
                </div>
                <div class="text-right">
                    <div class="text-yellow-400 font-bold">Rp {{ number_format($subtotal,0,',','.') }}</div>
                    <form action="{{ route('cart.remove', $id) }}" method="POST" class="mt-2">
    @csrf
    @method('DELETE')
    <button class="px-3 py-1 bg-red-600 rounded text-white">Remove</button>
</form>

                </div>
            </div>
        @endforeach

        <div class="text-right font-bold text-yellow-400">Total: Rp {{ number_format($total,0,',','.') }}</div>

        <div class="mt-4 text-right">
            <a href="{{ route('checkout.index') }}" class="bg-yellow-500 px-4 py-2 rounded text-black">Proceed to Checkout</a>
        </div>
    </div>
@endif
@endsection
