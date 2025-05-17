<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    protected $fillable = ['kode_pelanggan', 'nik', 'nama', 'jenis_kelamin', 'alamat', 'no_telp', 'tgl_daftar'];
}
