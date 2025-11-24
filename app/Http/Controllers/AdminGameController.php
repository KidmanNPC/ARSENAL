<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game;

class AdminGameController extends Controller
{
    // 1. Tampilkan Form
    public function create()
    {
        return view('admin.create');
    }

    // 2. Simpan Data ke Database
    public function store(Request $request)
    {
        // Validasi input agar tidak kosong
        $request->validate([
            'title' => 'required|string|max:255',
            'price' => 'required|integer',
            'description' => 'required|string',
            'image_url' => 'required|url',
        ]);

        // Simpan ke database games
        Game::create([
            'title' => $request->title,
            'price' => $request->price,
            'description' => $request->description,
            'image' => $request->image_url,
        ]);

        // Balik ke halaman store dengan pesan sukses
        return redirect()->route('store.index')->with('success', 'Game berhasil ditambahkan!');
    }
}