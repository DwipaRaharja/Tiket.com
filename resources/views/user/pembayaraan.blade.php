<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Jadwal Saya - TiketBus</title>
    <script src="https://cdn.tailwindcss.com"></script>
    @vite (['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <div
        class="mx-auto max-w-md overflow-hidden rounded-3xl border border-gray-200 bg-white shadow-xl"
    >
        <div class="bg-orange-500 p-6 text-center text-white">
            <h1 class="text-xl font-black tracking-tight uppercase">Selesaikan Pembayaran</h1>
            <p class="mt-1 text-xs opacity-90">Silahkan transfer sesuai nominal di bawah ini</p>
        </div>

        <div class="space-y-6 p-8">
            <div
                class="rounded-2xl border border-dashed border-gray-300 bg-gray-50 py-6 text-center"
            >
                <p class="mb-1 text-[10px] font-bold tracking-widest text-gray-400 uppercase">Total Tagihan</p>
                <p class="text-3xl font-black text-blue-900 italic">{{ number_format($data->total_harga,0,',','.') }}</p>
                <p class="mt-2 text-[10px] font-bold text-red-500 uppercase">Kode Booking: {{ $data->kode_booking }}</p>
            </div>

            <div class="space-y-3">
                <p class="text-xs font-bold text-gray-500 uppercase">Transfer Ke:</p>
                <div class="flex items-center justify-between rounded-xl bg-blue-50 p-4">
                    <span class="text-lg font-bold tracking-tighter text-blue-800"
                        >BANK CENTRAL</span
                    >
                    <span class="font-mono font-bold text-gray-700 uppercase">123-456-789</span>
                </div>
                <p class="text-center text-[10px] text-gray-400">a.n PT. TIKET BUS INDONESIA</p>
            </div>

            <hr class="border-gray-100" />

            <form action="/pembayaran/{{ $data->id }}" method="POST">
                @csrf
                <div>
                    <label class="mb-3 block text-center text-xs font-bold text-gray-500 uppercase"
                        >Upload Bukti Pembayaran</label
                    >

                    <div class="group relative">
                        <input
                            type="file"
                            class="absolute inset-0 z-10 h-full w-full cursor-pointer opacity-0"
                        />
                        <div
                            class="rounded-2xl border-2 border-dashed border-gray-300 p-8 text-center transition-all group-hover:border-blue-500 group-hover:bg-blue-50"
                        >
                            <div class="mb-2 text-3xl">📸</div>
                            <p class="text-sm font-bold text-gray-600">Pilih Foto Bukti</p>
                            <p class="mt-1 text-[10px] text-gray-400 uppercase">Format: JPG, PNG (Max 2MB)</p>
                        </div>
                    </div>
                </div>

                <button
                    type="submit"
                    class="mt-5 w-full rounded-2xl bg-blue-800 py-4 text-lg font-black text-white shadow-lg shadow-blue-100 transition-all hover:bg-blue-900 active:scale-95"
                >
                    KONFIRMASI SEKARANG
                </button>
            </form>
        </div>

        <div class="p-6 pt-0 text-center">
            <p class="text-[10px] text-gray-400">Pengecekan otomatis akan memakan waktu 5-10 menit setelah upload.</p>
        </div>
    </div>

    <div class="mt-6 text-center">
        <a
            href="/jadwal-saya"
            class="text-xs font-bold tracking-widest text-gray-400 uppercase hover:text-blue-800"
        >
            Batal & Kembali
        </a>
    </div>
</body>
</html>
