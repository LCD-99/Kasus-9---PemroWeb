<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    // Menambahkan kolom yang dapat diisi (fillable)
    protected $fillable = [
        'name',
        'description',
        'price',
        'stok',
        'status',
    ];
    public function jadwalProduksi()
    {
        return $this->hasMany(JadwalProduksi::class, 'produk_id');
    }
    public function alokasiBahanBaku()
    {
    return $this->hasMany(AlokasiBahanBaku::class, 'produk_id');
    }
}
