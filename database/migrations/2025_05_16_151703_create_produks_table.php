<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('produks', function (Blueprint $table) {
            $table->id();
            $table->string('kode_produk', 50);
            $table->string('nama_produk', 50);
            $table->string('ukuran', 10);
            $table->string('id_kategori', 20);
            $table->string('stok', 20);
            $table->string('harga_beli', 20);
            $table->string('harga_jual', 20);
            $table->string('diskon', 20);
            $table->datetime('tgl_masuk');
            $table->string('foto');
            $table->string('like', 20);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produks');
    }
};