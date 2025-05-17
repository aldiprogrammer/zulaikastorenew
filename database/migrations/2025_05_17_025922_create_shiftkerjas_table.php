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
        Schema::create('shiftkerjas', function (Blueprint $table) {
            $table->id();
            $table->string('shiftkerja', 50);
            $table->string('jam_masuk', 20);
            $table->string('jam_keluar', 20);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shiftkerjas');
    }
};
