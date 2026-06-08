<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        body {
            font-family: ui-sans-serif, system-ui, -apple-system, Segoe UI, Roboto, Helvetica, Arial;
        }

        /* Custom Scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
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

<body class="bg-gray-50 text-gray-800 overflow-hidden">

    <div class="flex h-screen">

        <!-- SIDEBAR -->
        <aside class="w-64 shrink-0 bg-white border-r border-gray-100 flex flex-col h-screen sticky top-0 shadow-sm">

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
                        Admin Panel
                    </h1>
                    <p class="text-xs text-gray-500 mt-1">
                        Management System
                    </p>
                </div>

            </div>

            <!-- NAVIGATION -->
            <nav class="flex-1 px-4 py-5 space-y-2 text-sm font-medium">

                <a href="/admin/dashboard"
                    class="flex items-center px-4 py-3 rounded-xl transition duration-200
                    {{ request()->is('admin/dashboard') ? 'bg-green-50 text-green-700 font-semibold border border-green-100' : 'text-gray-700 hover:bg-gray-50' }}">
                    Dashboard
                </a>

                <a href="/admin/petani"
                    class="flex items-center px-4 py-3 rounded-xl transition duration-200
                    {{ request()->is('admin/petani*') ? 'bg-green-50 text-green-700 font-semibold border border-green-100' : 'text-gray-700 hover:bg-gray-50' }}">
                    Verifikasi Petani
                </a>

                <a href="/admin/lahan"
                    class="flex items-center px-4 py-3 rounded-xl transition duration-200
                    {{ request()->is('admin/lahan*') ? 'bg-green-50 text-green-700 font-semibold border border-green-100' : 'text-gray-700 hover:bg-gray-50' }}">
                    Verifikasi Lahan
                </a>

            </nav>

            <!-- FOOTER SIDEBAR -->
            <div class="p-4 border-t border-gray-100">

                <a href="/logout"
                    class="flex items-center justify-center w-full px-4 py-3 rounded-xl bg-red-50 text-red-600 hover:bg-red-100 transition duration-200 font-medium">
                    Logout
                </a>

            </div>

        </aside>

        <!-- CONTENT -->
        <main class="flex-1 overflow-y-auto">

            <div class="p-8">

                @yield('content')

            </div>

        </main>

    </div>

</body>

</html>
