<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BahanBakuController;
use App\Http\Controllers\ProdukJadiController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\ManajerController;

Route::middleware(['auth', 'role:manager'])->prefix('manajer')->group(function () {
    Route::get('jadwal_produksi', [ManajerController::class, 'indexJadwalProduksi'])->name('manajer.jadwal_produksi.index');

    // Route untuk form tambah jadwal produksi
    Route::get('jadwal_produksi/create', [ManajerController::class, 'createJadwalProduksi'])->name('manajer.jadwal_produksi.create');
    
    // Route untuk menyimpan jadwal produksi
    Route::post('jadwal_produksi', [ManajerController::class, 'storeJadwalProduksi'])->name('manajer.jadwal_produksi.store');

});




Route::get('/admin/dashboard', [DashboardController::class, 'admin'])->middleware('auth');
Route::get('/manager/dashboard', [DashboardController::class, 'manager'])->middleware('auth');
Route::get('/staff/dashboard', [DashboardController::class, 'staff'])->middleware('auth');

Route::get('/admin/dashboard', [DashboardController::class, 'admin'])->name('admin.dashboard')->middleware('auth');
Route::get('/manager/dashboard', [DashboardController::class, 'manager'])->name('manager.dashboard')->middleware('auth');
Route::get('/staff/dashboard', [DashboardController::class, 'staff'])->name('staff.dashboard')->middleware('auth');

Route::get('/admin', [DashboardController::class, 'admin'])->middleware('role:admin');
Route::get('/manager', [DashboardController::class, 'manager'])->middleware('role:manager');
Route::get('/staff', [DashboardController::class, 'staff'])->middleware('role:staff');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::resource('/admin/bahan_baku', BahanBakuController::class)->middleware('auth', 'role:admin');
Route::resource('/admin/produk_jadi', ProdukJadiController::class)->middleware('auth', 'role:admin');

Route::middleware(['auth', 'role:admin'])->group(function () {
Route::resource('suppliers', SupplierController::class);
});

Route::resource('products', ProductController::class);

Route::resource('users', UserController::class)->middleware('auth', 'role:admin');

Route::get('/', function () {
    return view('welcome');
});
