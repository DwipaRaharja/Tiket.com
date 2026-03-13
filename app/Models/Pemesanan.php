<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pemesanan extends Model
{
    protected $table = 'pemesanan';

    protected $fillable = [
        'kode_booking',
        'user_id',
        'kode_booking',
        'user_id',
        'jadwal_id',
        'nama_penumpang',
        'nomor_kursi',
        'total_harga',
        'status',
    ];

    public function jadwal(){
        return $this->belongsTo(Jadwal::class);
    }
    public function users(){
        return $this->belongsTo(Jadwal::class);
    }
}
