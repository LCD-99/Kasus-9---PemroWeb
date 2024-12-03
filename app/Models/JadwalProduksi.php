<?php

// app/Models/JadwalProduksi.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JadwalProduksi extends Model
{
    use HasFactory;
    protected $table = 'jadwal_produksi';  // Pastikan nama tabel sesuai dengan yang ada di database
    protected $fillable = ['tanggal', 'produk_id', 'jumlah'];

    public function produk()
    {
        return $this->belongsTo(Product::class);
    }
}