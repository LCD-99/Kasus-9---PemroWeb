<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenerimaanBahanBakuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penerimaan_bahan_baku', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users'); // Relasi dengan tabel users
            $table->foreignId('supplier_id')->constrained('suppliers'); // Relasi dengan tabel suppliers
            $table->string('nama_bahan_baku');
            $table->integer('jumlah');
            $table->decimal('harga', 10, 2);
            $table->date('tanggal_penerimaan');
            $table->timestamps();
            $table->unsignedBigInteger('bahan_baku_id');
            $table->foreign('bahan_baku_id')->references('id')->on('bahan_baku')->onDelete('cascade');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('penerimaan_bahan_baku');
    }
}
