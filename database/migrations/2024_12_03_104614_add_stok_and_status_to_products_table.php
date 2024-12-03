<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStokAndStatusToProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
{
    Schema::table('products', function (Blueprint $table) {
        $table->integer('stok')->default(0); // Menambahkan kolom stok dengan nilai default 0
        $table->string('status')->default('aktif'); // Menambahkan kolom status dengan nilai default 'aktif'
    });
}

public function down()
{
    Schema::table('products', function (Blueprint $table) {
        $table->dropColumn(['stok', 'status']); // Menghapus kolom stok dan status jika migrasi dibatalkan
    });
}

}
