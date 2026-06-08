@extends('petani.layout')

@section('content')
    <div class="max-w-3xl mx-auto">

        <!-- HEADER -->
        <div class="mb-6">
            <h1 class="text-3xl font-bold text-gray-800 mb-2">
                Tambah Lahan
            </h1>

            <p class="text-gray-500 leading-relaxed">
                Tambahkan informasi lahan secara lengkap dan akurat.
                Data yang jelas akan meningkatkan peluang lahan Anda dilihat dan diminati pembeli.
            </p>
        </div>

        <!-- FORM CARD -->
        <div class="bg-white border border-gray-100 shadow-sm rounded-2xl p-6">

            <form method="POST" action="/petani/lahan" enctype="multipart/form-data" class="space-y-6">
                @csrf

                <!-- KOMODITAS -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">
                        Komoditas
                    </label>

                    <input type="text" name="komoditas" placeholder="Contoh: Padi, Jagung, Cabai"
                        class="w-full rounded-xl border-gray-200 focus:border-green-500 focus:ring focus:ring-green-100 p-3">

                    <p class="text-xs text-gray-500 mt-1">
                        Isi dengan jenis tanaman utama yang ditanam pada lahan.
                    </p>
                </div>

                <!-- LUAS -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">
                        Luas Lahan
                    </label>

                    <input type="text" name="luas_lahan" placeholder="Contoh: 2.5 (dalam hektar)"
                        class="w-full rounded-xl border-gray-200 focus:border-green-500 focus:ring focus:ring-green-100 p-3">

                    <p class="text-xs text-amber-600 mt-1">
                        Gunakan angka saja (misal: 2.5). Jangan menulis “2 hektar”.
                    </p>
                </div>

                <!-- ALAMAT -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">
                        Alamat Lahan
                    </label>

                    <input type="text" name="alamat_lahan" placeholder="Contoh: Kecamatan X, Kabupaten Y"
                        class="w-full rounded-xl border-gray-200 focus:border-green-500 focus:ring focus:ring-green-100 p-3">

                    <p class="text-xs text-gray-500 mt-1">
                        Gunakan alamat singkat namun jelas agar mudah ditemukan.
                    </p>
                </div>

                <!-- HARGA -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1">
                            Harga Minimum
                        </label>

                        <input type="number" name="harga_min" placeholder="Contoh: 10000000"
                            class="w-full rounded-xl border-gray-200 focus:border-green-500 focus:ring focus:ring-green-100 p-3">

                        <p class="text-xs text-gray-500 mt-1">
                            Harga terendah yang Anda terima.
                        </p>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1">
                            Harga Maksimum
                        </label>

                        <input type="number" name="harga_max" placeholder="Contoh: 15000000"
                            class="w-full rounded-xl border-gray-200 focus:border-green-500 focus:ring focus:ring-green-100 p-3">

                        <p class="text-xs text-gray-500 mt-1">
                            Harga tertinggi yang Anda tawarkan.
                        </p>
                    </div>

                </div>

                <!-- VALIDATION NOTE -->
                <div class="bg-yellow-50 border border-yellow-200 rounded-xl p-3 text-xs text-yellow-700">
                    Pastikan harga maksimum ≥ harga minimum untuk menghindari error input.
                </div>

                <!-- ESTIMASI PANEN -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">
                        Estimasi Panen
                    </label>

                    <input type="date" name="estimasi_panen"
                        class="w-full rounded-xl border-gray-200 focus:border-green-500 focus:ring focus:ring-green-100 p-3">

                    <p class="text-xs text-gray-500 mt-1">
                        Pilih tanggal perkiraan panen berdasarkan kondisi tanaman.
                    </p>
                </div>

                <!-- DESKRIPSI -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">
                        Deskripsi Lahan
                    </label>

                    <textarea name="deskripsi" rows="4"
                        placeholder="Contoh: Tanah subur, dekat sumber air, cocok untuk tanaman hortikultura"
                        class="w-full rounded-xl border-gray-200 focus:border-green-500 focus:ring focus:ring-green-100 p-3 resize-none"></textarea>

                    <p class="text-xs text-gray-500 mt-1">
                        Jelaskan kondisi tanah, akses air, dan keunggulan lahan.
                    </p>
                </div>

                <!-- FOTO -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">
                        Foto Lahan
                    </label>

                    <input type="file" name="foto_lahan"
                        class="w-full border border-gray-200 rounded-xl p-3 bg-white file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:bg-green-50 file:text-green-700">

                    <p class="text-xs text-gray-500 mt-1">
                        Upload foto terbaik lahan (opsional tapi sangat disarankan).
                    </p>
                </div>

                <!-- CHECKBOX -->
                <label class="flex items-center gap-2 text-sm text-gray-700">
                    <input type="checkbox" name="bisa_nego" value="1"
                        class="w-4 h-4 text-green-600 border-gray-300 rounded focus:ring-green-500">

                    Bisa Nego Harga
                </label>

                <!-- BUTTON -->
                <div class="pt-2">
                    <button type="submit"
                        class="bg-green-600 hover:bg-green-700 text-white px-6 py-3 rounded-xl font-semibold transition w-full md:w-auto">
                        Simpan Lahan
                    </button>
                </div>

            </form>

        </div>

    </div>
@endsection
