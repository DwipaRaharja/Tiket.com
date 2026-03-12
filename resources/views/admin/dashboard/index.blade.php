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
        <x-layout.admin-header-content title="Dashboard" text="Halaman melihat data secara ringkas" />
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
                value="120"
                text="Jumlah keseluruhan pemesanan"
            ></x-cards.card-admin-dashboard>
            <x-cards.card-admin-dashboard
                title="Total Pendapatan"
                value="Rp. 120.000.000"
                text="Jumlah pendapatan hari ini"
            ></x-cards.card-admin-dashboard>
            <x-cards.card-admin-dashboard
                title="Total Jadwal"
                value="120"
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
                            <th class="px-6 py-3 font-semibold">User</th>
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
                        {{-- catatan : pakai foreach --}}
                        <tr class="transition hover:bg-gray-50">
                            <td class="px-6 py-4">PSS-001</td>
                            <td class="px-6 py-4 font-medium">Roma Kelapa</td>
                            <td class="px-6 py-4">Rp. 123.123.123</td>
                            <td class="px-6 py-4">
                                <span class="rounded bg-green-100 px-2 py-1 text-xs text-green-700"
                                    >Selesai</span
                                >
                            </td>
                        </tr>
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
                            <th class="px-6 py-3 font-semibold">Bus</th>
                            <th class="px-6 py-3 font-semibold">Rute</th>
                            <th class="px-6 py-3 font-semibold">Jam</th>
                            <th class="px-6 py-3 font-semibold">Harga</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        {{-- 
                            ============
                            COLUMN BODY
                            ===========
                        --}}
                        {{-- catatan : pakai dowhile --}}
                        <tr class="transition hover:bg-gray-50">
                            <td class="px-6 py-4 capitalize">Surya Husada</td>
                            <td class="px-6 py-4 text-black">Denpasar -> Buleleng</td>
                            <td class="px-6 py-4">12:00</td>
                            <td class="px-6 py-4">Rp.123.000</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </section>
    </x-layout.admin-main-container>
</body>
</html>
