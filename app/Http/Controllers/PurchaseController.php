<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// Hapus Auth dan DB karena sudah pindah ke base Controller
// use Illuminate\Support\Facades\Auth;
// use Illuminate\Support\Facades\DB;
use App\Models\Purchase;

class PurchaseController extends Controller
{
    public function index()
    {
        // Gunakan fungsi yang sudah dibuat di base controller
        $userId = $this->getActiveUserId();

        $purchases = Purchase::with('game')->where('user_id', $userId)->orderBy('purchased_at','desc')->get();

        return view('purchases.index', compact('purchases'));
    }
}