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
use App\Http\Controllers\PenerimaanBahanBakuController;
use App\Http\Controllers\PemasukanController;

// Route untuk menyimpan data pemasukan
Route::post('/pemasukan', [PemasukanController::class, 'store'])->name('pemasukan.store');

// Route untuk halaman index pemasukan
Route::get('/pemasukan', [PemasukanController::class, 'index'])->name('pemasukan.index');

// Route untuk menambah pemasukan (form tambah data)
Route::get('/pemasukan/create', [PemasukanController::class, 'create'])->name('pemasukan.create');


Route::resource('penerimaan_bahan_baku', PenerimaanBahanBakuController::class);

Route::middleware(['auth', 'role:manager'])->prefix('manajer')->group(function () {

    Route::get('dashboard', [ManajerController::class, 'dashboard'])->name('dashboard');
    // Route untuk mengelola jadwal produksi
    Route::get('jadwal_produksi', [ManajerController::class, 'indexJadwalProduksi'])->name('manajer.jadwal_produksi.index');
    
    // Route untuk form tambah jadwal produksi
    Route::get('jadwal_produksi/create', [ManajerController::class, 'createJadwalProduksi'])->name('manajer.jadwal_produksi.create');
    
    // Route untuk menyimpan jadwal produksi
    Route::post('jadwal_produksi', [ManajerController::class, 'storeJadwalProduksi'])->name('manajer.jadwal_produksi.store');

    // Route untuk mengelola alokasi bahan baku
    Route::get('alokasi_bahan_baku', [ManajerController::class, 'indexAlokasiBahanBaku'])->name('manajer.alokasi_bahan_baku.index');

    // Route untuk form edit jadwal produksi
    Route::get('jadwal_produksi/{id}/edit', [ManajerController::class, 'editJadwalProduksi'])->name('manajer.jadwal_produksi.edit');

    // Route untuk update jadwal produksi
    Route::put('jadwal_produksi/{id}', [ManajerController::class, 'updateJadwalProduksi'])->name('manajer.jadwal_produksi.update');

    // Route untuk menghapus jadwal produksi
    Route::delete('jadwal_produksi/{id}', [ManajerController::class, 'destroyJadwalProduksi'])->name('manajer.jadwal_produksi.destroy');



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

Route::get('/stok-bahan', function () {
    return view('stok-bahan');
});

Route::get('/penerimaan-bahan', function () {
    return view('penerimaan-bahan');
});

Route::get('/pengeluaran-bahan', function () {
    return view('pengeluaran-bahan');
});