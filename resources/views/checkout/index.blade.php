@extends('layouts.app')

@section('content')
<h1 class="text-2xl font-bold mb-4">Checkout</h1>

@if(empty($cart) || count($cart) === 0)
    <p>Keranjang kosong. <a href="{{ route('home') }}" class="text-yellow-400">Kembali ke store</a></p>
@else
    <ul class="mb-4">
        @php $total=0; @endphp
        @foreach($cart as $id => $item)
            @php $subtotal = $item['price'] * $item['quantity']; $total += $subtotal; @endphp
            <li class="flex justify-between py-2 border-b">
                <span>{{ $item['title'] }} (x{{ $item['quantity'] }})</span>
                <span>Rp {{ number_format($subtotal,0,',','.') }}</span>
            </li>
        @endforeach
    </ul>

    <div class="text-right font-bold mb-4">Total: Rp {{ number_format($total,0,',','.') }}</div>

    <form action="{{ route('checkout.process') }}" method="POST">
        @csrf
        <button class="bg-green-600 px-4 py-2 rounded text-white">Confirm & Pay (Simulated)</button>
    </form>
@endif
@endsection
