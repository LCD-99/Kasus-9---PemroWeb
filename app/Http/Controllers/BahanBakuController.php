<?php

namespace App\Http\Controllers;

use App\Models\BahanBaku;
use Illuminate\Http\Request;

class BahanBakuController extends Controller
{
    public function index()
    {
        $bahanBaku = BahanBaku::all();
        return view('bahan_baku.index', compact('bahanBaku'));
    }

    public function create()
    {
        return view('bahan_baku.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_bahan' => 'required|string|max:255',
            'jumlah' => 'required|integer',
            'harga' => 'required|numeric',
        ]);

        BahanBaku::create([
            'nama_bahan' => $request->nama_bahan,
            'jumlah' => $request->jumlah,
            'harga' => $request->harga,
        ]);

        return redirect()->route('bahan_baku.index');
    }

    public function edit(BahanBaku $bahanBaku)
    {
        return view('bahan_baku.edit', compact('bahanBaku'));
    }

    public function update(Request $request, BahanBaku $bahanBaku)
    {
        $request->validate([
            'nama_bahan' => 'required|string|max:255',
            'jumlah' => 'required|integer',
            'harga' => 'required|numeric',
        ]);

        $bahanBaku->update([
            'nama_bahan' => $request->nama_bahan,
            'jumlah' => $request->jumlah,
            'harga' => $request->harga,
        ]);

        return redirect()->route('bahan_baku.index');
    }

    public function destroy(BahanBaku $bahanBaku)
    {
        $bahanBaku->delete();
        return redirect()->route('bahan_baku.index');
    }
}
