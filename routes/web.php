<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\IncomingStockController;
use App\Http\Controllers\OutgoingStockController;
use App\Http\Controllers\PicController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SummaryController;
use App\Http\Controllers\SupplierController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

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

    Route::get('/product', [ProductController::class, 'index'])->name('product.index');
    Route::post('/product', [ProductController::class, 'store'])->name('product.store');
    Route::get('/product/{product}', [ProductController::class, 'show'])->name('product.show');
    Route::put('/product/{product}', [ProductController::class, 'update'])->name('product.update');
    Route::delete('/product/{product}', [ProductController::class, 'destroy'])->name('product.destroy');

    Route::get('/incoming-stock', [IncomingStockController::class, 'index'])->name('incoming.index');
    Route::post('/incoming-stock', [IncomingStockController::class, 'store'])->name('incoming.store');
    Route::get('/incoming-stock/{incomingStock}', [IncomingStockController::class, 'show'])->name('incoming.show');
    Route::put('/incoming-stock/{incomingStock}', [IncomingStockController::class, 'update'])->name('incoming.update');
    Route::delete('/incoming-stock/{incomingStock}', [IncomingStockController::class, 'destroy'])->name('incoming.destroy');

    Route::get('/outgoing-stock', [OutgoingStockController::class, 'index'])->name('incoming.index');
    Route::post('/outgoing-stock', [OutgoingStockController::class, 'store'])->name('outgoing.store');
    Route::get('/outgoing-stock/{outgoingStock}', [OutgoingStockController::class, 'show'])->name('outgoing.show');
    Route::put('/outgoing-stock/{outgoingStock}', [OutgoingStockController::class, 'update'])->name('outgoing.update');
    Route::delete('/outgoing-stock/{outgoingStock}', [OutgoingStockController::class, 'destroy'])->name('outgoing.destroy');
    
    Route::get('/summary-stock', [SummaryController::class, 'index'])->name('summary.index');
    Route::post('/summary-stock/export', [SummaryController::class, 'export'])->name('summary.export');
});

require __DIR__.'/auth.php';
