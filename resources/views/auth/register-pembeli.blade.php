<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Pembeli - AgriConnect</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 flex items-center justify-center min-h-screen p-6">

    <div class="bg-white p-10 rounded-2xl shadow-xl max-w-xl w-full">

        <h2 class="text-3xl font-extrabold mb-3 text-center text-blue-600">
            Register Pembeli
        </h2>

        <p class="text-center text-gray-500 text-base mb-8">
            Buat akun untuk mulai berbelanja produk dan mengajukan minat lahan.
        </p>

        @if ($errors->any())
            <div class="bg-red-100 border border-red-300 text-red-600 p-4 rounded-lg mb-6 text-base">
                <ul class="list-disc list-inside space-y-1">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="/register/pembeli" enctype="multipart/form-data" class="space-y-4">
            @csrf

            <div>
                <input type="text" name="nama_lengkap" placeholder="Nama Lengkap" value="{{ old('nama_lengkap') }}"
                    class="w-full border border-gray-300 p-3 rounded-lg text-base focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required>
            </div>

            <div>
                <input type="email" name="email" placeholder="Email" value="{{ old('email') }}"
                    class="w-full border border-gray-300 p-3 rounded-lg text-base focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required>
            </div>

            <div>
                <input type="password" name="password" placeholder="Password"
                    class="w-full border border-gray-300 p-3 rounded-lg text-base focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required>
            </div>

            <div>
                <textarea name="alamat_pengiriman" rows="4" placeholder="Alamat Pengiriman Lengkap"
                    class="w-full border border-gray-300 p-3 rounded-lg text-base focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required>{{ old('alamat_pengiriman') }}</textarea>
            </div>

            <div>
                <label class="block text-base font-semibold text-gray-700 mb-2">
                    Foto Profil
                </label>
                <input type="file" name="foto_profil" accept=".jpg,.jpeg,.png"
                    class="w-full border border-gray-300 p-2.5 rounded-lg text-base file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100"
                    required>
            </div>

            <button type="submit"
                class="w-full bg-blue-600 hover:bg-blue-700 text-white py-3 px-4 rounded-lg font-bold text-lg transition shadow-md mt-2">
                Register
            </button>
        </form>

        <div class="mt-8 text-center text-base text-gray-600">
            Sudah memiliki akun?
            <a href="/login/pembeli" class="text-blue-600 font-semibold hover:underline">
                Login di sini
            </a>
        </div>

        <div class="mt-3 text-center text-base text-gray-600">
            Ingin mendaftar sebagai petani?
            <a href="/register/petani" class="text-green-600 font-semibold hover:underline">
                Register Petani
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
