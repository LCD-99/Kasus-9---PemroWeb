<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePemasukanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pemasukan', function (Blueprint $table) {
            $table->id(); // Auto-increment primary key
            $table->date('tanggal'); // Tanggal pemasukan
            $table->decimal('jumlah', 10, 2); // Jumlah pemasukan (dengan 2 digit desimal)
            $table->string('deskripsi'); // Deskripsi pemasukan
            $table->timestamps(); // Created_at & Updated_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pemasukan');
    }
}
