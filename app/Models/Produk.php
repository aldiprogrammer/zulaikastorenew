<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    protected $fillable = [
        'kode_produk',
        'nama_produk',
        'stok',
        'ukuran',
        'id_kategori',
        'harga_beli',
        'harga_jual',
        'diskon',
        'tgl_masuk',
        'foto',
        'like'
    ];


    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'id_kategori');
    }
}
