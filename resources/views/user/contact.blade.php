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
    <main class="flex flex-grow items-center justify-center px-6 py-12">
        <div
            class="w-full max-w-md rounded-3xl border border-gray-100 bg-white p-8 text-center shadow-lg"
        >
            <h1 class="mb-2 text-2xl font-extrabold text-gray-900">Butuh Bantuan?</h1>
            <p class="mb-8 text-sm text-gray-500">Hubungi layanan pelanggan kami di bawah ini:</p>

            <div class="space-y-4">
                <a
                    href="https://wa.me/6281234567890"
                    class="flex items-center justify-center gap-3 rounded-2xl bg-green-500 py-4 font-bold text-white shadow-md shadow-green-100 transition hover:bg-green-600"
                >
                    <span>💬</span> WhatsApp Admin
                </a>

                <a
                    href="mailto:support@tiketbus.id"
                    class="flex items-center justify-center gap-3 rounded-2xl bg-blue-800 py-4 font-bold text-white shadow-md shadow-blue-100 transition hover:bg-blue-900"
                >
                    <span>✉️</span> Email Support
                </a>

                <div class="mt-6 border-t pt-6">
                    <p class="mb-1 text-[10px] font-bold tracking-widest text-gray-400 uppercase">Kantor Pusat</p>
                    <p class="text-sm font-medium text-gray-600">Terminal Batubulan Sukawati Gianyar</p>
                </div>
                <div class="mt-6 text-center">
                    <a
                        href="/jadwal-saya"
                        class="text-xs font-bold tracking-widest text-gray-400 uppercase hover:text-blue-800"
                    >
                        Batal & Kembali
                    </a>
                </div>
            </div>
        </div>
    </main>
    <footer class="py-6 text-center text-[10px] tracking-[0.2em] text-gray-400 uppercase">
        &copy; 2026 TiketBus System
    </footer>
</body>
</html>
