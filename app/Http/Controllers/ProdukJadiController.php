<?php

namespace App\Http\Controllers;

use App\Models\ProdukJadi;
use Illuminate\Http\Request;

class ProdukJadiController extends Controller
{
    public function index()
    {
        $produkJadi = ProdukJadi::all();
        return view('produk_jadi.index', compact('produkJadi'));
    }

    public function create()
    {
        return view('produk_jadi.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_produk' => 'required|string|max:255',
            'stok' => 'required|integer',
            'harga' => 'required|numeric',
        ]);

        ProdukJadi::create([
            'nama_produk' => $request->nama_produk,
            'stok' => $request->stok,
            'harga' => $request->harga,
        ]);

        return redirect()->route('produk_jadi.index');
    }

    public function edit(ProdukJadi $produkJadi)
    {
        return view('produk_jadi.edit', compact('produkJadi'));
    }

    public function update(Request $request, ProdukJadi $produkJadi)
    {
        $request->validate([
            'nama_produk' => 'required|string|max:255',
            'stok' => 'required|integer',
            'harga' => 'required|numeric',
        ]);

        $produkJadi->update([
            'nama_produk' => $request->nama_produk,
            'stok' => $request->stok,
            'harga' => $request->harga,
        ]);

        return redirect()->route('produk_jadi.index');
    }

    public function destroy(ProdukJadi $produkJadi)
    {
        $produkJadi->delete();
        return redirect()->route('produk_jadi.index');
    }
}
