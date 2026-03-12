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
            title="Edit Data Jadwal"
            text="Halaman untuk mengedit data jadwal"
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
                    <h3 class="font-bold text-gray-700">Detail Bus</h3>
                    <div class="flex items-center space-x-3">
                        <button
                            type="submit"
                            form="form-cek-bus"
                            class="cursor-pointer rounded-lg bg-blue-600 px-4 py-2 text-sm font-medium text-white shadow-sm transition hover:bg-blue-700"
                        >
                            Cek Data
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
                    id="form-cek-bus"
                    action="{{ route('bus.cekData') }}"
                    method="POST"
                    class="p-6"
                >
                    @csrf
                    <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                        <x-form.admin-update-data
                            name="Nama Perusahaan Bus"
                            nameRequest="nama_perusahaan"
                            typeInput="text"
                            value="{{ $jadwal->bus->nama_perusahaan }}"
                        />
                        <x-form.admin-update-data
                            name="Nama Bus"
                            nameRequest="nama_bus"
                            typeInput="text"
                            value="{{ $jadwal->bus->nama_bus }}"
                        />
                    </div>
                </form>
            </div>
            <div
                class="overflow-hidden rounded-xl border border-gray-200 bg-white shadow-sm
                @if(!session('bus_found'))
                pointer-events-none opacity-50
                @endif"
            >
                <div
                    class="flex items-center justify-between border-b border-gray-100 bg-gray-50/50 px-6 py-4"
                >
                    <h3 class="font-bold text-gray-700">Detail Jadwal</h3>
                    <div class="flex items-center space-x-3">
                        <a
                            type="reset"
                            href="/admin/manage-jadwal"
                            class="cursor-pointer rounded-lg border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-600 transition hover:bg-gray-50"
                        >
                            Batal
                        </a>
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
                    action="{{ route('jadwal.update', $jadwal->id) }}"
                    method="POST"
                    class="p-6"
                >
                    @csrf
                    @method ('PUT')
                    <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                        <x-form.admin-update-data
                            name="Tanggal Keberangkatan"
                            nameRequest="tanggal"
                            typeInput="date"
                            value="{{ $jadwal->tanggal }}"
                        />
                        <x-form.admin-update-data
                            name="Rute Asal"
                            placeholder="Contoh : Ginyar"
                            nameRequest="asal"
                            typeInput="text"
                            value="{{ $jadwal->asal }}"
                        />
                        <x-form.admin-update-data
                            name="Rute Tujuan"
                            placeholder="Contoh : Gianyar"
                            nameRequest="tujuan"
                            typeInput="text"
                            value="{{ $jadwal->tujuan }}"
                        />
                        <x-form.admin-update-data
                            name="Jam Keberangkatan"
                            nameRequest="jam_berangkat"
                            typeInput="time"
                            value="{{ $jadwal->jam_berangkat }}"
                        />
                        <x-form.admin-update-data
                            name="Harga Tiket"
                            nameRequest="harga"
                            typeInput="number"
                            value="{{ $jadwal->harga }}"
                        />
                        <x-form.admin-input-data
                            name=""
                            nameRequest="bus_id"
                            typeInput="textHidden"
                            value="{{ session('bus_id') }}"
                        />
                    </div>
                </form>
            </div>
        </section>
    </x-layout.admin-main-container>
</body>
</html>
