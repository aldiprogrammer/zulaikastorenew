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
        Schema::create('penjualans', function (Blueprint $table) {
            $table->id();
            $table->string('kode_transaksi', 20);
            $table->string('id_produk', 11);
            $table->string('qty', 11);
            $table->string('harga', 15);
            $table->string('diskon', 11);
            $table->string('harga_bayar', 15);
            $table->string('total', 15);
            $table->string('tanggal', 15);
            $table->string('id_pengguna', 11);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penjualans');
    }
};
