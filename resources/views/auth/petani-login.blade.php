<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Petani - AgriConnect</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 flex items-center justify-center min-h-screen p-6">

    <div class="bg-white p-10 rounded-2xl shadow-xl max-w-xl w-full">

        <h2 class="text-3xl font-extrabold mb-3 text-center text-green-600">
            Login Petani
        </h2>

        <p class="text-center text-gray-500 text-base mb-8">
            Masuk untuk mengelola lahan, produk, dan pesanan.
        </p>

        @if (session('error'))
            <div class="bg-red-100 border border-red-300 text-red-600 p-4 rounded-lg mb-6 text-base">
                {{ session('error') }}
            </div>
        @endif

        <form method="POST" action="/login/petani" class="space-y-4">
            @csrf

            <div>
                <input type="email" name="email" placeholder="Email"
                    value="{{ old('email', $rememberedEmail ?? '') }}"
                    class="w-full border border-gray-300 p-3 rounded-lg text-base focus:outline-none focus:ring-2 focus:ring-green-500"
                    required>
            </div>

            <div>
                <input type="password" name="password" placeholder="Password"
                    class="w-full border border-gray-300 p-3 rounded-lg text-base focus:outline-none focus:ring-2 focus:ring-green-500"
                    required>
            </div>

            <div class="flex items-center pt-1">
                <input type="checkbox" id="remember" name="remember"
                    class="w-4 h-4 mr-2.5 text-green-600 border-gray-300 rounded focus:ring-green-500"
                    {{ isset($rememberedEmail) ? 'checked' : '' }}>

                <label for="remember" class="text-base text-gray-600 select-none">
                    Ingat Saya
                </label>
            </div>

            <button type="submit"
                class="w-full bg-green-600 hover:bg-green-700 text-white py-3 px-4 rounded-lg font-bold text-lg transition shadow-md mt-4">
                Login
            </button>
        </form>

        <div class="mt-8 text-center text-base text-gray-600">
            Belum memiliki akun?
            <a href="/register/petani" class="text-green-600 font-semibold hover:underline">
                Daftar di sini
            </a>
        </div>

        <div class="mt-3 text-center text-base text-gray-600">
            Ingin menjadi pembeli?
            <a href="/register/pembeli" class="text-blue-600 font-semibold hover:underline">
                Daftar sebagai Pembeli
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
