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
    <div
        class="mx-auto max-w-md overflow-hidden rounded-xl border border-gray-200 bg-white shadow-lg"
    >
        <div class="bg-blue-800 p-6 text-center text-white">
            <h1 class="text-xl font-black tracking-tight uppercase">
                {{ $data->jadwal->bus->nama_perusahaan }}
            </h1>
            <p class="mt-1 text-xs opacity-80">Status: <span class="font-bold">{{ $data->status }}</span></p>
        </div>

        <div class="space-y-6 p-6">
            <div class="border-b pb-4 text-center">
                <p class="text-[10px] font-bold tracking-widest text-gray-400 uppercase">Kode Booking</p>
                <p class="text-2xl font-black tracking-tighter text-gray-800">{{ $data->kode}}</p>
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <p class="text-[10px] font-bold text-gray-400 uppercase">Asal</p>
                    <p class="font-bold text-gray-800 uppercase">{{ $data->jadwal->asal }}</p>
                </div>
                <div class="text-right">
                    <p class="text-[10px] font-bold text-gray-400 uppercase">Tujuan</p>
                    <p class="font-bold text-gray-800 uppercase">{{ $data->jadwal->tujuan }}</p>
                </div>
                <div>
                    <p class="text-[10px] font-bold text-gray-400 uppercase">Tanggal</p>
                    <p class="text-sm font-bold text-gray-800">{{ $data->jadwal->tanggal }}</p>
                </div>
                <div class="text-right">
                    <p class="text-[10px] font-bold text-gray-400 uppercase">Jam Berangkat</p>
                    <p class="text-sm font-bold text-gray-800">{{ $data->jadwal->jam_berangkat }}</p>
                </div>
            </div>

            <hr class="border-dashed" />

            <div class="space-y-3">
                <div class="flex items-center justify-between">
                    <span class="text-xs text-gray-500 italic">Nama Bus</span>
                    <span class="text-sm font-bold">{{ $data->jadwal->bus->tipe_bus }}</span>
                </div>
                <div class="flex items-center justify-between">
                    <span class="text-xs text-gray-500 italic">Tipe Bus</span>
                    <span class="text-sm font-bold">{{ $data->jadwal->bus->nama_bus }}</span>
                </div>
                <div class="flex items-center justify-between">
                    <span class="text-xs text-gray-500 italic">Nama Penumpang</span>
                    <span class="text-sm font-bold uppercase">{{ $data->nama_penumpang }}</span>
                </div>
                <div class="flex items-center justify-between">
                    <span class="text-xs text-gray-500 italic"></span>
                    <span class="text-sm font-bold">{{ $data->jumlah_kursi }} Kursi</span>
                </div>
            </div>

            <div class="flex items-center justify-between rounded-lg border bg-gray-50 p-4">
                <span class="text-xs font-bold text-gray-400 uppercase">Total Bayar</span>
                <span
                    class="text-xl font-black text-blue-800"
                    >{{ number_format($data->total_harga,0,',','.') }}</span
                >
            </div>
        </div>

        <div class="p-6 pt-0">
            <button
                onclick="window.print()"
                class="w-full rounded-lg bg-gray-800 py-3 text-sm font-bold text-white transition hover:bg-black"
            >
                Cetak Tiket
            </button>
            <a
                href="/jadwal-saya"
                class="mt-4 block text-center text-xs font-bold tracking-widest text-gray-400 uppercase hover:text-blue-800"
            >
                Kembali ke Beranda
            </a>
        </div>
    </div>
</body>
</html>
