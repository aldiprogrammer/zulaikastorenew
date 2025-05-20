<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jabatan extends Model
{
    protected $fillable = ['jabatan'];

    /**
     * Get all of the comments for the Jabatan
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function pegawai()
    {
        return $this->hasMany(Pegawai::class, 'id_jabatan');
    }
}