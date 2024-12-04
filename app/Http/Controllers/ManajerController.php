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

    // Alokasi Bahan Baku
    public function indexAlokasiBahanBaku()
    {
        $alokasiBahanBaku = AlokasiBahanBaku::all();
        return view('manajer.alokasi_bahan_baku.index', compact('alokasiBahanBaku'));
    }

    public function createAlokasiBahanBaku()
    {
        $bahanBakus = BahanBaku::all();
        $jadwals = JadwalProduksi::all();
        return view('manajer.alokasi_bahan_baku.create', compact('bahanBakus', 'jadwals'));
    }

    public function storeAlokasiBahanBaku(Request $request)
    {
        AlokasiBahanBaku::create($request->all());
        return redirect()->route('manajer.alokasi_bahan_baku.index')->with('success', 'Alokasi bahan baku berhasil ditambahkan.');
    }

    public function editAlokasiBahanBaku($id)
    {
        $alokasi = AlokasiBahanBaku::findOrFail($id);
        $bahanBakus = BahanBaku::all();
        $jadwals = JadwalProduksi::all();
        return view('manajer.alokasi_bahan_baku.edit', compact('alokasi', 'bahanBakus', 'jadwals'));
    }

    public function updateAlokasiBahanBaku(Request $request, $id)
    {
        $alokasi = AlokasiBahanBaku::findOrFail($id);
        $alokasi->update($request->all());
        return redirect()->route('manajer.alokasi_bahan_baku.index')->with('success', 'Alokasi bahan baku berhasil diperbarui.');
    }

    public function destroyAlokasiBahanBaku($id)
    {
        $alokasi = AlokasiBahanBaku::findOrFail($id);
        $alokasi->delete();
        return redirect()->route('manajer.alokasi_bahan_baku.index')->with('success', 'Alokasi bahan baku berhasil dihapus.');
    }
}
