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
        Schema::create('pegawais', function (Blueprint $table) {
            $table->id();
            $table->string('nama', 35);
            $table->enum('jenis_kelamin', ['Laki-Laki', 'Perempuan']);
            $table->string('nowa');
            $table->string('nik');
            $table->string('email', 50);
            $table->string('alamat', 100);
            $table->string('foto', 100);
            $table->datetime('tgl_masuk');
            $table->string('id_store', 2);
            $table->string('id_shiftkerja', 10);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pegawais');
    }
};
