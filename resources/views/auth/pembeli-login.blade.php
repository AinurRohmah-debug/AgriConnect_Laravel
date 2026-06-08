<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Pembeli - AgriConnect</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 flex items-center justify-center min-h-screen p-6">

    <!-- Ukuran kartu diperbesar dari w-96 menjadi max-w-xl & padding p-8 menjadi p-10 -->
    <div class="bg-white p-10 rounded-2xl shadow-xl max-w-xl w-full">

        <!-- Ukuran teks judul ditingkatkan ke text-3xl -->
        <h2 class="text-3xl font-extrabold mb-3 text-center text-blue-600">
            Login Pembeli
        </h2>

        <!-- Ukuran teks deskripsi ditingkatkan ke text-base -->
        <p class="text-center text-gray-500 text-base mb-8">
            Masuk untuk membeli produk dan mengajukan minat lahan.
        </p>

        @if (session('error'))
            <div class="bg-red-100 border border-red-300 text-red-600 p-4 rounded-lg mb-6 text-base">
                {{ session('error') }}
            </div>
        @endif

        <!-- Jarak antar input (space-y-4) dibuat lebih renggang agar lebih jelas -->
        <form method="POST" action="/login/pembeli" class="space-y-4">
            @csrf

            <!-- Semua input diberikan padding p-3 dan text-base -->
            <div>
                <input type="email" name="email" placeholder="Email"
                    value="{{ old('email', $rememberedEmail ?? '') }}"
                    class="w-full border border-gray-300 p-3 rounded-lg text-base focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required>
            </div>

            <div>
                <input type="password" name="password" placeholder="Password"
                    class="w-full border border-gray-300 p-3 rounded-lg text-base focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required>
            </div>

            <!-- Checkbox dibuat sedikit lebih besar dan seimbang dengan teks -->
            <div class="flex items-center pt-1">
                <input type="checkbox" id="remember" name="remember"
                    class="w-4 h-4 mr-2.5 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                <label for="remember" class="text-base text-gray-600 select-none">
                    Ingat Saya
                </label>
            </div>

            <!-- Button dibuat lebih besar (py-3) dan teks lebih tegas -->
            <button type="submit"
                class="w-full bg-blue-600 hover:bg-blue-700 text-white py-3 px-4 rounded-lg font-bold text-lg transition shadow-md mt-4">
                Login
            </button>
        </form>

        <!-- Bagian navigasi bawah ditingkatkan ke text-base -->
        <div class="mt-8 text-center text-base text-gray-600">
            Belum memiliki akun?
            <a href="/register/pembeli" class="text-blue-600 font-semibold hover:underline">
                Daftar di sini
            </a>
        </div>

        <div class="mt-3 text-center text-base text-gray-600">
            Ingin menjadi petani?
            <a href="/register/petani" class="text-green-600 font-semibold hover:underline">
                Daftar sebagai Petani
            </a>
        </div>

        <div class="mt-8 text-center">
            <a href="/" class="text-gray-500 text-base hover:text-gray-700 hover:underline">
                Kembali ke Beranda
            </a>
        </div>

    </div>

</body>

</html>
