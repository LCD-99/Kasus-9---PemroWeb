<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AlokasiBahanBaku extends Model
{
    use HasFactory;

    protected $table = 'alokasi_bahan_baku';
    protected $fillable = ['jadwal_produksi_id', 'bahan_baku_id', 'jumlah_bahan_baku'];

    // Relasi ke tabel JadwalProduksi
    public function jadwalProduksi()
    {
        return $this->belongsTo(JadwalProduksi::class, 'jadwal_produksi_id');
    }

    // Relasi ke tabel BahanBaku
    public function bahanBaku()
    {
        return $this->belongsTo(BahanBaku::class, 'bahan_baku_id');
    }
}
