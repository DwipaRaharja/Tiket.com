<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Document</title>

    @vite (['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    {{-- 
    ========
    SIDEBAR
    ========
    --}}
    <x-sidebar.sidebar-layout />

    <x-layout.admin-main-container>
        {{-- 
        ==============
        HEADER LAYOUT
        ==============
        --}}
        <x-layout.admin-header-content
            title="Detail Data Pemesanan"
            text="Halaman untuk melihat detail pemesanan"
        />
        {{-- 
        ========
        CONTENT
        ========
        --}}
        {{-- Form Create Section --}}
        <section class="mb-10">
            <div class="overflow-hidden rounded-xl border border-gray-200 bg-white shadow-sm">
                <div
                    class="flex items-center justify-between border-b border-gray-100 bg-gray-50/50 px-6 py-4"
                >
                    <h3 class="font-bold text-gray-700">Detail Jadwal</h3>
                    <div class="flex items-center space-x-3">
                        <a
                            href="/admin/manage-pemesanan"
                            class="cursor-pointer rounded-lg border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-600 transition hover:bg-gray-50"
                        >
                            Kembali
                        </a>
                    </div>
                </div>
                @csrf
                <div class="grid grid-cols-1 gap-6 p-6 md:grid-cols-2">
                    <x-form.admin-detail-data
                        name="Rute"
                        value="{{ $pemesanan->jadwal->asal }} -> {{ $pemesanan->jadwal->tujuan }}"
                        inputType="text"
                    />
                    <x-form.admin-detail-data
                        name="Jam Keberangkatan"
                        value="{{ $pemesanan->jadwal->jam_berangkat }}"
                        inputType="text"
                    />
                    <x-form.admin-detail-data
                        name="Tanggal Keberangkatan"
                        value="{{ $pemesanan->jadwal->tanggal }}"
                        inputType="text"
                    />
                    <x-form.admin-detail-data
                        name="Nama Penumpang"
                        value="{{ $pemesanan->nama_penumpang }}"
                        inputType="text"
                    />
                    <x-form.admin-detail-data
                        name="Jumlah Kursi"
                        value="{{ $pemesanan->jumlah_kursi }}"
                        inputType="text"
                    />
                    <x-form.admin-detail-data
                        name="Jumlah Kursi"
                        value="{{ $pemesanan->total_harga }}"
                        inputType="text"
                    />
                    <x-form.admin-detail-data
                        name="Jumlah Kursi"
                        value="{{ $pemesanan->status }}"
                        inputType="text"
                    />
                </div>
            </div>
        </section>

        {{-- Tabel data Anda di bawah sini --}}
    </x-layout.admin-main-container>
</body>
</html>
