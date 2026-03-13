<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Management-Bus</title>

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
        <x-layout.admin-header-content title="Management Bus" text="Halaman untuk mengelola data bus" />
        {{-- 
        ========
        CONTENT
        ========
        --}}
        {{-- content --}}
        <section>
            <div class="mb-6 flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
                <a
                    href="{{ route('bus.create') }}"
                    class="inline-flex items-center rounded-lg bg-blue-600 px-4 py-2 text-sm font-semibold text-white shadow-sm transition duration-150 ease-in-out hover:bg-blue-700"
                >
                    <svg xmlns="http://www.w3.org/2000/svg" class="mr-2 h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                    Tambah Data Baru
                </a>
            </div>

            @if ($bus->count())
                <div class="overflow-hidden rounded-xl border border-gray-200 bg-white shadow-sm">
                    <div class="overflow-x-auto">
                        <table class="w-full border-collapse text-left">
                            <thead
                                class="border-b border-gray-200 bg-gray-50 text-xs tracking-wider text-gray-600 uppercase"
                            >
                                <tr>
                                    <th class="px-6 py-4 font-bold">No</th>
                                    <th class="px-6 py-4 font-bold">Nama Perusahaan</th>
                                    <th class="px-6 py-4 font-bold">Nama Bus</th>
                                    <th class="px-6 py-4 font-bold">Jumlah Kursi</th>
                                    <th class="px-6 py-4 font-bold">Tipe Bus</th>
                                    <th class="px-6 py-4 text-center font-bold">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100">
                                {{-- Tambahkan perulangan foreach --}}
                                @foreach ($bus as $data)
                                    <tr class="transition hover:bg-gray-50">
                                        <td class="px-6 py-4 text-sm text-gray-600">
                                            {{ $loop->iteration }}
                                        </td>
                                        <td class="px-6 py-4 text-sm font-medium text-gray-900">
                                            {{ $data->nama_perusahaan }}
                                        </td>
                                        <td class="px-6 py-4 text-sm text-gray-600">
                                            {{ $data->nama_bus }}
                                        </td>
                                        <td class="px-6 py-4 text-sm font-medium text-gray-800">
                                            {{ $data->jumlah_kursi }}
                                        </td>
                                        <td class="px-6 py-4 text-sm font-medium text-gray-800">
                                            {{ $data->tipe_bus }}
                                        </td>
                                        <td class="px-6 py-4">
                                            <div class="flex items-center justify-center space-x-3">
                                                <a
                                                    href="{{ route('bus.show', $data->id) }}"
                                                    class="p-1 text-blue-600 transition hover:text-blue-900"
                                                    title="Edit Data"
                                                >
                                                    Detail
                                                </a>
                                                <a
                                                    href="{{ route('bus.edit', $data->id) }}"
                                                    class="p-1 text-blue-600 transition hover:text-blue-900"
                                                    title="Edit Data"
                                                >
                                                    Edit
                                                </a>
                                                <form
                                                    action="{{ route('bus.destroy', $data->id) }}"
                                                    method="POST"
                                                >
                                                    @csrf
                                                    @method ('DELETE')
                                                    <button
                                                        type="submit"
                                                        class="cursor-pointer p-1 text-red-600 transition hover:text-red-900"
                                                        onclick="
                                                            return confirm(
                                                                'Apakah Anda yakin ingin menghapus data ini?',
                                                            );
                                                        "
                                                    >
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                        </svg>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div>{{ $bus->links('vendor.pagination.custom') }}</div>
                    {{-- <div
                        class="flex items-center justify-between border-t border-gray-100 bg-gray-50 px-6 py-4"
                    >
                        <span class="text-xs text-gray-500">Menampilkan 2 dari 50 data</span>
                        <div class="flex space-x-2">
                            <button
                                class="rounded border border-gray-300 px-3 py-1 text-xs transition hover:bg-white"
                            >
                                Prev
                            </button>
                            <button
                                class="rounded border border-gray-300 border-indigo-200 bg-indigo-50 px-3 py-1 text-xs font-bold text-indigo-600 transition hover:bg-white"
                            >
                                1
                            </button>
                            <button
                                class="rounded border border-gray-300 px-3 py-1 text-xs transition hover:bg-white"
                            >
                                2
                            </button>
                            <button
                                class="rounded border border-gray-300 px-3 py-1 text-xs transition hover:bg-white"
                            >
                                Next
                            </button>
                        </div>
                    </div> --}}
                </div>
            @else
                <div class="flex flex-col items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="size-10 stroke-red-500 stroke-1">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m9.75 9.75 4.5 4.5m0-4.5-4.5 4.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>
                    <h3 class="font-semibold text-red-500">
                        Silahkan inputkan data terlebih dahulu
                    </h3>
                    <p class="text-sm font-medium text-gray-600">Data tidak ada</p>
                </div>
            @endif
        </section>
    </x-layout.admin-main-container>
</body>
</html>
