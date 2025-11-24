<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// Hapus Auth dan DB karena sudah pindah ke base Controller
// use Illuminate\Support\Facades\Auth;
// use Illuminate\Support\Facades\DB;
use App\Models\Purchase;
use App\Models\Game;

class CheckoutController extends Controller
{
    // ... (fungsi index() tetap sama) ...
    public function index()
    {
        $cart = session()->get('cart', []);
        if (empty($cart)) {
            return redirect()->route('cart.index')->with('error', 'Keranjang kamu kosong.');
        }

        // compute total
        $total = 0;
        foreach ($cart as $id => $item) {
            $total += $item['price'] * $item['quantity'];
        }

        return view('checkout.index', compact('cart', 'total'));
    }

    // Process checkout: save purchases and clear session cart
    public function process(Request $request)
    {
        $cart = session()->get('cart', []);
        if (empty($cart)) {
            return redirect()->route('cart.index')->with('error', 'Keranjang kamu kosong.');
        }

        // Gunakan fungsi yang sudah dibuat di base controller
        $userId = $this->getActiveUserId();

        foreach ($cart as $gameId => $item) {
            // verify game exists
            $game = Game::find($gameId);
            if (!$game) continue;

            Purchase::create([
                'user_id' => $userId,
                'game_id' => $game->id,
                'purchased_at' => now(),
            ]);
        }

        // clear cart
        session()->forget('cart');

        return redirect()->route('purchases.index')->with('success', 'Checkout sukses — game sudah ditambahkan ke Library kamu.');
    }
}