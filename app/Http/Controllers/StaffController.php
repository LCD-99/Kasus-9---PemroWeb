<?php

namespace App\Http\Controllers;

use App\Models\BahanBaku;
use App\Models\Staff;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    // Menampilkan daftar staff
    public function index()
    {
        $staff = Staff::all();
        return view('staff.index', compact('staff'));
    }


    // Menampilkan form untuk menambah staff
    public function create()
    {
        return view('staff.create');
    }

    // Menyimpan staff baru
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
        ]);

        Staff::create([
            'nama' => $request->nama,
            'jabatan' => $request->jabatan,
        ]);

        return redirect()->route('staff.index');
    }

    // Menampilkan form untuk mengedit data staff
    public function edit($id)
    {
        $staff = Staff::findOrFail($id);
        return view('staff.edit', compact('staff'));
    }

    // Mengupdate data staff
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
        ]);

        $staff = Staff::findOrFail($id);
        $staff->update([
            'nama' => $request->nama,
            'jabatan' => $request->jabatan,
        ]);

        return redirect()->route('staff.index');
    }

    // Menghapus data staff
    public function destroy($id)
    {
        $staff = Staff::findOrFail($id);
        $staff->delete();

        return redirect()->route('staff.index');
    }

    // CRUD untuk BahanBaku
    // Menampilkan daftar bahan baku
    public function bahanBakuIndex()
{
    $bahanBaku = BahanBaku::all();  // Ambil semua data bahan baku
    return view('staff.bahan_baku.index', compact('bahanBaku'));
}
    public function bahanBakuCreate()
    {
        return view('staff.bahan_baku.create');
    }

    // Menyimpan bahan baku baru
    public function bahanBakuStore(Request $request)
    {
        $request->validate([
            'nama_bahan_baku' => 'required|string|max:255',
            'stok' => 'required|integer|min:0',
        ]);

        BahanBaku::create([
            'nama_bahan_baku' => $request->nama_bahan_baku,
            'stok' => $request->stok,
        ]);

        return redirect()->route('staff.bahan_baku.index');
    }

    // Menampilkan form untuk mengedit bahan baku
    public function bahanBakuEdit($id)
    {
        $bahanBaku = BahanBaku::findOrFail($id);
        return view('staff.bahan_baku.edit', compact('bahanBaku'));
    }

    // Mengupdate data bahan baku
    public function bahanBakuUpdate(Request $request, $id)
    {
        $request->validate([
            'nama_bahan_baku' => 'required|string|max:255',
            'stok' => 'required|integer|min:0',
        ]);

        $bahanBaku = BahanBaku::findOrFail($id);
        $bahanBaku->update([
            'nama_bahan_baku' => $request->nama_bahan_baku,
            'stok' => $request->stok,
        ]);

        return redirect()->route('staff.bahan_baku.index');
    }

    // Menghapus bahan baku
    public function bahanBakuDestroy($id)
    {
        $bahanBaku = BahanBaku::findOrFail($id);
        $bahanBaku->delete();

        return redirect()->route('staff.bahan_baku.index');
    }
}
