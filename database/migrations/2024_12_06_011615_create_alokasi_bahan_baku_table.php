<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlokasiBahanBakuTable extends Migration
{
    public function up()
    {
        Schema::create('alokasi_bahan_baku', function (Blueprint $table) {
            $table->id();
            $table->foreignId('jadwal_produksi_id')->constrained('jadwal_produksi')->onDelete('cascade');
            $table->foreignId('bahan_baku_id')->constrained('bahan_baku')->onDelete('cascade');
            $table->integer('jumlah_bahan_baku');
            $table->timestamps();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('alokasi_bahan_baku');
    }
}
