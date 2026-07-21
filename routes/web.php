<?php

use App\Http\Controllers\PicController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SupplierController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/supplier', [SupplierController::class, 'index'])->name('supplier.index');
    Route::post('/supplier', [SupplierController::class, 'store'])->name('supplier.store');
    Route::get('/supplier/{supplier}', [SupplierController::class, 'show'])->name('supplier.show');
    Route::put('/supplier/{supplier}', [SupplierController::class, 'update'])->name('supplier.update');
    Route::delete('/supplier/{supplier}', [SupplierController::class, 'destroy'])->name('supplier.destroy');
    // Route::resource('supplier', SupplierController::class)
    //     ->only(['index', 'store', 'update', 'destroy']);

    Route::get('/pic', [PicController::class, 'index'])->name('pic.index');
    Route::post('/pic', [PicController::class, 'store'])->name('pic.store');
    Route::get('/pic/{pic}', [PicController::class, 'show'])->name('pic.show');
    Route::put('/pic/{pic}', [PicController::class, 'update'])->name('pic.update');
    Route::delete('/pic/{pic}', [PicController::class, 'destroy'])->name('pic.destroy');
});

require __DIR__.'/auth.php';
