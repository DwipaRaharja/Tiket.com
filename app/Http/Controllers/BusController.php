<?php

namespace App\Http\Controllers;

use App\Models\Bus;
use Illuminate\Http\Request;

class BusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bus = Bus::paginate(5);

        return view('admin.manage_bus.index', compact('bus'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.manage_bus.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_perusahaan' => 'required',
            'nama_bus' => 'required',
            'tipe_bus' => 'required',
            'jumlah_kursi' => 'required|integer',
        ], [
            'nama_perusahaan.required' => 'Input nama perusahaan kosong',
            'nama_bus.required' => 'Input nama bus kosong',
            'tipe_bus.required' => 'Input tipe bus kosong',
            'jumlah_kursi.required' => 'Input jumlah kursi kosong',
            'jumlah_kursi.integer' => 'Input jumlah kursi harus angka',
        ]);

        Bus::create([
            'nama_perusahaan' => $request->nama_perusahaan,
            'nama_bus' => $request->nama_bus,
            'jumlah_kursi' => $request->jumlah_kursi,
            'tipe_bus' => $request->tipe_bus,
        ]);

        return redirect('/admin/manage-bus')->with('success', 'Data berhasil di simpan');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $bus = Bus::findOrFail($id);
        return (view('admin.manage_bus.detail', compact('bus')));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $bus = Bus::findOrFail($id);
        return view('admin.manage_bus.update', compact('bus'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validate = $request->validate([
            'nama_bus' => 'required',
            'nama_perusahaan' => 'required',
            'jumlah_kursi' => 'required',
            'tipe_bus' => 'required',
        ], [
            'nama_bus.required' => 'Input nama bus kosong',
            'nama_perusahaan.required' => 'Input nama perusahaan kosong',
            'jumlah_kursi.required' => 'Input jumlah kursi kosong',
            'tipe_bus.required' => 'Input tipe bus kosong',
        ]);

        $bus = Bus::findOrFail($id);
        $bus->update($validate);
        return redirect('/admin/manage-bus');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $bus = Bus::findOrFail($id);
        $bus->delete();
        return redirect('/admin/manage-bus')->with('success', value: 'Data berhasil di hapus');
    }

    public function cekData(Request $request)
    {
        $request->validate([
            'nama_perusahaan' => 'required',
            'nama_bus' => 'required',
        ], [
            'nama_perusahaan.required' => 'Inputan nama perusahaan kosong',
            'nama_bus.required' => 'Inputan nama bus kosong',
        ]);
        $bus = Bus::where('nama_perusahaan', $request->nama_perusahaan)
            ->where('nama_bus', $request->nama_bus)
            ->first(); 

        if (!$bus) {
            return back()
                ->withInput()
                ->with('error', 'Bus tidak ditemukan');
        }

        return back()
            ->with('success', 'Bus ditemukan')
            ->with('bus_found', true)
            ->with('bus_id', $bus->id);
    }
}
