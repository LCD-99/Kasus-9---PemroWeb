<?php

// app/Models/JadwalProduksi.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JadwalProduksi extends Model
{
    use HasFactory;
    protected $table = 'jadwal_produksi';  // Pastikan nama tabel sesuai dengan yang ada di database
    protected $fillable = ['tanggal_produksi', 'produk_id', 'jumlah_produksi'];
    public function produk()
    {
        return $this->belongsTo(Product::class, 'produk_id');
    }
    
}