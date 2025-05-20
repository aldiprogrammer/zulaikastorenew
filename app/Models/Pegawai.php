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
        'foto',
        'alamat',
        'nik',
        'tgl_masuk',
        'id_shiftkerja',
        'id_store',
        'id_jabatan',
        'email',
    ];


    public function store()
    {
        return $this->belongsTo(Store::class, 'id_store');
    }


    public function shiftkerja()
    {
        return $this->belongsTo(Shiftkerja::class, 'id_shiftkerja');
    }
}