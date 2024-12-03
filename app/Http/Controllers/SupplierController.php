<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    // Menampilkan daftar supplier
    public function index()
    {
        $suppliers = Supplier::all();  // Ambil semua data supplier
        return view('admin.suppliers.index', compact('suppliers'));
    }

    // Menampilkan form untuk menambah supplier baru
    public function create()
    {
        return view('admin.suppliers.create');
    }

    // Menyimpan data supplier baru
    public function store(Request $request)
    {
        $request->validate([
            'nama_supplier' => 'required|string|max:255',
            'alamat' => 'required|string',
            'kontak' => 'required|string',
        ]);
    
        // Hanya mengambil data yang diizinkan (tidak termasuk _token)
        $data = $request->only('nama_supplier', 'alamat', 'kontak');
    
        // Menyimpan data ke model Supplier
        Supplier::create($data);
    
        // Redirect dengan pesan sukses
        return redirect()->route('suppliers.index')->with('success', 'Supplier berhasil ditambahkan');
    }

    // Menampilkan form untuk mengedit supplier
    public function edit($id)
    {
        $supplier = Supplier::findOrFail($id);
        return view('admin.suppliers.edit', compact('supplier'));
    }

    // Mengupdate data supplier
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_supplier' => 'required|string|max:255',
            'alamat' => 'required|string',
            'kontak' => 'required|string',
        ]);

        $supplier = Supplier::findOrFail($id);
        $supplier->update($request->all());

        return redirect()->route('suppliers.index')->with('success', 'Supplier berhasil diperbarui');
    }

    // Menghapus supplier
    public function destroy($id)
    {
        $supplier = Supplier::findOrFail($id);
        $supplier->delete();

        return redirect()->route('suppliers.index')->with('success', 'Supplier berhasil dihapus');
    }
}
