<!DOCTYPE html>
<html>

<head>
    <title>Petani Panel</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-50 text-gray-800 overflow-x-hidden">

    <div class="flex min-h-screen">

        <!-- SIDEBAR (FIXED + STICKY + NO SHIFT) -->
        <aside class="w-64 shrink-0 bg-white border-r border-gray-100 flex flex-col h-screen sticky top-0">

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
                        Petani Panel
                    </h1>
                    <p class="text-xs text-gray-500 mt-1">
                        Agriculture Management System
                    </p>
                </div>

            </div>

            <!-- NAVIGATION -->
            <nav class="flex-1 p-5 space-y-2 text-sm font-medium overflow-y-auto">

                <a href="/petani/dashboard"
                    class="block px-3 py-2 rounded-lg transition
                    {{ request()->is('petani/dashboard') ? 'bg-green-50 text-green-700 font-semibold' : 'text-gray-700 hover:bg-gray-50' }}">
                    Dashboard
                </a>

                <a href="/petani/produk"
                    class="block px-3 py-2 rounded-lg transition
                    {{ request()->is('petani/produk*') ? 'bg-green-50 text-green-700 font-semibold' : 'text-gray-700 hover:bg-gray-50' }}">
                    Produk
                </a>

                <a href="/petani/lahan"
                    class="block px-3 py-2 rounded-lg transition
                    {{ request()->is('petani/lahan*') ? 'bg-green-50 text-green-700 font-semibold' : 'text-gray-700 hover:bg-gray-50' }}">
                    Lahan
                </a>

                <a href="/petani/minat"
                    class="block px-3 py-2 rounded-lg transition
                    {{ request()->is('petani/minat*') ? 'bg-green-50 text-green-700 font-semibold' : 'text-gray-700 hover:bg-gray-50' }}">
                    Minat Pembeli
                </a>

                <a href="/petani/pesanan"
                    class="block px-3 py-2 rounded-lg transition
                    {{ request()->is('petani/pesanan*') ? 'bg-green-50 text-green-700 font-semibold' : 'text-gray-700 hover:bg-gray-50' }}">
                    Pesanan Masuk
                </a>

            </nav>

            <!-- LOGOUT (BOTTOM FIXED AREA) -->
            <div class="p-4 border-t border-gray-100">

                <a href="/logout"
                    class="flex items-center justify-center w-full px-4 py-3 rounded-xl bg-red-50 text-red-600 hover:bg-red-100 transition duration-200 font-medium">
                    Logout
                </a>

            </div>

        </aside>

        <!-- CONTENT -->
        <main class="flex-1 min-w-0 p-6 overflow-x-auto">

            @yield('content')

        </main>

    </div>

</body>

</html>
