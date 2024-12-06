<?php


namespace App\Http\Controllers;

use App\Models\JadwalProduksi;
use App\Models\AlokasiBahanBaku;
use App\Models\BahanBaku;
use App\Models\Product;
use App\Models\Produk;
use Illuminate\Http\Request;

class ManajerController extends Controller
{
    // Jadwal Produksi
    public function indexJadwalProduksi()
    {
    // Ambil semua jadwal produksi beserta nama produk
    $jadwals = JadwalProduksi::with('produk')->get();
    
    return view('manajer.jadwal_produksi.index', compact('jadwals'));
    }

    public function createJadwalProduksi()
    {
        $products = Product::all(); // Mengambil semua produk
        return view('manajer.jadwal_produksi.create', compact('products'));
    }

    public function storeJadwalProduksi(Request $request)
    {
    // Validasi input
    $request->validate([
        'produk_id' => 'required|exists:products,id',
        'tanggal_produksi' => 'required|date',
        'jumlah_produksi' => 'required|integer',
    ]);

    // Menyimpan data ke tabel jadwal_produksi
    JadwalProduksi::create([
        'produk_id' => $request->produk_id,
        'tanggal_produksi' => $request->tanggal_produksi,
        'jumlah_produksi' => $request->jumlah_produksi,
    ]);

    // Redirect kembali dengan pesan sukses
    return redirect()->route('manajer.jadwal_produksi.index')
                     ->with('success', 'Jadwal Produksi berhasil disimpan');
    }
    
    

    public function editJadwalProduksi($id)
    {
        $jadwal = JadwalProduksi::findOrFail($id);
        $products = Product::all(); // Untuk menampilkan data produk di form edit
        return view('manajer.jadwal_produksi.edit', compact('jadwal', 'products'));
    }

    public function updateJadwalProduksi(Request $request, $id)
    {
        $validated = $request->validate([
            'produk_id' => 'required|exists:products,id',
            'tanggal_produksi' => 'required|date',
            'jumlah_produksi' => 'required|integer',
        ]);
    
        $jadwal = JadwalProduksi::findOrFail($id);
        $jadwal->update($validated);
    
        return redirect()->route('manajer.jadwal_produksi.index')->with('success', 'Jadwal Produksi berhasil diperbarui!');
    }

    public function destroyJadwalProduksi($id)
    {
     // Cari data jadwal berdasarkan ID
     $jadwal = JadwalProduksi::findOrFail($id);
    
     // Hapus data jadwal
     $jadwal->delete();
     
     // Kembali ke halaman index setelah penghapusan
     return redirect()->route('manajer.jadwal_produksi.index')->with('success', 'Jadwal Produksi berhasil dihapus');
    }

 // Menampilkan alokasi bahan baku
 public function indexAlokasiBahanBaku()
 {
     // Mengambil alokasi bahan baku bersama dengan data produk (stok)
     $alokasiBahanBaku = AlokasiBahanBaku::with(['jadwalProduksi', 'bahanBaku', 'jadwalProduksi.produk'])->get();
 
     return view('manajer.alokasi_bahan_baku.index', compact('alokasiBahanBaku'));
 }

 // Menampilkan form untuk menambah alokasi bahan baku
 public function createAlokasiBahanBaku()
 {
     $bahanBakus = BahanBaku::all();
     $jadwals = JadwalProduksi::with('produk')->get();
     return view('manajer.alokasi_bahan_baku.create', compact('bahanBakus', 'jadwals'));
 }

 // Menyimpan alokasi bahan baku
 public function storeAlokasiBahanBaku(Request $request)
 {
     // Validasi input
     $request->validate([
         'produk_id' => 'required|exists:jadwal_produksi,id', // Memastikan produk_id ada di tabel jadwal_produksi
         'bahan_baku_id' => 'required|exists:bahan_baku,id', // Memastikan bahan_baku_id ada di tabel bahan_baku
         'jumlah_bahan_baku' => 'required|numeric|min:1', // Validasi jumlah bahan baku
     ]);
 
     // Pastikan jumlah bahan baku tidak melebihi jumlah yang tersedia di tabel bahan_baku
     $bahanBaku = BahanBaku::find($request->bahan_baku_id);
     if ($request->jumlah_bahan_baku > $bahanBaku->jumlah) {
         return back()->withErrors(['jumlah_bahan_baku' => 'Jumlah bahan baku melebihi stok yang tersedia.']);
     }
 
     // Simpan alokasi bahan baku
     AlokasiBahanBaku::create([
         'jadwal_produksi_id' => $request->produk_id,
         'bahan_baku_id' => $request->bahan_baku_id,
         'jumlah_bahan_baku' => $request->jumlah_bahan_baku,
     ]);
 
     // Redirect ke halaman index dengan pesan sukses
     return redirect()->route('manajer.alokasi_bahan_baku.index')
                      ->with('success', 'Alokasi bahan baku berhasil ditambahkan.');
 }
 public function editAlokasiBahanBaku($id)
 {
     // Ambil data alokasi berdasarkan ID
     $alokasi = AlokasiBahanBaku::findOrFail($id);
 
     // Ambil data jadwal produksi dan bahan baku untuk dropdown
     $jadwals = JadwalProduksi::with('produk')->get();
     $bahanBakus = BahanBaku::all();
 
     // Kirim data ke view
     return view('manajer.alokasi_bahan_baku.edit', compact('alokasi', 'jadwals', 'bahanBakus'));
 }
 
 // Update alokasi bahan baku
 public function updateAlokasiBahanBaku(Request $request, $id)
 {
    // Cari data alokasi bahan baku berdasarkan ID
    $alokasi = AlokasiBahanBaku::findOrFail($id);

    // Validasi input data
    $validated = $request->validate([
        'produk_id' => 'required|exists:products,id',
        'bahan_baku_id' => 'required|exists:bahan_baku,id',
        'jumlah_bahan_baku' => 'required|numeric',
    ]);

    // Update data alokasi bahan baku
    $alokasi->update([
        'produk_id' => $validated['produk_id'],
        'bahan_baku_id' => $validated['bahan_baku_id'],
        'jumlah_bahan_baku' => $validated['jumlah_bahan_baku'],
        // pastikan kolom lain yang ingin diupdate ditambahkan di sini
    ]);

    // Redirect kembali dengan pesan sukses
    return redirect()->route('manajer.alokasi_bahan_baku.index')->with('success', 'Alokasi bahan baku berhasil diperbarui.');
 }

 // Menghapus alokasi bahan baku
 public function destroyAlokasiBahanBaku($id)
 {
     $alokasi = AlokasiBahanBaku::find($id);
     $alokasi->delete();
     return redirect()->route('manajer.alokasi_bahan_baku.index')->with('success', 'Alokasi bahan baku berhasil dihapus.');
 }
 public function dashboard()
{
    return view('manajer.dashboard');  // Ganti dengan tampilan dashboard yang sesuai
}
 
}
