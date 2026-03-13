<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use App\Models\Pemesanan;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalPemesanan = Pemesanan::count();

        $totalPendapatan = Pemesanan::sum('total_harga');

        $totalJadwal = Jadwal::count();

        $pemesanan = Pemesanan::with('user')
            ->latest()
            ->limit(5)
            ->get();

        $jadwal = Jadwal::with('bus')
            ->limit(5)
            ->get();

        return view('admin.dashboard.index', compact(
            'totalPemesanan',
            'totalPendapatan',
            'totalJadwal',
            'pemesanan',
            'jadwal'
        ));
    }
}
