<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>AgriConnect</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        html {
            scroll-behavior: smooth;
        }

        /* Terapkan font Inter sebagai font utama platform */
        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif;
        }
    </style>
</head>

<body class="bg-gray-50 text-gray-800 antialiased tracking-normal">

    <nav class="fixed top-0 w-full bg-white/80 backdrop-blur-md border-b border-gray-100 z-50">
        <div class="max-w-7xl mx-auto flex items-center justify-between px-6 py-4">

            <div class="flex items-center gap-4">
                <img src="{{ asset('images/agriconnect-logo2.png') }}" class="w-16 h-16 object-contain"
                    alt="AgriConnect Logo">

                <div>
                    <h1 class="text-2xl md:text-3xl font-extrabold text-green-600 tracking-tight">
                        AgriConnect
                    </h1>
                    <p class="text-xs md:text-sm text-gray-400 font-medium tracking-wide mt-0.5 uppercase">
                        Connecting Farmers, Empowering Futures
                    </p>
                </div>
            </div>

            <div class="hidden md:flex gap-2 text-base font-semibold text-gray-600">
                <a href="#home"
                    class="px-4 py-2.5 rounded-xl hover:bg-gray-100/70 hover:text-green-600 transition-all duration-200">Home</a>
                <a href="#about"
                    class="px-4 py-2.5 rounded-xl hover:bg-gray-100/70 hover:text-green-600 transition-all duration-200">About</a>
                <a href="#login"
                    class="px-4 py-2.5 rounded-xl hover:bg-gray-100/70 hover:text-green-600 transition-all duration-200">Login</a>
                <a href="#contact"
                    class="px-4 py-2.5 rounded-xl hover:bg-gray-100/70 hover:text-green-600 transition-all duration-200">Contact</a>
            </div>

        </div>
    </nav>

    <section id="home" class="pt-40 pb-20 min-h-screen flex items-center justify-center">
        <div class="max-w-7xl mx-auto px-8 grid md:grid-cols-2 gap-16 items-center">

            <div>

                <h1 class="text-4xl md:text-6xl font-extrabold text-green-600 mb-6 leading-[1.1] tracking-tight">
                    Smart Agriculture Ecosystem Platform
                </h1>

                <p class="mb-6 text-gray-600 leading-relaxed text-base md:text-xl font-normal">
                    AgriConnect adalah platform digital yang menghubungkan petani dan pembeli secara langsung untuk
                    menciptakan ekosistem pertanian yang lebih efisien, transparan, dan berkelanjutan.
                </p>

                <p class="text-sm md:text-base text-gray-400 mb-10 leading-relaxed font-normal">
                    Platform ini membantu mempercepat distribusi hasil pertanian, meningkatkan pendapatan petani,
                    serta memberikan akses produk segar bagi pembeli tanpa perantara.
                </p>

                <div class="grid grid-cols-3 gap-5 mb-10 text-center">

                    <div class="bg-white border border-gray-100 rounded-2xl p-5 shadow-sm">
                        <p class="text-2xl md:text-4xl font-bold text-green-600 tracking-tight">100+</p>
                        <p class="text-xs md:text-sm font-semibold text-gray-400 mt-1 uppercase tracking-wider">Petani
                        </p>
                    </div>

                    <div class="bg-white border border-gray-100 rounded-2xl p-5 shadow-sm">
                        <p class="text-2xl md:text-4xl font-bold text-blue-600 tracking-tight">50+</p>
                        <p class="text-xs md:text-sm font-semibold text-gray-400 mt-1 uppercase tracking-wider">Pembeli
                        </p>
                    </div>

                    <div class="bg-white border border-gray-100 rounded-2xl p-5 shadow-sm">
                        <p class="text-2xl md:text-4xl font-bold text-gray-800 tracking-tight">24/7</p>
                        <p class="text-xs md:text-sm font-semibold text-gray-400 mt-1 uppercase tracking-wider">Akses
                        </p>
                    </div>

                </div>

                <div class="flex flex-col sm:flex-row gap-4 text-base font-semibold tracking-wide">

                    <a href="/register/petani"
                        class="bg-green-600 hover:bg-green-700 text-white px-8 py-4 rounded-xl transition-all shadow-sm hover:shadow-md text-center flex-1">
                        Register Petani
                    </a>

                    <a href="/register/pembeli"
                        class="bg-blue-600 hover:bg-blue-700 text-white px-8 py-4 rounded-xl transition-all shadow-sm hover:shadow-md text-center flex-1">
                        Register Pembeli
                    </a>

                </div>

            </div>

            <div class="space-y-6">

                <img src="https://images.unsplash.com/photo-1500937386664-56d1dfef3854"
                    class="rounded-3xl shadow-xl w-full h-72 md:h-96 object-cover" alt="Agriculture">

                <div class="grid grid-cols-2 gap-6">

                    <img src="https://images.unsplash.com/photo-1523741543316-beb7fc7023d8"
                        class="rounded-2xl h-44 md:h-56 w-full object-cover shadow-md" alt="Farmer">

                    <img src="https://images.unsplash.com/photo-1601004890684-d8cbf643f5f2"
                        class="rounded-2xl h-44 md:h-56 w-full object-cover shadow-md" alt="Harvest">

                </div>

            </div>

        </div>
    </section>

    <section id="about"
        class="py-24 min-h-screen flex items-center justify-center bg-gradient-to-b from-white to-green-50">
        <div class="max-w-5xl text-center px-8">

            <h2 class="text-3xl md:text-5xl font-extrabold mb-8 text-green-700 tracking-tight">
                Tentang AgriConnect
            </h2>

            <div class="border border-green-100 rounded-3xl p-8 md:p-10 bg-white shadow-md mb-10">
                <p class="text-gray-600 leading-relaxed text-base md:text-xl font-normal">
                    AgriConnect dirancang sebagai solusi digital untuk menghubungkan seluruh ekosistem pertanian dalam
                    satu platform terintegrasi.
                </p>
            </div>

            <div class="grid md:grid-cols-3 gap-6 text-left">

                <div class="bg-green-50 p-6 md:p-8 rounded-2xl border border-green-100/70 shadow-sm">
                    <p class="font-bold text-lg md:text-xl text-green-700 mb-2 tracking-tight">Marketplace Produk</p>
                    <p class="text-sm md:text-base text-gray-600 leading-relaxed">Transaksi langsung tanpa perantara.
                    </p>
                </div>

                <div class="bg-blue-50 p-6 md:p-8 rounded-2xl border border-blue-100/70 shadow-sm">
                    <p class="font-bold text-lg md:text-xl text-blue-700 mb-2 tracking-tight">Marketplace Lahan</p>
                    <p class="text-sm md:text-base text-gray-600 leading-relaxed">Kelola & ajukan minat lahan.</p>
                </div>

                <div class="bg-emerald-50 p-6 md:p-8 rounded-2xl border border-emerald-100/70 shadow-sm">
                    <p class="font-bold text-lg md:text-xl text-emerald-700 mb-2 tracking-tight">Chat System</p>
                    <p class="text-sm md:text-base text-gray-600 leading-relaxed">Komunikasi real-time.</p>
                </div>

            </div>

        </div>
    </section>

    <section id="login" class="py-24 min-h-screen flex items-center justify-center bg-gray-50">
        <div class="max-w-6xl w-full px-8 text-center">

            <h2 class="text-3xl md:text-5xl font-extrabold mb-4 tracking-tight">Login</h2>

            <p class="text-gray-500 mb-12 max-w-3xl mx-auto text-base md:text-lg font-normal">
                Pilih peran sesuai akun Anda untuk mengakses fitur yang berbeda.
            </p>

            <div class="grid md:grid-cols-3 gap-6 mb-10">

                <div class="bg-white border border-gray-200/60 rounded-2xl p-6 md:p-8 text-left shadow-sm">
                    <p class="font-bold text-lg md:text-xl text-gray-950 tracking-tight">Admin Access</p>
                    <p class="text-sm md:text-base text-gray-500 mt-2 leading-relaxed">
                        Mengelola verifikasi pengguna, data lahan, dan monitoring sistem.
                    </p>
                </div>

                <div class="bg-white border border-gray-200/60 rounded-2xl p-6 md:p-8 text-left shadow-sm">
                    <p class="font-bold text-lg md:text-xl text-green-700 tracking-tight">Petani Access</p>
                    <p class="text-sm md:text-base text-gray-500 mt-2 leading-relaxed">
                        Mengelola produk, lahan, serta interaksi dengan pembeli.
                    </p>
                </div>

                <div class="bg-white border border-gray-200/60 rounded-2xl p-6 md:p-8 text-left shadow-sm">
                    <p class="font-bold text-lg md:text-xl text-blue-700 tracking-tight">Pembeli Access</p>
                    <p class="text-sm md:text-base text-gray-500 mt-2 leading-relaxed">
                        Membeli produk, mengajukan minat lahan, dan transaksi.
                    </p>
                </div>

            </div>

            <div class="border border-gray-200/80 rounded-3xl p-8 bg-white shadow-md">

                <div class="grid md:grid-cols-3 gap-6">

                    <a href="/login/admin"
                        class="bg-gray-950 hover:bg-gray-800 text-white rounded-2xl p-6 md:p-8 transition-all text-left shadow-sm hover:shadow-md">
                        <div class="font-bold text-lg md:text-xl tracking-tight">Login Admin</div>
                        <div class="text-xs md:text-sm text-gray-400 mt-2 font-medium">Dashboard & kontrol</div>
                    </a>

                    <a href="/login/petani"
                        class="bg-green-600 hover:bg-green-700 text-white rounded-2xl p-6 md:p-8 transition-all text-left shadow-sm hover:shadow-md">
                        <div class="font-bold text-lg md:text-xl tracking-tight">Login Petani</div>
                        <div class="text-xs md:text-sm text-green-100/90 mt-2 font-medium">Kelola produk</div>
                    </a>

                    <a href="/login/pembeli"
                        class="bg-blue-600 hover:bg-blue-700 text-white rounded-2xl p-6 md:p-8 transition-all text-left shadow-sm hover:shadow-md">
                        <div class="font-bold text-lg md:text-xl tracking-tight">Login Pembeli</div>
                        <div class="text-xs md:text-sm text-blue-100/90 mt-2 font-medium">Belanja & transaksi</div>
                    </a>

                </div>

            </div>

        </div>
    </section>

    <section id="contact"
        class="py-24 min-h-screen flex items-center justify-center bg-gradient-to-b from-white to-blue-50">
        <div class="max-w-5xl w-full px-8 text-center">

            <h2 class="text-3xl md:text-5xl font-extrabold mb-8 text-blue-700 tracking-tight">
                Contact & Support
            </h2>

            <div class="border border-blue-100 rounded-3xl p-8 md:p-12 bg-white shadow-md">

                <p class="text-gray-600 mb-8 text-base md:text-xl font-normal">
                    Tim AgriConnect siap membantu Anda.
                </p>

                <div class="grid md:grid-cols-2 gap-6 text-base md:text-lg">

                    <div class="bg-blue-50 border border-blue-100 rounded-2xl p-6 text-left shadow-sm">
                        <p class="font-bold text-blue-700 mb-1 tracking-tight">Email Support</p>
                        <p class="text-gray-700 font-medium">support@agriconnect.com</p>
                    </div>

                    <div class="bg-green-50 border border-green-100 rounded-2xl p-6 text-left shadow-sm">
                        <p class="font-bold text-green-700 mb-1 tracking-tight">WhatsApp</p>
                        <p class="text-gray-700 font-medium">0812-3456-7890</p>
                    </div>

                </div>

            </div>

        </div>
    </section>

</body>

</html>
