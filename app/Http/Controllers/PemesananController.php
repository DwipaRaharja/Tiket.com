<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use App\Models\Pemesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PemesananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pemesanan = Pemesanan::with(['user', 'jadwal'])->paginate('5');

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
        dd('masuk');
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
    public function show($id)
    {
        $pemesanan = Pemesanan::with(['user', 'jadwal'])->findOrFail($id);
        return view('admin.manage_pemesanan.detail', compact('pemesanan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $jadwal = Jadwal::with('bus')->get();
        $pemesanan = Pemesanan::with(['user', 'jadwal'])->findOrFail($id);
        return view('admin.manage_pemesanan.update', compact('pemesanan', 'jadwal'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
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

        $pemesanan = Pemesanan::findOrFail($id);

        $pemesanan->update([
            'user_id' => $validate['user_id'],
            'jadwal_id' => $validate['jadwal'],
            'nama_penumpang' => $validate['nama_penumpang'],
            'jumlah_kursi' => $validate['jumlah_kursi'],
            'total_harga' => $validate['total_harga'],
            'status' => $validate['status'],
        ]);


        return redirect('/admin/manage-pemesanan')->with('success', 'Data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $pemesanan = Pemesanan::findOrFail($id);
        $pemesanan->delete();
        return redirect('/admin/manage-pemesanan')->with('success', value: 'Data berhasil di hapus');
    }

    public function jadwalSaya()
    {
        $jadwalSaya = Pemesanan::with('jadwal')
            ->where('user_id', Auth::id())
            ->latest()
            ->get();

        return view('user.jadwal-saya', compact('jadwalSaya'));
    }

    public function destroyPemesananUser($id)
    {
        Pemesanan::findOrFail($id)->delete();

        return redirect('/jadwal-saya')
            ->with('success', 'Pesanan dibatalkan');
    }
    public function detailPemesananUser($id)
    {
        $data = Pemesanan::with('jadwal')
            ->where('id', $id)
            ->where('user_id', auth()->id())
            ->firstOrFail();
        return view('user.detail-tiket', compact('data'));
    }

    public function pembayaranPemesananUser($id)
    {
        $data = Pemesanan::findOrFail($id);
        return view('user.pembayaraan', compact('data'));
    }

    public function konfirmasiBayar($id)
    {
        Pemesanan::where('id', $id)
            ->update([
                'status' => 'dibayar'
            ]);

        return redirect('/jadwal-saya')
            ->with('success', 'Pembayaran berhasil');
    }

    public function storeUser(Request $request)
    {
        $validate = $request->validate([
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

        $jadwal = Jadwal::findOrFail($request->jadwal_id);
        $total = $jadwal->harga * $request->jumlah_kursi;

        $last = Pemesanan::orderBy('id', 'desc')->first();

        if ($last) {
            $number = (int) substr($last->kode_booking, 4) + 1;
        } else {
            $number = 1;
        }

        $kode_booking = 'TCK-' . str_pad($number, 3, '0', STR_PAD_LEFT);

        Pemesanan::create([
            'kode_booking' => $kode_booking,
            'jadwal_id' => $request->jadwal_id,
            'user_id' => auth()->id(),
            'nama_penumpang' => $request->nama_penumpang,
            'jumlah_kursi' => $request->jumlah_kursi,
            'total_harga' => $total,
            'status' => 'pending',
        ]);

        return redirect('/jadwal-saya');
    }
}
