<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BahanBaku extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_bahan', 'jumlah', 'harga'
    ];

    protected $table = 'bahan_baku'; // Pastikan nama tabel sesuai

    // Relasi satu-ke-banyak (One to Many) dengan PenerimaanBahanBaku
    public function penerimaanBahanBaku()
    {
        return $this->hasMany(PenerimaanBahanBaku::class, 'bahan_baku_id', 'id');
    }
}
