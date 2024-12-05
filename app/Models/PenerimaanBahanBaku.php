<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenerimaanBahanBaku extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'supplier_id',
        'nama_bahan_baku',
        'jumlah',
        'harga',
        'tanggal_penerimaan',
    ];

    // Relasi dengan User (yang menerima bahan baku)
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi dengan Supplier
    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }

    protected $table = 'penerimaan_bahan_baku'; // Pastikan nama tabelnya benar

    // Relasi banyak-ke-satu (Many to One) dengan BahanBaku
    public function bahanBaku()
    {
        return $this->belongsTo(BahanBaku::class, 'bahan_baku_id', 'id');
    }
}
