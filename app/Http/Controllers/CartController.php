<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game;

class CartController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart', []);
        return view('cart.index', compact('cart'));
    }

    public function add($id)
    {
        $game = Game::findOrFail($id);
        $cart = session()->get('cart', []);

        // Cek kalau game sudah ada di cart
        if (isset($cart[$id])) {
            return redirect()->back()->with('info', $game->title . ' sudah ada di cart!');
        }

        $cart[$id] = [
            'title' => $game->title,
            'price' => $game->price,
            'image' => $game->image,
            'quantity' => 1,
        ];

        session()->put('cart', $cart);

        return redirect()->back()->with('success', $game->title . ' ditambahkan ke cart!');
    }

    public function remove($id)
    {
        $cart = session()->get('cart', []);
        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }
        return redirect()->route('cart.index')->with('success', 'Item dihapus dari cart.');
    }
}
