<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use App\Models\Pemesanan;
use Illuminate\Http\Request;

class PemesananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pemesanan = Pemesanan::paginate('5');

        return view('admin.manage_pemesanan.index', compact('pemesanan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $jadwal = Jadwal::with('bus')->get();
        return view('admin.manage_pemesanan.create', compact('jadwal'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'user_id' => 'required',
            'jadwal' => 'required',
            'nama_penumpang' => 'required',
            'jumlah_kursi' => 'required|integer',
            'total_harga' => 'required|integer',
            'status' => 'required',
        ], [
            'jadwal.required' => 'Pilihan jadwal kosong',
            'nama_penumpang.required' => 'Nama penumpang kosong',
            'jumlah_kursi.required' => 'Jumlah kursi kosong',
            'status' => 'pilihan status kosong',
        ]);

        // generate kode booking
        $last = Pemesanan::latest()->first();

        if ($last) {
            $number = (int) substr($last->kode_booking, 4) + 1;
        } else {
            $number = 1;
        }

        $kode_booking = 'TCK-' . str_pad($number, 3, '0', STR_PAD_LEFT);

        Pemesanan::create([
            'kode_booking' => $kode_booking,
            'user_id' => $validate['user_id'],
            'jadwal_id' => $validate['jadwal'],
            'nama_penumpang' => $validate['nama_penumpang'],
            'jumlah_kursi' => $validate['jumlah_kursi'],
            'total_harga' => $validate['total_harga'],
            'status' => $validate['status'],
        ]);

        return redirect('/admin/manage-pemesanan')->with('success', 'Data berhasil disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pemesanan $pemesanan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pemesanan $pemesanan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pemesanan $pemesanan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pemesanan $pemesanan)
    {
        //
    }
}
