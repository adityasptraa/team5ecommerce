<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

// temporary
// Route::get('/login', function () {
//     return 'Login page sementara';
// })->name('login');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    
    
});

//Route admin
// Dashboard Admin
Route::get('/admin', [ProductController::class, 'index'])->name('admin.dashboard');

// // CRUD Produk di /admin/products
// Route::get('/admin/products', [ProductController::class, 'index'])->name('admin.index');
// Route::get('/admin/products/create', [ProductController::class, 'create'])->name('admin.Create');
// Route::post('/admin/products', [ProductController::class, 'store'])->name('admin.store');

// Route::get('/admin/products/{id}/edit', [ProductController::class, 'edit'])->name('admin.Edit');
// Route::put('/admin/products/{id}', [ProductController::class, 'update'])->name('admin.update');

// Route::delete('/admin/products/{id}', [ProductController::class, 'destroy'])->name('admin.Destroy');

Route::resource('/product', ProductController::class);



// Route::get('/admin/create', [ProductController::class, 'create'])->name('admin.Create');


