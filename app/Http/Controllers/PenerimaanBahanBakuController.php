<?php

namespace App\Http\Controllers;

use App\Models\PenerimaanBahanBaku;
use App\Models\Supplier;
use App\Models\User;
use Illuminate\Http\Request;

class PenerimaanBahanBakuController extends Controller
{
    // Menampilkan daftar penerimaan bahan baku
    public function index()
    {
        $penerimaan = PenerimaanBahanBaku::with('user', 'supplier')->get();
        return view('penerimaan_bahan_baku.index', compact('penerimaan'));
    }

    // Menampilkan form untuk menambah penerimaan bahan baku
    public function create()
    {
        $users = User::all();
        $suppliers = Supplier::all();
        return view('penerimaan_bahan_baku.create', compact('users', 'suppliers'));
    }

    // Menyimpan penerimaan bahan baku
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'supplier_id' => 'required|exists:suppliers,id',
            'nama_bahan_baku' => 'required|string',
            'jumlah' => 'required|integer',
            'harga' => 'required|numeric',
            'tanggal_penerimaan' => 'required|date',
        ]);

        PenerimaanBahanBaku::create($request->all());

        return redirect()->route('penerimaan_bahan_baku.index')->with('success', 'Penerimaan bahan baku berhasil ditambahkan');
    }

    // Menampilkan form untuk mengedit penerimaan bahan baku
    public function edit(PenerimaanBahanBaku $penerimaan)
    {
        $users = User::all();
        $suppliers = Supplier::all();
        return view('penerimaan_bahan_baku.edit', compact('penerimaan', 'users', 'suppliers'));
    }

    // Memperbarui data penerimaan bahan baku
    public function update(Request $request, PenerimaanBahanBaku $penerimaan)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'supplier_id' => 'required|exists:suppliers,id',
            'nama_bahan_baku' => 'required|string',
            'jumlah' => 'required|integer',
            'harga' => 'required|numeric',
            'tanggal_penerimaan' => 'required|date',
        ]);

        $penerimaan->update($request->all());

        return redirect()->route('penerimaan_bahan_baku.index')->with('success', 'Penerimaan bahan baku berhasil diperbarui');
    }

    // Menghapus penerimaan bahan baku
    public function destroy(PenerimaanBahanBaku $penerimaan)
    {
        $penerimaan->delete();
        return redirect()->route('penerimaan_bahan_baku.index')->with('success', 'Penerimaan bahan baku berhasil dihapus');
    }
}
