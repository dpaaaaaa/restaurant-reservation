<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\MejaController;
use App\Http\Controllers\ReservasiController;
use App\Http\Controllers\PelangganController;
use Illuminate\Support\Facades\Auth;

// Route untuk halaman utama
Route::get('/', function () {
    return view('home');
});

// Routes untuk autentikasi (login dan register)
Auth::routes();

// Group routes yang membutuhkan autentikasi
Route::group(['middleware' => ['auth']], function () {

    // Route untuk dashboard/home
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    // Routes untuk masing-masing tabel menggunakan metode CRUD
    // Karyawan Routes
    Route::get('karyawan', [KaryawanController::class, 'index'])->name('karyawan.index');
    Route::get('karyawan/create', [KaryawanController::class, 'create'])->name('karyawan.create');
    Route::post('karyawan', [KaryawanController::class, 'store'])->name('karyawan.store');
    Route::get('karyawan/{id}/edit', [KaryawanController::class, 'edit'])->name('karyawan.edit');
    Route::put('karyawan/{id}', [KaryawanController::class, 'update'])->name('karyawan.update');
    Route::delete('karyawan/{id}', [KaryawanController::class, 'destroy'])->name('karyawan.destroy');

    // Pembayaran Routes
    Route::get('pembayaran', [PembayaranController::class, 'index'])->name('pembayaran.index');
    Route::get('pembayaran/create', [PembayaranController::class, 'create'])->name('pembayaran.create');
    Route::post('pembayaran', [PembayaranController::class, 'store'])->name('pembayaran.store');
    Route::get('pembayaran/{id}/edit', [PembayaranController::class, 'edit'])->name('pembayaran.edit');
    Route::put('pembayaran/{id}', [PembayaranController::class, 'update'])->name('pembayaran.update');
    Route::delete('pembayaran/{id}', [PembayaranController::class, 'destroy'])->name('pembayaran.destroy');

    // Pesanan Routes
    Route::get('pesanan', [PesananController::class, 'index'])->name('pesanan.index');
    Route::get('pesanan/create', [PesananController::class, 'create'])->name('pesanan.create');
    Route::post('pesanan', [PesananController::class, 'store'])->name('pesanan.store');
    Route::get('pesanan/{id}/edit', [PesananController::class, 'edit'])->name('pesanan.edit');
    Route::put('pesanan/{id}', [PesananController::class, 'update'])->name('pesanan.update');
    Route::delete('pesanan/{id}', [PesananController::class, 'destroy'])->name('pesanan.destroy');

    // Menu Routes
    Route::get('menu', [MenuController::class, 'index'])->name('menu.index');
    Route::get('menu/create', [MenuController::class, 'create'])->name('menu.create');
    Route::post('menu', [MenuController::class, 'store'])->name('menu.store');
    Route::get('menu/{id}/edit', [MenuController::class, 'edit'])->name('menu.edit');
    Route::put('menu/{id}', [MenuController::class, 'update'])->name('menu.update');
    Route::delete('menu/{id}', [MenuController::class, 'destroy'])->name('menu.destroy');

    // Meja Routes
    Route::get('meja', [MejaController::class, 'index'])->name('meja.index');
    Route::get('meja/create', [MejaController::class, 'create'])->name('meja.create');
    Route::post('meja', [MejaController::class, 'store'])->name('meja.store');
    Route::get('meja/{id}/edit', [MejaController::class, 'edit'])->name('meja.edit');
    Route::put('meja/{id}', [MejaController::class, 'update'])->name('meja.update');
    Route::delete('meja/{id}', [MejaController::class, 'destroy'])->name('meja.destroy');

    // Reservasi Routes
    Route::get('reservasi', [ReservasiController::class, 'index'])->name('reservasi.index');
    Route::get('reservasi/create', [ReservasiController::class, 'create'])->name('reservasi.create');
    Route::post('reservasi', [ReservasiController::class, 'store'])->name('reservasi.store');
    Route::get('reservasi/{id}/edit', [ReservasiController::class, 'edit'])->name('reservasi.edit');
    Route::put('reservasi/{id}', [ReservasiController::class, 'update'])->name('reservasi.update');
    Route::delete('reservasi/{id}', [ReservasiController::class, 'destroy'])->name('reservasi.destroy');

    // Pelanggan Routes
    Route::get('pelanggan', [PelangganController::class, 'index'])->name('pelanggan.index');
    Route::get('pelanggan/create', [PelangganController::class, 'create'])->name('pelanggan.create');
    Route::post('pelanggan', [PelangganController::class, 'store'])->name('pelanggan.store');
    Route::get('pelanggan/{id}/edit', [PelangganController::class, 'edit'])->name('pelanggan.edit');
    Route::put('pelanggan/{id}', [PelangganController::class, 'update'])->name('pelanggan.update');
    Route::delete('pelanggan/{id}', [PelangganController::class, 'destroy'])->name('pelanggan.destroy');
});

