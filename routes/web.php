<?php

use App\Http\Controllers\admin\Dashboard;
use App\Http\Controllers\admin\JabatanController;
use App\Http\Controllers\admin\KasirController;
use App\Http\Controllers\admin\Kategori;
use App\Http\Controllers\admin\LoginController;
use App\Http\Controllers\admin\PegawaiController;
use App\Http\Controllers\admin\PelangganController;
use App\Http\Controllers\admin\StoreController;
use App\Http\Controllers\admin\PenggunaController;
use App\Http\Controllers\admin\PenjualanController;
use App\Http\Controllers\admin\ProdukController;
use App\Http\Controllers\admin\ShifkerjaController;
use App\Http\Middleware\LoginMiddleware;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [LoginController::class, 'index'])->name('login');
Route::post('/', [LoginController::class, 'login'])->name('act_login');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware([LoginMiddleware::class])->group(function () {
    Route::get('/dashboard', [Dashboard::class, 'index'])->name('dashboard');
    Route::get('/kategori', [Kategori::class, 'index'])->name('kategori');
    Route::post('/kategori', [Kategori::class, 'create'])->name('kategori.create');
    Route::put('/kategori/{id}', [Kategori::class, 'update'])->name('kategori.update');
    Route::delete('/kategori/{id}', [Kategori::class, 'delete'])->name('kategori.delete');

    Route::get('/allpegawai', [PegawaiController::class, 'index'])->name('allpegawai');
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

    Route::get('/shiftkerja', [ShifkerjaController::class, 'index'])->name('shiftkerja');
    Route::post('/shiftkerja', [ShifkerjaController::class, 'create'])->name('shiftkerja.create');
    Route::put('/shiftkerja/{id}', [ShifkerjaController::class, 'update'])->name('shiftkerja.update');
    Route::delete('/shiftkerja/{id}', [ShifkerjaController::class, 'delete'])->name('shiftkerja.delete');

    Route::get('/pelanggan', [PelangganController::class, 'index'])->name('pelanggan');
    Route::post('/pelanggan', [PelangganController::class, 'create'])->name('pelanggan.create');
    Route::put('/pelanggan/{id}', [PelangganController::class, 'update'])->name('pelanggan.update');
    Route::delete('/pelanggan/{id}', [PelangganController::class, 'delete'])->name('pelanggan.delete');

    Route::get('/penjualan', [PenjualanController::class, 'index'])->name('penjualan');
    Route::post('/penjualan', [PenjualanController::class, 'create'])->name('penjualan.create');
    Route::put('/penjualan/{id}', [PenjualanController::class, 'update'])->name('penjualan.update');
    Route::delete('/penjualan/{id}', [PenjualanController::class, 'delete'])->name('penjualan.delete');

    Route::get('/jabatan', [JabatanController::class, 'index'])->name('jabatan');
    Route::post('/jabatan', [JabatanController::class, 'create'])->name('jabatan.create');
    Route::put('/jabatan/{id}', [JabatanController::class, 'update'])->name('jabatan.update');
    Route::delete('/jabatan/{id}', [JabatanController::class, 'delete'])->name('jabatan.delete');

    Route::get('/kasir', [KasirController::class, 'index'])->name('kasir');
    Route::post('/kasir', [KasirController::class, 'create'])->name('kasir.create');
    Route::delete('/hapusorder', [KasirController::class, 'delete'])->name('kasir.delete');
});
