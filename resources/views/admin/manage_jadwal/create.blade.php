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
            title="Tambah Data Users Baru"
            text="Halaman untuk menambah data users baru"
        />
        {{-- 
        ========
        CONTENT
        ========
        --}}
        {{-- Form Create Section --}}
        <section class="mb-10">
            <form
                id="form-create-data"
                action="{{ route('jadwal.store') }}"
                method="POST"
                class="flex flex-col gap-6"
            >
                @csrf
                <div class="overflow-hidden rounded-xl border border-gray-200 bg-white shadow-sm">
                    <div
                        class="flex items-center justify-between border-b border-gray-100 bg-gray-50/50 px-6 py-4"
                    >
                        <h3 class="font-bold text-gray-700">Detail Bus</h3>
                        <div class="flex items-center space-x-3">
                            <button
                                type="submit"
                                formaction="{{ route('bus.cekData') }}"
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
                    <div class="grid grid-cols-1 gap-6 p-6 md:grid-cols-2">
                        <x-form.admin-input-data
                            name="Nama Perusahaan"
                            placeholder="Nama perusahaan bus"
                            nameRequest="nama_perusahaan"
                            typeInput="text"
                        />
                        <x-form.admin-input-data
                            name="nama bus"
                            placeholder="Nama bus"
                            nameRequest="nama_bus"
                            typeInput="text"
                        />
                        <x-form.admin-input-data
                            name=""
                            nameRequest="bus_id"
                            typeInput="textHidden"
                            value="{{ session('bus_id') }}"
                        />
                    </div>
                </div>
                <div
                    id="card-jadwal"
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
                            <button
                                type="submit"
                                form="form-create-data"
                                class="cursor-pointer rounded-lg bg-blue-600 px-4 py-2 text-sm font-medium text-white shadow-sm transition hover:bg-blue-700"
                            >
                                Simpan Data
                            </button>
                        </div>
                    </div>
                    <div class="grid grid-cols-1 gap-6 p-6 md:grid-cols-2">
                        <x-form.admin-input-data
                            name="rute asal"
                            placeholder="Asal rute bus"
                            nameRequest="asal"
                            typeInput="text"
                        />
                        <x-form.admin-input-data
                            name="rute tujuan"
                            placeholder="Tujuan rute bus"
                            nameRequest="tujuan"
                            typeInput="text"
                        />
                        <x-form.admin-input-data
                            name="tanggal keberangkatan"
                            nameRequest="tanggal"
                            typeInput="date"
                        />
                        <x-form.admin-input-data
                            name="jam keberangkatan"
                            nameRequest="jam_berangkat"
                            typeInput="time"
                        />
                        <x-form.admin-input-data
                            name="harga"
                            nameRequest="harga"
                            placeholder="Harga dari rute ini"
                            typeInput="number"
                        />
                    </div>
                </div>
            </form>
        </section>

        {{-- Tabel data Anda di bawah sini --}}
    </x-layout.admin-main-container>
</body>
</html>
