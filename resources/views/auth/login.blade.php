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
    <div class="w-full max-w-sm rounded-3xl border border-gray-100 bg-white p-8 shadow-xl">
        <div class="mb-8 text-center">
            <div class="text-2xl leading-none font-black text-red-600 italic">
                TICKET<span class="text-blue-800">.COM</span>
            </div>
            <p class="mt-2 text-xs font-bold tracking-widest text-gray-400 uppercase">Masuk ke Akun Anda</p>
        </div>
        <form method="POST" action="{{ route('login') }}" class="space-y-5">
            @csrf
            <div>
                <label class="mb-1 ml-1 block text-[10px] font-bold text-gray-400 uppercase"
                    >Email / Username</label
                >
                <input
                    type="text"
                    placeholder="Masukkan email"
                    name="email"
                    class="w-full rounded-xl border border-gray-200 px-4 py-3 text-sm transition-all outline-none focus:ring-2 focus:ring-blue-500"
                />
            </div>
            <div>
                <label class="mb-1 ml-1 block text-[10px] font-bold text-gray-400 uppercase"
                    >Password</label
                >
                <input
                    type="password"
                    placeholder="••••••••"
                    name="password"
                    class="w-full rounded-xl border border-gray-200 px-4 py-3 text-sm transition-all outline-none focus:ring-2 focus:ring-blue-500"
                />
            </div>
            @if (session('error'))
                <div class="text-red-600 italic">Password / Username salah</div>
            @endif
            <button
                class="w-full rounded-xl bg-blue-800 py-3 font-bold text-white shadow-lg shadow-blue-100 transition-all hover:bg-blue-900"
            >
                Masuk
            </button>
        </form>
        <p class="mt-8 text-center text-xs text-gray-500">
            Belum punya akun?
            <a href="/register" class="font-bold text-blue-700 hover:underline">Daftar Sekarang</a>
        </p>
    </div>
</body>
</html>
