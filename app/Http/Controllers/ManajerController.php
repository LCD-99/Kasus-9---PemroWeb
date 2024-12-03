<?php


namespace App\Http\Controllers;

use App\Models\JadwalProduksi;
use App\Models\AlokasiBahanBaku;
use App\Models\BahanBaku;
use App\Models\Produk;
use Illuminate\Http\Request;

class ManajerController extends Controller
{
    // Jadwal Produksi
    public function indexJadwalProduksi()
    {
        $jadwals = JadwalProduksi::all();
        return view('manajer.jadwal_produksi.index', compact('jadwals'));
    }

    public function createJadwalProduksi()
    {
        $produks = Produk::all();
        return view('manajer.jadwal_produksi.create', compact('produks'));
    }

    public function storeJadwalProduksi(Request $request)
    {
        JadwalProduksi::create($request->all());
        return redirect()->route('manajer.jadwal_produksi.index')->with('success', 'Jadwal produksi berhasil ditambahkan.');
    }

    public function editJadwalProduksi($id)
    {
        $jadwal = JadwalProduksi::findOrFail($id);
        $produks = Produk::all();
        return view('manajer.jadwal_produksi.edit', compact('jadwal', 'produks'));
    }

    public function updateJadwalProduksi(Request $request, $id)
    {
        $jadwal = JadwalProduksi::findOrFail($id);
        $jadwal->update($request->all());
        return redirect()->route('manajer.jadwal_produksi.index')->with('success', 'Jadwal produksi berhasil diperbarui.');
    }

    public function destroyJadwalProduksi($id)
    {
        $jadwal = JadwalProduksi::findOrFail($id);
        $jadwal->delete();
        return redirect()->route('manajer.jadwal_produksi.index')->with('success', 'Jadwal produksi berhasil dihapus.');
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
