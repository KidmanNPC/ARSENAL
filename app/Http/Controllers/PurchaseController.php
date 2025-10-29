<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Purchase;

class PurchaseController extends Controller
{
    public function index()
    {
        $userId = Auth::id() ?? DB::table('users')->where('email','test@example.com')->value('id');

        $purchases = Purchase::with('game')->where('user_id', $userId)->orderBy('purchased_at','desc')->get();

        return view('purchases.index', compact('purchases'));
    }
}
