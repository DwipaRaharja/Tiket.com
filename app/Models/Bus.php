<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bus extends Model
{
    protected $table = 'bus';

    protected $fillable = [
        'nama_bus',
        'nama_perusahaan',
        'jumlah_kursi',
        'tipe_bus'
    ];

    public function jadwal()
    {
        return $this->hasMany(Jadwal::class);
    }
}
