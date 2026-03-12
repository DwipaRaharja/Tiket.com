<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use Illuminate\Http\Request;

class JadwalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jadwal = Jadwal::with('bus')->paginate('5');
        return view('admin.manage_jadwal.index', compact('jadwal'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.manage_jadwal.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([

            'bus_id' => 'required',
            'asal' => 'required',
            'tujuan' => 'required',
            'tanggal' => 'required',
            'jam_berangkat' => 'required',
            'harga' => 'required|integer',
        ], [
            'asal.required' => 'Asal kosong',
            'tujuan.required' => 'Tujuan kosong',
            'tanggal.required' => 'Tanggal',
            'harga.required' => 'Harga kosong',
            'harga.integer' => 'Inputan harus angka',
            'jam' => 'required',
            'bus_id.required' => 'Inputan id bus kosong',
        ]);

        Jadwal::create($validate);

        return redirect('/admin/manage-jadwal')->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $jadwal = Jadwal::with('bus')->findOrFail($id);
        return view('admin.manage_jadwal.detail', compact('jadwal'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $jadwal = Jadwal::with('bus')->findOrFail($id);
        return view('admin.manage_jadwal.update', compact('jadwal'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validate = $request->validate([
            'bus_id' => 'required',
            'asal' => 'required',
            'tujuan' => 'required',
            'tanggal' => 'required',
            'jam_berangkat' => 'required',
            'harga' => 'required|integer',
        ], [
            'asal.required' => 'Asal kosong',
            'tujuan.required' => 'Tujuan kosong',
            'tanggal.required' => 'Tanggal',
            'harga.required' => 'Harga kosong',
            'harga.integer' => 'Inputan harus angka',
            'jam' => 'required',
            'bus_id.required' => 'Inputan id bus kosong',
        ]);

        $jadwal = Jadwal::findOrFail($id);
        $jadwal->update($validate);
        return redirect('/admin/manage-jadwal')->with('success', 'Data berhasil di update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $jadwal = Jadwal::findOrFail($id);
        $jadwal->delete();
        return redirect('/admin/manage-jadwal')->with('success', value: 'Data berhasil di hapus');
    }
}
