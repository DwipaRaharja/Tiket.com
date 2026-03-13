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
            title="Edit Data Users"
            text="Halaman untuk mengedit data users"
        />
        {{-- 
        ========
        CONTENT
        ========
        --}}
        {{-- Form Create Section --}}
        <section class="mb-10">
            <div class="overflow-hidden rounded-xl border border-gray-200 bg-white shadow-sm">
                <div
                    class="flex items-center justify-between border-b border-gray-100 bg-gray-50/50 px-6 py-4"
                >
                    <h3 class="font-bold text-gray-700">Detail Users</h3>
                    <div class="flex items-center space-x-3">
                        <a
                            type="reset"
                            href="/admin/manage-user"
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
                    action="{{ route('user.update', $user->id) }}"
                    method="POST"
                    class="p-6"
                >
                    @csrf
                    @method ('PUT')
                    <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                        <x-form.admin-update-data
                            name="nama"
                            placeholder="Contoh : Guna Arta"
                            nameRequest="name"
                            typeInput="text"
                            value="{{ $user->name }}"
                        />
                        <x-form.admin-update-data
                            name="email"
                            placeholder="Contoh : GOP-001"
                            nameRequest="email"
                            typeInput="text"
                            value="{{ $user->email }}"
                        />
                        <x-form.admin-update-data
                            name="role"
                            nameRequest="role"
                            typeInput="select"
                            :selectOptions="['admin', 'customer']"
                            value="{{ $user->role }}"
                        />

                        {{-- 
                        TIPS: Jika ingin menambah inputan baru, 
                        cukup copy-paste blok <div> di atas di sini. 
                        Grid akan otomatis menyesuaikan posisinya. 
                    --}}
                    </div>
                </form>
            </div>
        </section>

        {{-- Tabel data Anda di bawah sini --}}
    </x-layout.admin-main-container>
</body>
</html>
