<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    protected $table = 'jadwal';

    protected $fillable = [
        'bus_id',
        'asal',
        'tujuan',
        'tanggal',
        'jam_berangkat',
        'harga'
    ];

    public function bus()
    {
        return $this->belongsTo(Bus::class);
    }
    public function jadwal()
    {
        return $this->hasMany(Pemesanan::class);
    }
}
