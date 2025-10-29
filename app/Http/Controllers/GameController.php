<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game;

class GameController extends Controller
{
    public function index(Request $request)
    {
        $query = Game::query();

        if ($request->filled('search')) {
            $query->where('title', 'like', '%' . $request->search . '%');
        }

        $games = $query->get();

        return view('store.index', compact('games'));
    }

    public function show($id)
    {
        $game = Game::findOrFail($id);
        return view('store.show', compact('game'));
    }
}
