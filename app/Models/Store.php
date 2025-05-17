<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{

    protected $fillable = [
        'alamat',
        'store'
    ];

    /**
     * Get all of the comments for the Store
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function pegawai()
    {
        return $this->hasMany(Pegawai::class, 'id_store');
    }
}