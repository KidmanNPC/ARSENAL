<?php

namespace App\Http\Controllers;

// Tambahkan use statement ini
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

abstract class Controller
{
    /**
     * Mendapatkan ID user yang aktif.
     * Mengutamakan user yang login, jika tidak ada, cari user 'test@example.com'.
     */
    protected function getActiveUserId(): ?int
    {
        $userId = Auth::id();
        
        if (!$userId) {
            $userId = DB::table('users')->where('email', 'test@example.com')->value('id');
        }

        return $userId;
    }
}