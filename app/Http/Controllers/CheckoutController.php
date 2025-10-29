<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Purchase;
use App\Models\Game;

class CheckoutController extends Controller
{
    // Show checkout page (reads session cart)
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

        // determine user id: prefer logged in user, else find test user created by seeder
        $userId = Auth::id();
        if (!$userId) {
            $userId = DB::table('users')->where('email', 'test@example.com')->value('id');
        }

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
