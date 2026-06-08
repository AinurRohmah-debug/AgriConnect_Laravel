<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin - AgriConnect</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 flex items-center justify-center min-h-screen p-6">

    <div class="bg-white p-10 rounded-2xl shadow-xl max-w-xl w-full">

        <h2 class="text-3xl font-extrabold mb-3 text-center text-gray-800">
            Login Admin
        </h2>

        <p class="text-center text-gray-500 text-base mb-8">
            Masuk untuk mengelola sistem AgriConnect.
        </p>

        @if (session('error'))
            <div class="bg-red-100 border border-red-300 text-red-600 p-4 rounded-lg mb-6 text-base">
                {{ session('error') }}
            </div>
        @endif

        <form method="POST" action="/login/admin" class="space-y-4">
            @csrf

            <div>
                <input type="email" name="email" placeholder="Email"
                    value="{{ old('email', $rememberedEmail ?? '') }}"
                    class="w-full border border-gray-300 p-3 rounded-lg text-base focus:outline-none focus:ring-2 focus:ring-gray-800"
                    required>
            </div>

            <div>
                <input type="password" name="password" placeholder="Password"
                    class="w-full border border-gray-300 p-3 rounded-lg text-base focus:outline-none focus:ring-2 focus:ring-gray-800"
                    required>
            </div>

            <div class="flex items-center pt-1">
                <input type="checkbox" name="remember" id="remember"
                    class="w-4 h-4 mr-2.5 text-gray-800 border-gray-300 rounded focus:ring-gray-800"
                    {{ isset($rememberedEmail) ? 'checked' : '' }}>

                <label for="remember" class="text-base text-gray-600 select-none">
                    Ingat saya
                </label>
            </div>

            <button type="submit"
                class="w-full bg-black hover:bg-gray-800 text-white py-3 px-4 rounded-lg font-bold text-lg transition shadow-md mt-4">
                Login Admin
            </button>
        </form>

        <div class="mt-8 text-center">
            <a href="/" class="text-gray-500 text-base hover:text-gray-700 hover:underline">
                Kembali ke Beranda
            </a>
        </div>

    </div>
</body>

</html>
