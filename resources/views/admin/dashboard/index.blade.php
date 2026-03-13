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
            title="Dashboard"
            text="Halaman melihat data secara ringkas"
        />
        {{-- 
        ========
        CONTENT
        ========
        --}}
        <section class="grid grid-cols-1 gap-6 md:grid-cols-3">
            {{--
            ==========
            CARD LIST
            =========
            --}}

            {{-- catatan : value ambil data di database --}}
            <x-cards.card-admin-dashboard
                title="Total Pemesanan"
                value="{{ $totalPemesanan }}"
                text="Jumlah keseluruhan pemesanan"
            ></x-cards.card-admin-dashboard>
            <x-cards.card-admin-dashboard
                title="Total Pendapatan"
                value="Rp. {{ number_format($totalPendapatan) }}"
                text="Jumlah pendapatan hari ini"
            ></x-cards.card-admin-dashboard>
            <x-cards.card-admin-dashboard
                title="Total Jadwal"
                value="{{ $totalJadwal }}"
                text="Jumlah keseluruhan jadwal"
            ></x-cards.card-admin-dashboard>
        </section>

        <section class="grid grid-cols-1 gap-8 lg:grid-cols-2">
            <div class="overflow-x-scroll rounded-xl border border-gray-200 bg-white shadow-sm">
                {{-- 
                ================
                CARD TITLE TABLE
                ================
                --}}
                <div class="border-b border-gray-100 px-6 py-4">
                    <h3 class="font-bold text-gray-700 uppercase">Pemesanan</h3>
                </div>
                <table class="w-full border-collapse text-left">
                    <thead class="bg-gray-50 text-sm text-gray-600">
                        {{-- 
                            ============
                            COLUMN HEAD
                            ===========
                        --}}

                        <tr>
                            <th class="px-6 py-3 font-semibold">Kode</th>
                            <th class="px-6 py-3 font-semibold">Rute</th>
                            <th class="px-6 py-3 font-semibold">Tanggal</th>
                            <th class="px-6 py-3 font-semibold">Total</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        {{-- 
                            ============
                            COLUMN BODY
                            ===========
                        --}}
                        {{-- catatan : pakai foreach --}}
                        @php
                        $i = 0;
                        $total = count ($jadwal);
                        if ($total > 0){
                            do{
                        @endphp
                        <tr class="transition hover:bg-gray-50">
                            <td class="px-6 py-4">{{ $jadwal[$i]->bus->nama_bus }}</td>
                            <td class="px-6 py-4 font-medium">
                                {{ $jadwal[$i]->asal }} -> {{ $jadwal[$i]->tujuan }}
                            </td>
                            <td class="px-6 py-4">{{ $jadwal[$i]->tanggal }}</td>
                            <td class="px-6 py-4">
                                Rp {{ number_format($jadwal[$i]->harga, 0, ',', '.') }}
                            </td>
                        </tr>
                        @php
                        $i++;
                           }while ($i < $total);
                        };
                        @endphp
                    </tbody>
                </table>
            </div>

            <div class="overflow-hidden rounded-xl border border-gray-200 bg-white shadow-sm">
                {{-- 
                ================
                CARD TITLE TABLE
                ================
                --}}
                <div class="border-b border-gray-100 px-6 py-4">
                    <h3 class="font-bold text-gray-700 uppercase">Jadwal</h3>
                </div>

                <table class="w-full border-collapse text-left">
                    <thead class="bg-gray-50 text-sm text-gray-600">
                        {{-- 
                            ============
                            COLUMN HEAD
                            ===========
                        --}}
                        <tr>
                            <th class="px-6 py-3 font-semibold">Kode Pemesanan</th>
                            <th class="px-6 py-3 font-semibold">Nama</th>
                            <th class="px-6 py-3 font-semibold">Total</th>
                            <th class="px-6 py-3 font-semibold">Status</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        {{-- 
                            ============
                            COLUMN BODY
                            ===========
                        --}}
                        @php
                    $i = 0;
                    $total = count($pemesanan);
                    if ($total > 0) {
                        do {
                    @endphp
                        <tr class="transition hover:bg-gray-50">
                            <td class="px-6 py-4 capitalize">{{ $pemesanan[$i]->kode_booking }}</td>
                            <td class="px-6 py-4 text-black">{{ $pemesanan[$i]->user->name }}</td>
                            <td class="px-6 py-4">
                                {{ number_format($pemesanan[$i]->total_harga, 0, ',', '.') }}
                            </td>
                            <td class="px-6 py-4 capitalize">{{ $pemesanan[$i]->status }}</td>
                        </tr>
                        @php
                            $i++;
                        } while ($i < $total);
                    }@endphp
                    </tbody>
                </table>
            </div>
        </section>
    </x-layout.admin-main-container>
</body>
</html>
