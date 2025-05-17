<?php

use App\Http\Controllers\admin\Dashboard;
use App\Http\Controllers\admin\Kategori;
use App\Http\Controllers\admin\PegawaiController;
use App\Http\Controllers\admin\StoreController;
use App\Http\Controllers\admin\PenggunaController;
use App\Http\Controllers\admin\ProdukController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [Dashboard::class, 'index'])->name('dashboard');
Route::get('/kategori', [Kategori::class, 'index'])->name('kategori');
Route::post('/kategori', [Kategori::class, 'create'])->name('kategori.create');
Route::put('/kategori/{id}', [Kategori::class, 'update'])->name('kategori.update');
Route::delete('/kategori/{id}', [Kategori::class, 'delete'])->name('kategori.delete');

Route::get('/pegawai', [PegawaiController::class, 'index'])->name('pegawai');
Route::get('/pegawai/{id}', [PegawaiController::class, 'index'])->name('pegawai');
Route::post('/pegawai', [PegawaiController::class, 'create'])->name('pegawai.create');
Route::put('/pegawai/{id}', [PegawaiController::class, 'update'])->name('pegawai.update');
Route::delete('/pegawai/{id}', [PegawaiController::class, 'delete'])->name('pegawai.delete');

Route::get('/store', [StoreController::class, 'index'])->name('store');
Route::post('/store', [StoreController::class, 'create'])->name('store.create');
Route::put('/store/{id}', [StoreController::class, 'update'])->name('store.update');
Route::delete('/store/{id}', [StoreController::class, 'delete'])->name('store.delete');

Route::get('/pengguna', [PenggunaController::class, 'index'])->name('pengguna');
Route::post('/pengguna', [PenggunaController::class, 'create'])->name('pengguna.create');
Route::put('/pengguna/{id}', [PenggunaController::class, 'update'])->name('pengguna.update');
Route::delete('/pengguna/{id}', [PenggunaController::class, 'delete'])->name('pengguna.delete');

Route::get('/produk', [ProdukController::class, 'index'])->name('produk');
Route::post('/produk', [ProdukController::class, 'create'])->name('produk.create');
Route::put('/produk/{id}', [ProdukController::class, 'update'])->name('produk.update');
Route::delete('/produk/{id}', [ProdukController::class, 'delete'])->name('produk.delete');