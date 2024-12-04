<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemasukan extends Model
{
    use HasFactory;

    protected $table = 'pemasukan';

    // Daftar kolom yang dapat diisi (mass assignment)
    protected $fillable = [
        'tanggal', 'jumlah', 'deskripsi'
    ];
}