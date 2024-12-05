<?php

// app/Http/Controllers/PemasukanController.php

namespace App\Http\Controllers;

use App\Models\Pemasukan; // Pastikan model Pemasukan sudah ada
use Illuminate\Http\Request;

class PemasukanController extends Controller
{
    public function index()
{
    // Ambil semua data pemasukan dari database
    $pemasukan = Pemasukan::all();

    // Kirim data pemasukan ke view 'staff.pemasukan.index'
    return view('staff.pemasukan.index', compact('pemasukan'));
}

public function store(Request $request)
{
    // Validasi dan simpan data pemasukan ke database
$validated = $request->validate([
    'nama' => 'required|string|max:255',
    'jumlah' => 'required|numeric',
    'deskripsi' => 'required|string'
]);

// Misalnya, menggunakan model Pemasukan untuk menyimpan data
Pemasukan::create($validated);

// Redirect kembali ke halaman index dengan pesan sukses
return redirect()->route('pemasukan.index')->with('success', 'Pemasukan berhasil ditambahkan.');
}

}
