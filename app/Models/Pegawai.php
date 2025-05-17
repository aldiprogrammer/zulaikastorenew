<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    // protected $table = 'pegawai';
    protected $fillabel = [
        'nama',
        'jenis_kelamin',
        'nowa',
        // 'foto',
        'alamat',
        'nik',
        'tgl_masuk'
    ];


    public function store()
    {
        return $this->belongsTo(Store::class, 'id_store');
    }
}