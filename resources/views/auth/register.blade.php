<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Document</title>

    @vite (['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="flex h-screen items-center justify-center bg-gray-100">
    <div class="w-full max-w-md rounded-3xl border border-gray-100 bg-white p-8 shadow-xl">
        <div class="mb-8 text-center">
            <h1 class="text-2xl font-black text-gray-900">Buat Akun Baru</h1>
            <p class="mt-1 text-xs font-bold tracking-widest text-gray-400 uppercase">Mulai perjalananmu hari ini</p>
        </div>

        <form method="POST" action="{{ route('register') }}" class="space-y-4">
            @csrf
            <div>
                <label class="mb-1 ml-1 block text-[10px] font-bold text-gray-400 uppercase"
                    >Nama Lengkap</label
                >
                <input
                    type="text"
                    placeholder="Nama sesuai identitas"
                    name="name"
                    class="w-full rounded-xl border border-gray-200 px-4 py-3 text-sm outline-none focus:ring-2 focus:ring-blue-500"
                />
            </div>

            <div>
                <label class="mb-1 ml-1 block text-[10px] font-bold text-gray-400 uppercase"
                    >Alamat Email</label
                >
                <input
                    type="email"
                    placeholder="contoh@gmail.com"
                    name="email"
                    class="w-full rounded-xl border border-gray-200 px-4 py-3 text-sm outline-none focus:ring-2 focus:ring-blue-500"
                />
            </div>

            <div>
                <label class="mb-1 ml-1 block text-[10px] font-bold text-gray-400 uppercase"
                    >Password Email</label
                >
                <input
                    type="password"
                    placeholder="Password"
                    name="password"
                    class="w-full rounded-xl border border-gray-200 px-4 py-3 text-sm outline-none focus:ring-2 focus:ring-blue-500"
                />
            </div>

            <button
                class="mt-2 w-full rounded-xl bg-blue-800 py-4 font-bold text-white shadow-lg shadow-blue-100 transition-all hover:bg-blue-900"
            >
                Daftar Akun
            </button>
        </form>

        <p class="mt-8 text-center text-xs text-gray-500">
            Sudah punya akun?
            <a href="/login" class="font-bold text-blue-700 hover:underline">Masuk di sini</a>
        </p>
    </div>
</body>
</html>
