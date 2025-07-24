<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
// Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {

//     // Tambahan route dummy buat contoh
//     Route::get('/users', fn() => 'Kelola User')->name('admin.users.index');
//     Route::get('/orders', fn() => 'Lihat Pesanan')->name('admin.orders.index');
//     Route::get('/products', fn() => 'Kelola Produk')->name('admin.products.index');
// });

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// Route::middleware(['auth'])->group(function () {
//     Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
// });

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';



Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');

    // Tambahan route dummy buat contoh
    Route::get('/users', fn() => 'Kelola User')->name('admin.users.index');
    Route::get('/orders', fn() => 'Lihat Pesanan')->name('admin.orders.index');
    Route::get('/products', fn() => 'Kelola Produk')->name('admin.products.index');
});


