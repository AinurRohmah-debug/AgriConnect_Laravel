<!DOCTYPE html>
<html>

<head>
    <title>Register Petani - AgriConnect</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 flex items-center justify-center min-h-screen p-6">
    <div class="bg-white p-10 rounded-2xl shadow-xl w-full max-w-xl">

        <h2 class="text-3xl font-extrabold mb-3 text-center text-green-600">
            Register Petani
        </h2>

        <p class="text-center text-gray-500 text-base mb-8">
            Buat akun untuk mengelola lahan, produk, dan menerima pesanan.
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

        <form method="POST" action="/register/petani" enctype="multipart/form-data" class="space-y-4">
            @csrf

            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">Nama Lengkap</label>
                <input type="text" name="nama_lengkap" placeholder="Masukkan nama lengkap Anda"
                    value="{{ old('nama_lengkap') }}"
                    class="w-full border border-gray-300 p-3 rounded-lg text-base focus:outline-none focus:ring-2 focus:ring-green-500"
                    required>
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">Email</label>
                <input type="email" name="email" placeholder="contoh@email.com" value="{{ old('email') }}"
                    class="w-full border border-gray-300 p-3 rounded-lg text-base focus:outline-none focus:ring-2 focus:ring-green-500"
                    required>
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">Password</label>
                <input type="password" name="password" placeholder="Minimal 8 karakter"
                    class="w-full border border-gray-300 p-3 rounded-lg text-base focus:outline-none focus:ring-2 focus:ring-green-500"
                    required>
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">Alamat Lengkap</label>
                <textarea name="alamat_pengiriman" rows="3" placeholder="Tuliskan alamat lengkap rumah atau lahan Anda"
                    class="w-full border border-gray-300 p-3 rounded-lg text-base focus:outline-none focus:ring-2 focus:ring-green-500"
                    required>{{ old('alamat_pengiriman') }}</textarea>
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">
                    Foto Profil
                </label>
                <input type="file" name="foto_profil" accept=".jpg,.jpeg,.png"
                    class="w-full border border-gray-300 p-2.5 rounded-lg text-base bg-gray-50 file:mr-4 file:py-1 file:px-3 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-green-50 file:text-green-700 hover:file:bg-green-100"
                    required>
            </div>

            <button type="submit"
                class="w-full bg-green-600 hover:bg-green-700 text-white py-3 px-4 rounded-lg text-lg font-medium transition shadow-md mt-2">
                Register Sekarang
            </button>
        </form>

        <div class="mt-8 space-y-3 text-center text-base text-gray-600 border-t pt-5">
            <div>
                Sudah memiliki akun?
                <a href="/login/petani" class="text-green-600 font-semibold hover:underline">
                    Login di sini
                </a>
            </div>

            <div>
                Ingin mendaftar sebagai pembeli?
                <a href="/register/pembeli" class="text-blue-600 font-semibold hover:underline">
                    Register Pembeli
                </a>
            </div>
        </div>

    </div>
</body>

</html>
