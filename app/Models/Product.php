<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // Menambahkan kolom yang dapat diisi (fillable)
    protected $fillable = [
        'name',
        'description',
        'price',
        'stok',
        'status',
    ];
}
