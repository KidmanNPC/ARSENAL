<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game;

class StoreController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $games = Game::when($search, function ($query, $search) {
            return $query->where('title', 'like', "%{$search}%");
        })->get();

        $cart = session()->get('cart', []); // Ambil cart dari session

        return view('store.index', compact('games', 'search', 'cart'));
    }
}
