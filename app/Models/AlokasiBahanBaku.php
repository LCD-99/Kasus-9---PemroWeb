<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AlokasiBahanBaku extends Model
{
    use HasFactory;

    protected $fillable = ['bahan_baku_id', 'jadwal_produksi_id', 'jumlah'];

    public function bahanBaku()
    {
        return $this->belongsTo(BahanBaku::class);
    }

    public function jadwalProduksi()
    {
        return $this->belongsTo(JadwalProduksi::class);
    }
}