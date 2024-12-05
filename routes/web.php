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
use App\Http\Controllers\StaffController;
use App\Http\Controllers\LaporanController;

Route::get('/admin/laporan', [LaporanController::class, 'index'])->name('admin.laporan.index');


Route::prefix('staff')->name('staff.')->group(function () {
    // Admin routes for managing bahan baku (CRUD)
    Route::middleware('admin')->group(function() {
        Route::get('bahan-baku', [StaffController::class, 'bahanBakuIndex'])->name('bahan_baku.index');
        Route::get('bahan-baku/create', [StaffController::class, 'bahanBakuCreate'])->name('bahan_baku.create');
        Route::post('bahan-baku/store', [StaffController::class, 'bahanBakuStore'])->name('bahan_baku.store');
        Route::get('bahan-baku/edit/{id}', [StaffController::class, 'bahanBakuEdit'])->name('bahan_baku.edit');
        Route::post('bahan-baku/update/{id}', [StaffController::class, 'bahanBakuUpdate'])->name('bahan_baku.update');
        Route::get('bahan-baku/destroy/{id}', [StaffController::class, 'bahanBakuDestroy'])->name('bahan_baku.destroy');
    });

    // Staff routes for viewing bahan baku
    Route::get('bahan-baku', [StaffController::class, 'bahanBakuIndex'])->name('bahan_baku.index');
});

Route::get('pengeluaran-bahan-baku', [PengeluaranBahanBakuController::class, 'index'])->name('pengeluaran_bahan_baku.index');


// Route untuk menyimpan data pemasukan
Route::post('/pemasukan', [PemasukanController::class, 'store'])->name('pemasukan.store');
// Route untuk halaman index pemasukan
Route::get('/pemasukan', [PemasukanController::class, 'index'])->name('pemasukan.index');

// Route untuk menambah pemasukan (form tambah data)
Route::get('/pemasukan/create', [PemasukanController::class, 'create'])->name('pemasukan.create');

// Menampilkan daftar penerimaan bahan baku
Route::get('penerimaan-bahan-baku', [PenerimaanBahanBakuController::class, 'index'])->name('penerimaan_bahan_baku.index');

// Menampilkan form untuk menambah penerimaan bahan baku
Route::get('penerimaan-bahan-baku/create', [PenerimaanBahanBakuController::class, 'create'])->name('penerimaan_bahan_baku.create');

// Menyimpan penerimaan bahan baku
Route::post('penerimaan-bahan-baku', [PenerimaanBahanBakuController::class, 'store'])->name('penerimaan_bahan_baku.store');

// Menampilkan form untuk mengedit penerimaan bahan baku
Route::get('penerimaan-bahan-baku/{penerimaan}/edit', [PenerimaanBahanBakuController::class, 'edit'])->name('penerimaan_bahan_baku.edit');

// Memperbarui data penerimaan bahan baku
Route::put('penerimaan-bahan-baku/{penerimaan}', [PenerimaanBahanBakuController::class, 'update'])->name('penerimaan_bahan_baku.update');

// Menghapus penerimaan bahan baku
Route::delete('penerimaan-bahan-baku/{penerimaan}', [PenerimaanBahanBakuController::class, 'destroy'])->name('penerimaan_bahan_baku.destroy');


Route::resource('penerimaan_bahan_baku.index', PenerimaanBahanBakuController::class);

Route::resource('penerimaan_bahan_baku', PenerimaanBahanBakuController::class);



Route::middleware(['auth', 'role:manager'])->prefix('manajer')->group(function () {

    Route::get('dashboard', [ManajerController::class, 'dashboard'])->name('dashboard');
    // Route untuk mengelola jadwal produksi
    Route::get('jadwal_produksi', [ManajerController::class, 'indexJadwalProduksi'])->name('manajer.jadwal_produksi.index');
    
    // Route untuk form tambah jadwal produksi
    Route::get('jadwal_produksi/create', [ManajerController::class, 'createJadwalProduksi'])->name('manajer.jadwal_produksi.create');
    
    // Route untuk menyimpan jadwal produksi
    Route::post('jadwal_produksi', [ManajerController::class, 'storeJadwalProduksi'])->name('manajer.jadwal_produksi.store');

    // Route untuk menampilkan alokasi bahan baku
    Route::get('alokasi_bahan_baku', [ManajerController::class, 'indexAlokasiBahanBaku'])->name('alokasi_bahan_baku.index');
        
    // Route untuk form create alokasi bahan baku (untuk fitur create nanti)
    Route::get('alokasi_bahan_baku/create', [ManajerController::class, 'createAlokasiBahanBaku'])->name('alokasi_bahan_baku.create');
    
    // Route untuk form edit alokasi bahan baku (untuk fitur edit nanti)
    Route::get('alokasi_bahan_baku/{id}/edit', [ManajerController::class, 'editAlokasiBahanBaku'])->name('alokasi_bahan_baku.edit');

    // Route untuk menghapus jadwal produksi
    Route::delete('jadwal_produksi/{id}', [ManajerController::class, 'destroyJadwalProduksi'])->name('manajer.jadwal_produksi.destroy');

    Route::post('alokasi_bahan_baku', [ManajerController::class, 'storeAlokasiBahanBaku'])->name('manajer.alokasi_bahan_baku.store');

    // Route untuk menampilkan form edit
    Route::get('alokasi_bahan_baku/{id}/edit', [ManajerController::class, 'editAlokasiBahanBaku'])->name('manajer.alokasi_bahan_baku.edit');

    // Route untuk mengupdate data
    Route::put('alokasi_bahan_baku/{id}', [ManajerController::class, 'updateAlokasiBahanBaku'])->name('manajer.alokasi_bahan_baku.update');

    // Route untuk Dashboard Manajer 
    Route::get('manajer/dashboard', [ManajerController::class, 'dashboard'])->name('dashboard');



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