<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PengeluaranBahanBakuController extends Controller
{
    public function index()
    {
        // Ambil data pengeluaran bahan baku dari database
        $pengeluaran = PengeluaranBahanBaku::all();
        
        // Kirim data ke view
        return view('pengeluaran_bahan_baku.index', compact('pengeluaran'));
    }
}
