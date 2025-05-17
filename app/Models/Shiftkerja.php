<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Shiftkerja extends Model
{
    protected $fillable = ['shiftkerja', 'jam_masuk', 'jam_keluar'];

    /**
     * Get all of the comments for the Shiftkerja
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function pegawai()
    {
        return $this->hasMany(Pegawai::class, 'id_shiftkerja');
    }
}
