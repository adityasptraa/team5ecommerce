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

// admin
// Route::get('/admin', [AdminController::class, 'edit'])->name('admin.dashboard');
// Route::get('/admin', [AdminController::class, 'show'])->name('admin.dashboard');
Route::get('/admin', [ProductController::class, 'index'])->name('admin.dashboard');
// Route::get('/product', [AdminController::class, 'index'])->name('admin.index');
// Route::get('/product/{id}', [AdminController::class, 'show'])->name('admin.show');
Route::get('/create', [AdminController::class, 'create'])->name('transfer.create');
Route::post('/create', [AdminController::class, 'store'])->name('transfer.store');

Route::resource('/product', ProductController::class);

// Route::get('/admin', function () {
//     return view('admin.dashboard');
// });
// Route::prefix('admin')->name('admin.')->group(function () {
//     Route::resource('admin', AdminController::class);
// });


