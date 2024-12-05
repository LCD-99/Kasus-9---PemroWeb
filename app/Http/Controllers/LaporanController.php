<?php

namespace App\Http\Controllers;

namespace App\Http\Controllers;

use App\Models\Produksi;
use App\Models\PenggunaanBahanBaku;
use App\Models\StokBarang;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    // Menampilkan laporan produksi, penggunaan bahan baku, dan stok barang
    public function index()
    {
        // Ambil data dari model terkait
        $product = Produksi::all();
        $bahan_baku = PenggunaanBahanBaku::all();
        $stok_barang = StokBarang::all();

        return view('admin.laporan.index', compact('produksi', 'penggunaan_bahan_baku', 'stok_barang'));
    }
}
