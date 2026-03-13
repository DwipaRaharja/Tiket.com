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
            title="Tambah Data Pemesanan Baru"
            text="Halaman untuk menambah data pemesanan baru"
        />
        {{-- 
        ========
        CONTENT
        ========
        --}}
        {{-- Form Create Section --}}
        <section class="mb-10 flex flex-col gap-6">
            <div class="overflow-hidden rounded-xl border border-gray-200 bg-white shadow-sm">
                <div
                    class="flex items-center justify-between border-b border-gray-100 bg-gray-50/50 px-6 py-4"
                >
                    <h3 class="font-bold text-gray-700">Detail User</h3>
                    <div class="flex items-center space-x-3">
                        <button
                            type="submit"
                            form="form-cek-user"
                            class="cursor-pointer rounded-lg bg-blue-600 px-4 py-2 text-sm font-medium text-white shadow-sm transition hover:bg-blue-700"
                        >
                            Cek User
                        </button>
                    </div>
                </div>
                <div
                    class="flex items-center justify-between border-b border-gray-100 bg-gray-50/50 px-6 py-4"
                >
                    @if (session('error'))
                        <div class="text-red-500">{{ session('error') }}</div>
                    @endif

                    @if (session('success'))
                        <div class="text-green-500">{{ session('success') }}</div>
                    @endif
                </div>

                <form
                    id="form-cek-user"
                    action="{{ route('user.cekData') }}"
                    method="POST"
                    class="p-6"
                >
                    @csrf
                    <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                        <x-form.admin-input-data
                            name="nama user"
                            placeholder="Nama user yang telah terdaftar"
                            nameRequest="nama_user"
                            typeInput="text"
                        />
                        <x-form.admin-input-data
                            name="email user"
                            nameRequest="email_user"
                            placeholder="Email user yang telah terdaftar"
                            typeInput="text"
                        />
                    </div>
                </form>
            </div>
            <div
                class="overflow-hidden rounded-xl border border-gray-200 bg-white shadow-sm
                    @if(!session('user_found'))
                    pointer-events-none opacity-50
                    @endif"
            >
                <div
                    class="flex items-center justify-between border-b border-gray-100 bg-gray-50/50 px-6 py-4"
                >
                    <h3 class="font-bold text-gray-700">Detail Pemesanan</h3>
                    <div class="flex items-center space-x-3">
                        <button
                            type="reset"
                            form="form-create-data"
                            class="cursor-pointer rounded-lg border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-600 transition hover:bg-gray-50"
                        >
                            Batal
                        </button>
                        <button
                            type="submit"
                            form="form-create-data"
                            class="cursor-pointer rounded-lg bg-blue-600 px-4 py-2 text-sm font-medium text-white shadow-sm transition hover:bg-blue-700"
                        >
                            Simpan Data
                        </button>
                    </div>
                </div>

                <form
                    id="form-create-data"
                    action="{{ route('pemesanan.store') }}"
                    method="POST"
                    class="flex flex-col gap-6 p-6"
                >
                    @csrf
                    <div class="grid grid-cols-1">
                        <div class="space-y-2">
                            <label
                                for="jadwal"
                                class="text-sm font-semibold text-gray-700 capitalize"
                                >Pilih Jadwal</label
                            >
                            <select
                                id="jadwal"
                                name="jadwal"
                                class="w-full rounded-lg border border-gray-300 px-4 py-2 transition outline-none focus:ring-2 focus:ring-indigo-500"
                            >
                                <option value="">Pilih</option>

                                @foreach ($jadwal as $option)
                                    <option
                                        value="{{ is_object($option) ? $option->id : $option }}"
                                        data-harga="{{ $option->harga }}"
                                        @selected (old('jadwal') == (is_object($option) ? $option->id : $option))
                                    >
                                        {{ is_object($option) 
                                            ? $option->asal . ' - ' . $option->tujuan . ' | ' . $option->bus->nama_bus . ' | ' . $option->tanggal . ' | ' . $option->bus->jumlah_kursi . ' Kursi' . ' | ' . $option->harga . ' | '
                                            : $option }}
                                    </option>

                                @endforeach
                            </select>
                            @error ('jadwal')
                                <span class="text-sm text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                        <x-form.admin-input-data
                            name="nama penumpang"
                            placeholder="Contoh : King Stone"
                            nameRequest="nama_penumpang"
                            typeInput="text"
                        />
                        <div class="space-y-2">
                            <label for="jumlah_kursi" class="text-sm font-semibold text-gray-700"
                                >Jumlah Kursi</label
                            >
                            <input
                                type="number"
                                id="jumlah_kursi"
                                name="jumlah_kursi"
                                placeholder="Masukan jumlah kursi yang ingin di pesan"
                                value="{{ old('jumlah_kursi') }}"
                                class="w-full rounded-lg border border-gray-300 px-4 py-2 transition outline-none focus:ring-2 focus:ring-indigo-500"
                            />
                            @error ('jumlah_kursi')
                                <span class="text-sm text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="space-y-2">
                            <label class="text-sm font-semibold text-gray-700 capitalize"
                                >Total harga</label
                            >
                            <input
                                type="number"
                                id="total_harga"
                                name="total_harga"
                                class="w-full rounded-lg border border-gray-300 px-4 py-2 transition outline-none focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500"
                                readonly
                            />
                        </div>
                        <x-form.admin-input-data
                            name="status pemesanan"
                            nameRequest="status"
                            typeInput="select"
                            :selectOptions="[
                                'dibayar',
                                'pending',
                                'batal',
                            ]"
                        />
                        <input
                            type="text"
                            name="user_id"
                            class="hidden w-full rounded-lg border border-gray-300 px-4 py-2 transition outline-none focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500"
                            value="{{ session('user_id') }}"
                        />
                    </div>
                </form>
            </div>
        </section>

        {{-- Tabel data Anda di bawah sini --}}
    </x-layout.admin-main-container>
    <script>
        const jadwal = document.getElementById('jadwal');
        const jumlah = document.getElementById('jumlah_kursi');
        const total = document.getElementById('total_harga');

        function hitungTotal() {
            let harga = 0;

            if (jadwal.selectedIndex > 0) {
                harga = jadwal.options[jadwal.selectedIndex].dataset.harga;
            }

            let jumlahKursi = jumlah.value;

            if (harga && jumlahKursi) {
                total.value = harga * jumlahKursi;
            } else {
                total.value = '';
            }
        }

        jadwal.addEventListener('change', hitungTotal);
        jumlah.addEventListener('input', hitungTotal);
    </script>
</body>
</html>
