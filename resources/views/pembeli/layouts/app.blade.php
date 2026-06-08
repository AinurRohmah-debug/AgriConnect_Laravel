<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembeli Dashboard</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        body {
            font-family: ui-sans-serif, system-ui, -apple-system, Segoe UI, Roboto, Helvetica, Arial;
        }

        /* Scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
            height: 8px;
        }

        ::-webkit-scrollbar-track {
            background: #f3f4f6;
        }

        ::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border-radius: 999px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #94a3b8;
        }
    </style>
</head>

<body class="bg-gray-50 text-gray-800 overflow-x-hidden">

    <div class="flex h-screen overflow-hidden">

        <!-- SIDEBAR -->
        <aside
            class="w-64 min-w-[16rem] shrink-0 bg-white border-r border-gray-100 flex flex-col h-screen sticky top-0 shadow-sm">
            <!-- HEADER -->
            <div class="p-5 border-b border-gray-100 space-y-4">

                <!-- USER GREETING -->
                <div class="px-4 py-3 bg-gray-50 rounded-lg">
                    <p class="text-xs text-gray-500">Selamat datang,</p>
                    <p class="text-sm font-semibold text-gray-800">
                        {{ session('user.nama') ?? 'Petani' }}
                    </p>
                </div>

                <!-- BRAND -->
                <div>
                    <h1 class="text-xl font-bold text-green-600 tracking-tight">
                        Pembeli Panel
                    </h1>
                    <p class="text-xs text-gray-500 mt-1">
                        Transaksi AgriConnect
                    </p>
                </div>

            </div>

            <!-- MENU -->
            <nav class="flex-1 px-4 py-5 space-y-2 text-sm font-medium overflow-y-auto">

                <a href="/pembeli/dashboard"
                    class="block px-4 py-3 rounded-xl transition
                    {{ request()->is('pembeli/dashboard') ? 'bg-green-50 text-green-700 font-semibold border border-green-100' : 'text-gray-700 hover:bg-gray-50' }}">
                    Dashboard
                </a>

                <a href="/pembeli/produk"
                    class="block px-4 py-3 rounded-xl transition
                    {{ request()->is('pembeli/produk*') ? 'bg-green-50 text-green-700 font-semibold border border-green-100' : 'text-gray-700 hover:bg-gray-50' }}">
                    Produk
                </a>

                <a href="/pembeli/lahan"
                    class="block px-4 py-3 rounded-xl transition
                    {{ request()->is('pembeli/lahan*') ? 'bg-green-50 text-green-700 font-semibold border border-green-100' : 'text-gray-700 hover:bg-gray-50' }}">
                    Lahan
                </a>

                <a href="/pembeli/keranjang"
                    class="block px-4 py-3 rounded-xl transition
                    {{ request()->is('pembeli/keranjang*') ? 'bg-green-50 text-green-700 font-semibold border border-green-100' : 'text-gray-700 hover:bg-gray-50' }}">
                    Keranjang
                </a>

                <a href="/pembeli/pesanan"
                    class="block px-4 py-3 rounded-xl transition
                    {{ request()->is('pembeli/pesanan*') ? 'bg-green-50 text-green-700 font-semibold border border-green-100' : 'text-gray-700 hover:bg-gray-50' }}">
                    Status Pesanan
                </a>

                <a href="/pembeli/minat"
                    class="block px-4 py-3 rounded-xl transition
                    {{ request()->is('pembeli/minat*') ? 'bg-green-50 text-green-700 font-semibold border border-green-100' : 'text-gray-700 hover:bg-gray-50' }}">
                    Status Minat
                </a>

            </nav>

            <!-- LOGOUT -->
            <div class="p-4 border-t border-gray-100">

                <a href="/logout"
                    class="flex items-center justify-center w-full px-4 py-3 rounded-xl bg-red-50 text-red-600 hover:bg-red-100 transition duration-200 font-medium">
                    Logout
                </a>

            </div>

        </aside>

        <!-- CONTENT -->
        <main class="flex-1 overflow-auto bg-gray-50">

            <div class="p-8 w-full max-w-[1600px] mx-auto">

                @yield('content')

            </div>

        </main>

    </div>

</body>

</html>
