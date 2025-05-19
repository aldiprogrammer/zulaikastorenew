<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    protected $fillable = [
        'kode_transaksi',
        'id_produk',
        'qty',
        'harga',
        'diskon',
        'harga_bayar',
        'total',
        'tanggal',
        'id_pengguna'
    ];


    public function produk()
    {
        return $this->belongsTo(Produk::class, 'id_produk');
    }
}
