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
                @auth
                    <span class="text-sm font-bold text-gray-700">
                        Halo, {{ auth()->user()->name }}
                    </span>
                    <form method="POST" action="/logout">
                        @csrf
                        <button
                            class="rounded-full bg-red-600 px-4 py-2 text-sm font-bold text-white"
                        >
                            Logout
                        </button>
                    </form>

                @endauth
                @guest
                    <a href="/login" class="px-5 py-2 text-sm font-bold text-blue-800"> Log In </a>
                    <a
                        href="/signup"
                        class="rounded-full bg-blue-800 px-5 py-2 text-sm font-bold text-white"
                    >
                        Sign Up
                    </a>

                @endguest
            </div>
        </div>
    </nav>

    <header class="bg-gradient-to-br from-blue-900 to-blue-700 px-6 pt-32 pb-16 text-white">
        <div class="mx-auto grid max-w-7xl items-center gap-10 md:grid-cols-2">
            <div>
                <h1 class="mb-4 text-4xl leading-tight font-extrabold md:text-6xl">
                    Jelajahi Kota dengan <span class="text-yellow-400">Mudah & Nyaman</span>
                </h1>
                <p class="mb-8 text-lg text-blue-100 italic">Pesan tiket bus dari perusahaan otobus terbaik di Indonesia langsung dari genggamanmu.</p>
                <div class="flex gap-4">
                    <a
                        href="#daftar-jadwal"
                        class="rounded-lg bg-yellow-400 px-8 py-3 font-black text-blue-900 transition hover:bg-yellow-300"
                        >Cari Jadwal Sekarang</a
                    >
                </div>
            </div>
            <div class="hidden md:block">
                <img
                    src="https://images.unsplash.com/photo-1544620347-c4fd4a3d5957?auto=format&fit=crop&q=80"
                    alt="Bus Image"
                    class="rounded-3xl border-4 border-white/20 shadow-2xl"
                />
            </div>
        </div>
    </header>

    <main id="daftar-jadwal" class="mx-auto max-w-7xl px-6 py-20">
        <div class="mb-10 flex flex-col items-end justify-between md:flex-row">
            <div>
                <h2 class="text-3xl font-black text-gray-900">Jadwal Keberangkatan</h2>
                <p class="text-gray-500">Pilih rute dan bus sesuai kebutuhan perjalananmu.</p>
            </div>
            <div class="mt-4 md:mt-0">
                <span class="text-sm font-bold tracking-widest text-gray-400 uppercase"
                    >Update Terbaru: Hari Ini</span
                >
            </div>
        </div>

        {{-- dibwah ini saya ingin buatkan logic menampilkan jadwal --}}
        <div class="grid grid-cols-1 gap-8 md:grid-cols-2 lg:grid-cols-3">
            @foreach ($jadwal as $j)
                <div
                    class="group rounded-3xl border border-gray-100 bg-white p-1 shadow-sm transition-all hover:shadow-xl"
                >
                    <div class="p-6">
                        <div class="mb-6 flex items-start justify-between">
                            <div>
                                <h3 class="text-xl font-black text-blue-900 uppercase">
                                    {{ $j->bus->nama_bus }}
                                </h3>

                                <p class="mt-1 text-xs font-bold text-blue-500">
                                    {{ $j->bus->kelas ?? 'Eksekutif' }} • {{ $j->bus->jumlah_kursi }} Kursi
                                </p>
                            </div>

                            <div
                                class="rounded-full bg-blue-50 px-3 py-1 text-xs font-bold text-blue-700"
                            >
                                Tersedia
                            </div>
                        </div>

                        <div
                            class="mb-8 flex items-center justify-between rounded-2xl bg-gray-50 p-4"
                        >
                            <div class="text-center">
                                <p class="text-xs font-bold text-gray-400">ASAL</p>
                                <p class="text-lg font-bold">{{ $j->asal }}</p>
                            </div>

                            <span>→</span>

                            <div class="text-center">
                                <p class="text-xs font-bold text-gray-400">TUJUAN</p>
                                <p class="text-lg font-bold">{{ $j->tujuan }}</p>
                            </div>
                        </div>

                        <div class="mb-6 space-y-3">
                            <div class="flex justify-between text-sm italic">
                                <span>
                                    {{ \Carbon\Carbon::parse($j->tanggal)->format('d M Y') }}
                                </span>

                                <span class="font-bold"> {{ $j->jam_berangkat }} </span>
                            </div>

                            <div class="flex items-end justify-between border-t pt-4">
                                <div>
                                    <p class="text-[10px] font-bold text-gray-400">Harga</p>

                                    <p class="text-2xl font-black text-red-600">
                                        Rp {{ number_format($j->harga, 0, ',', '.') }}
                                    </p>
                                </div>

                                <button
                                    onclick="openModal({{ $j->id }}, {{ $j->harga }})"
                                    class="rounded-xl bg-blue-800 px-6 py-3 font-bold text-white hover:bg-red-600"
                                >
                                    Pilih
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </main>

    <div
        id="bookingModal"
        class="fixed inset-0 z-[100] flex hidden items-center justify-center bg-black/60 px-4 backdrop-blur-sm"
    >
        <div
            class="animate-in fade-in zoom-in w-full max-w-lg overflow-hidden rounded-3xl bg-white shadow-2xl duration-300"
        >
            <div class="flex items-center justify-between bg-blue-800 p-6 text-white">
                <div>
                    <h3 class="text-xl font-bold">Lengkapi Pemesanan</h3>
                    <p class="text-xs opacity-80">Rute: Jakarta ➜ Yogyakarta</p>
                </div>
                <button
                    onclick="closeModal()"
                    class="text-2xl font-bold text-white/50 hover:text-white"
                >
                    &times;
                </button>
            </div>

            {{-- pada bagian ini submit data pemsanan --}}
            <form method="POST" action="{{ route('pemesanan.store') }}" class="space-y-5 p-8">
                @csrf
                <div>
                    <input type="hidden" name="jadwal_id" id="jadwal_id" />
                    <label
                        class="mb-2 block text-xs font-bold tracking-widest text-gray-400 uppercase"
                        >Nama Penumpang</label
                    >
                    <input
                        type="text"
                        name="nama_penumpang"
                        placeholder="Masukkan nama sesuai KTP"
                        class="w-full rounded-xl border border-gray-200 px-4 py-3 transition-all outline-none focus:ring-2 focus:ring-blue-500"
                    />
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label
                            class="mb-2 block text-xs font-bold tracking-widest text-gray-400 uppercase"
                            >Jumlah Kursi</label
                        >
                        <input
                            type="number"
                            name="jumlah_kursi"
                            id="jumlah_kursi"
                            min="1"
                            value="1"
                            class="w-full rounded-xl border border-gray-200 px-4 py-3 transition-all outline-none focus:ring-2 focus:ring-blue-500"
                        />
                    </div>
                    <div>
                        <label
                            class="mb-2 block text-xs font-bold tracking-widest text-gray-400 uppercase"
                            >Total Bayar</label
                        >
                        <div
                            id="totalHarga"
                            class="w-full rounded-xl border border-gray-100 bg-gray-50 px-4 py-3 font-black text-red-600"
                        >
                            Rp 0
                        </div>
                    </div>
                </div>
                <button
                    type="submit"
                    class="w-full rounded-2xl bg-blue-800 py-4 text-lg font-black text-white shadow-lg shadow-blue-200 transition-all hover:bg-blue-900 active:scale-95"
                >
                    Konfirmasi & Pesan Tiket
                </button>
            </form>
        </div>
    </div>
    <footer id="contact" class="border-t bg-white px-6 py-16">
        <div class="mx-auto flex max-w-7xl flex-col items-center justify-between gap-8 md:flex-row">
            <div>
                <div class="mb-4 text-2xl font-black text-red-600 italic">
                    TIKET<span class="text-blue-800">BUS</span>
                </div>
                <p class="max-w-xs text-sm text-gray-500">Layanan pemesanan tiket bus terpercaya sejak 2026. Perjalanan Anda, prioritas kami.</p>
            </div>
            <div class="flex gap-12">
                <div>
                    <h4 class="mb-4 text-xs font-bold tracking-widest text-gray-400 uppercase">
                        Bantuan
                    </h4>
                    <ul class="space-y-2 text-sm font-semibold">
                        <li><a href="#" class="hover:text-blue-800">Cara Pesan</a></li>
                        <li><a href="#" class="hover:text-blue-800">Refund</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="mb-4 text-xs font-bold tracking-widest text-gray-400 uppercase">
                        Hubungi Kami
                    </h4>
                    <p class="text-sm font-bold">support@tiketbus.id</p>
                    <p class="text-sm font-bold">0812-3456-7890</p>
                </div>
            </div>
        </div>
    </footer>
    <script>
        let hargaTiket = 0;

        function openModal(id, harga) {
            document.getElementById('bookingModal').classList.remove('hidden');

            document.getElementById('jadwal_id').value = id;

            hargaTiket = harga;

            hitungTotal();

            document.body.style.overflow = 'hidden';
        }

        function closeModal() {
            document.getElementById('bookingModal').classList.add('hidden');
            document.body.style.overflow = 'auto';
        }

        function hitungTotal() {
            let jumlah = document.getElementById('jumlah_kursi').value;

            let total = hargaTiket * jumlah;

            document.getElementById('totalHarga').innerText = 'Rp ' + total.toLocaleString('id-ID');
        }

        document.getElementById('jumlah_kursi').addEventListener('input', hitungTotal);
    </script>
</body>
</html>
