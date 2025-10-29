@extends('layouts.app')

@section('content')
<div class="max-w-5xl mx-auto text-gray-200">
    <h1 class="text-3xl font-bold mb-6">🛒 Your Cart</h1>

    @if(empty($cart) || count($cart) === 0)
        <div class="bg-[#1b1b1f] p-8 rounded-xl text-center border border-gray-700">
            <p class="text-gray-400 text-lg">Your cart is empty.</p>
            <a href="{{ route('store.index') }}" class="mt-4 inline-block bg-yellow-500 hover:bg-yellow-400 text-black px-5 py-2 rounded-lg font-semibold transition-all">Browse Games</a>
        </div>
    @else
        <div class="space-y-4">
            @php $total = 0; @endphp
            @foreach($cart as $id => $item)
                @php $subtotal = $item['price'] * $item['quantity']; $total += $subtotal; @endphp
                <div class="bg-[#1f1f25] hover:bg-[#2a2a32] p-4 rounded-xl flex flex-col md:flex-row md:justify-between md:items-center border border-gray-700 transition-all duration-200">
                    <div class="flex items-center gap-4">
                        <img src="{{ $item['image'] }}" alt="{{ $item['title'] }}" class="w-24 h-24 object-cover rounded-lg shadow-md">
                        <div>
                            <h2 class="font-semibold text-xl">{{ $item['title'] }}</h2>
                            <p class="text-gray-400 text-sm mt-1">Qty: {{ $item['quantity'] }}</p>
                            <p class="text-gray-400 text-sm">Price: Rp {{ number_format($item['price'],0,',','.') }}</p>
                        </div>
                    </div>
                    <div class="text-right mt-4 md:mt-0">
                        <p class="text-yellow-400 font-bold text-lg">Rp {{ number_format($subtotal,0,',','.') }}</p>
                        <form action="{{ route('cart.remove', $id) }}" method="POST" class="mt-2">
                            @csrf
                            @method('DELETE')
                            <button class="px-3 py-1 bg-red-600 hover:bg-red-500 rounded text-white text-sm font-medium transition-all">
                                Remove
                            </button>
                        </form>
                    </div>
                </div>
            @endforeach

            <div class="border-t border-gray-700 pt-4 flex justify-between items-center">
                <h3 class="text-xl font-semibold">Total</h3>
                <p class="text-yellow-400 text-2xl font-bold">Rp {{ number_format($total,0,',','.') }}</p>
            </div>

            <div class="text-right mt-6">
                <a href="{{ route('checkout.index') }}" class="inline-block bg-yellow-500 hover:bg-yellow-400 text-black font-semibold px-6 py-3 rounded-lg transition-all shadow-md">
                    Proceed to Checkout
                </a>
            </div>
        </div>
    @endif
</div>
@endsection
