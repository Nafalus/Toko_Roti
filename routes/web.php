<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\JenisRotiController;
use App\Http\Controllers\Admin\ProdukController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [UserController::class, 'index'])->name('home');
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store'])->name('login.store');
Route::get('/register', [LoginController::class, 'register'])->name('register');
Route::post('/register', [LoginController::class, 'registerStore'])->name('register.store');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/ourlocation', [UserController::class, 'ourlocation'])->name('ourlocation');

Route::middleware('auth')->group(function () {
    Route::get('/catalog', [UserController::class, 'catalog'])->name('catalog');
    Route::get('/catalog/{id}', [UserController::class, 'show'])->name('catalog.show');
    Route::get('/cart', [UserController::class, 'cart'])->name('cart');

    Route::get('/jenis-kue', [JenisRotiController::class, 'index'])->name('jenis_kue.index');
    Route::post('/jenis-kue', [JenisRotiController::class, 'store'])->name('jenis_kue.store');
    Route::put('/jenis-kue/update/{id}', [JenisRotiController::class, 'update'])->name('jenis_kue.update');
    Route::delete('/jenis-kue/destroy/{id}', [JenisRotiController::class, 'destroy'])->name('jenis_kue.destroy');

    Route::get('/produk', [ProdukController::class, 'index'])->name('produk.index');
    Route::post('/produk', [ProdukController::class, 'store'])->name('produk.store');
    Route::put('/produk/update/{id}', [ProdukController::class, 'update'])->name('produk.update');
    Route::delete('/produk/destroy/{id}', [ProdukController::class, 'destroy'])->name('produk.destroy');
});
