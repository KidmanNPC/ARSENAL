<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\AdminGameController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// 1. HALAMAN UTAMA -> Redirect ke Store
Route::get('/', function () {
    return redirect()->route('store.index');
});

// 2. DASHBOARD (Bawaan Breeze)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// 3. PROFILE USER (Bawaan Breeze)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// ----------------------------------------------------------------------
// 4. RUTE PUBLIK (Bisa diakses Tanpa Login)
// ----------------------------------------------------------------------

// Halaman Toko Utama
Route::get('/store', [StoreController::class, 'index'])->name('store.index');


// ----------------------------------------------------------------------
// 5. RUTE MEMBER (Wajib Login)
// ----------------------------------------------------------------------
Route::middleware(['auth'])->group(function () {
    
    // Cart (Keranjang) - Sekarang wajib login
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/add/{id}', [CartController::class, 'add'])->name('cart.add');
    Route::delete('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');

    // Checkout
    Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
    Route::post('/checkout/process', [CheckoutController::class, 'process'])->name('checkout.process');

    // Library (Riwayat Pembelian)
    Route::get('/purchases', [PurchaseController::class, 'index'])->name('purchases.index');
});

// ----------------------------------------------------------------------
// 6. RUTE ADMIN (Wajib Login + Role Admin)
// ----------------------------------------------------------------------
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/add-game', [AdminGameController::class, 'create'])->name('admin.create');
    Route::post('/admin/add-game', [AdminGameController::class, 'store'])->name('admin.store');
});

// ----------------------------------------------------------------------
// 7. AUTHENTICATION ROUTES (SANGAT PENTING!)
// ----------------------------------------------------------------------
// Baris ini memuat rute login, register, logout, dll.
// Tanpa ini, tombol "Login" di toko akan error.
require __DIR__.'/auth.php';