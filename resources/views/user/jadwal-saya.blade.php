<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Jadwal Saya - TiketBus</title>
    <script src="https://cdn.tailwindcss.com"></script>
    @vite (['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">
    <nav class="fixed z-50 w-full bg-white shadow-md">
        <div class="mx-auto flex max-w-7xl items-center justify-between px-6 py-4">
            <div class="text-2xl font-extrabold tracking-tighter text-red-600">
                TIKET<span class="text-blue-800">BUS</span>
            </div>

            <div class="hidden space-x-8 font-bold text-gray-700 md:flex">
                <a href="/home" class="transition hover:text-red-600">Home</a>
                <a href="/jadwal-saya" class="transition hover:text-red-600">Jadwal Saya</a>
                <a href="/contact" class="transition hover:text-red-600">Contact</a>
            </div>

            <div class="flex items-center gap-3">
                <a
                    href="/login"
                    class="px-5 py-2 text-sm font-bold text-blue-800 transition hover:text-blue-600"
                >
                    Log In
                </a>
                <a
                    href="/signup"
                    class="rounded-full bg-blue-800 px-5 py-2 text-sm font-bold text-white shadow-md transition hover:bg-blue-900"
                >
                    Sign Up
                </a>
            </div>
        </div>
    </nav>

    {{-- Nah disini itu ada tiket pesanan ada yang dimana user setelah memesan tiket tetapi belum melakukan pembayaraan --}}
    <main class="mx-auto max-w-4xl px-6 pt-28 pb-20">
        <h1 class="mb-2 text-3xl font-extrabold">Tiket Pesanan Anda</h1>
        <p class="mb-8 text-gray-500">Berikut adalah rincian perjalanan berdasarkan data pemesanan terbaru.</p>

        <div class="space-y-6">
            @foreach ($jadwalSaya as $data)
                <div class="overflow-hidden rounded-2xl border border-gray-100 bg-white shadow-md">
                    <div class="flex items-center justify-between border-b bg-blue-50 px-6 py-3">
                        <span class="text-xs font-bold tracking-widest text-blue-800 uppercase">
                            KODE: {{ $data->id }}
                        </span>

                        <span
                            class="rounded-full bg-yellow-100 px-3 py-1 text-xs font-bold text-yellow-700 uppercase italic"
                        >
                            Status: {{ $data->status }}
                        </span>
                    </div>

                    <div class="p-6">
                        <div class="grid grid-cols-1 gap-8 md:grid-cols-2">
                            <div>
                                <p class="mb-1 text-[10px] font-bold text-gray-400 uppercase">Bus & Perusahaan</p>

                                <h2 class="text-xl font-bold text-blue-900">
                                    {{ $data->jadwal->nama_po }}
                                </h2>

                                <p class="mb-4 text-sm text-gray-600">
                                    Bus:
                                    <span class="font-semibold text-gray-800">
                                        {{ $data->jadwal->nama_bus }}
                                    </span>
                                </p>

                                <div class="flex items-center gap-4">
                                    <div class="text-center">
                                        <p class="text-lg font-bold">{{ $data->jadwal->asal }}</p>

                                        <p class="text-xs text-gray-500">
                                            {{ $data->jadwal->tanggal }}
                                        </p>
                                    </div>

                                    <div
                                        class="relative flex-grow border-t-2 border-dashed border-gray-200"
                                    >
                                        <span
                                            class="absolute -top-3 left-1/2 -translate-x-1/2 text-lg"
                                        >
                                            🚌
                                        </span>
                                    </div>

                                    <div class="text-center">
                                        <p class="text-lg font-bold">{{ $data->jadwal->tujuan }}</p>

                                        <p class="text-xs text-gray-500">
                                            {{ $data->jadwal->jam }}
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="rounded-xl border border-gray-100 bg-gray-50 p-4">
                                <div class="mb-2 flex justify-between">
                                    <span class="text-sm text-gray-500"> Nama Penumpang </span>

                                    <span class="text-sm font-bold text-gray-800">
                                        {{ $data->nama_penumpang }}
                                    </span>
                                </div>

                                <div class="mb-2 flex justify-between">
                                    <span class="text-sm text-gray-500"> Jumlah Kursi </span>

                                    <span class="text-sm font-bold text-gray-800">
                                        {{ $data->jumlah_kursi }} Kursi
                                    </span>
                                </div>

                                <div class="my-2 border-t border-gray-200"></div>

                                <div class="flex items-center justify-between">
                                    <span class="text-sm font-bold"> Total Bayar </span>

                                    <span class="text-xl font-black text-red-600">
                                        Rp {{ number_format($data->total_harga,0,',','.') }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="flex items-center justify-end gap-3 border-t bg-gray-50 px-6 py-4">
                        @switch ($data->status)
                            @case ('pending')
                                <a
                                    href="/pembayaran/{{ $data->id }}"
                                    class="rounded-lg bg-red-500 px-6 py-2 text-sm font-bold text-white"
                                >
                                    Lakukan Pembayaran
                                </a>
                                {{-- Batalkan --}}
                                <form action="/jadwal-saya/{{ $data->id }}" method="POST">
                                    @csrf
                                    @method ('DELETE')

                                    <button
                                        class="text-sm font-bold text-gray-500 hover:text-red-600"
                                    >
                                        Batalkan
                                    </button>
                                </form>
                                @break
                            @case ('dibayar')
                                <a
                                    href="/detail-tiket/{{ $data->id }}"
                                    class="rounded-lg bg-blue-800 px-6 py-2 text-sm font-bold text-white"
                                >
                                    Detail Tiket
                                </a>
                                @break

                        @endswitch
                    </div>
                </div>

            @endforeach
        </div>
    </main>

    <footer class="border-t py-10 text-center text-sm text-gray-400">
        &copy; 2026 TiketBus System. All rights reserved.
    </footer>
</body>
</html>
