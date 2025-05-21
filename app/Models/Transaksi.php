<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $fillable = ['kode', 'id_pelanggan', 'id_pengguna', 'total', 'diskon', 'tanggal'];
}
