@extends('petani.layout')

@section('content')
    <div class="max-w-3xl mx-auto">

        <!-- HEADER -->
        <div class="mb-6">
            <h1 class="text-3xl font-bold text-gray-800 mb-2">
                Tambah Produk
            </h1>

            <p class="text-gray-500">
                Lengkapi informasi produk pertanian Anda dengan detail yang jelas agar mudah ditemukan pembeli.
            </p>
        </div>

        <!-- FORM CARD -->
        <div class="bg-white border border-gray-100 rounded-2xl shadow-sm overflow-hidden">

            <!-- CARD HEADER -->
            <div class="px-6 py-4 border-b border-gray-100 bg-gray-50">
                <h2 class="font-semibold text-gray-800">
                    Informasi Produk
                </h2>
                <p class="text-sm text-gray-500">
                    Pastikan data yang diisi sudah benar dan sesuai
                </p>
            </div>

            <!-- FORM BODY -->
            <div class="p-6 bg-gray-50">

                <form method="POST" action="/petani/produk" enctype="multipart/form-data" class="space-y-5">
                    @csrf

                    <!-- NAMA PRODUK -->
                    <div class="bg-white p-4 rounded-xl border border-gray-100 shadow-sm">
                        <label class="block text-sm font-semibold text-gray-700 mb-1">
                            Nama Produk
                        </label>
                        <input type="text" name="nama_produk"
                            class="w-full rounded-lg border-gray-200 focus:border-green-500 focus:ring focus:ring-green-100 p-3"
                            placeholder="Masukkan nama produk">
                    </div>

                    <!-- KATEGORI -->
                    <div class="bg-white p-4 rounded-xl border border-gray-100 shadow-sm">
                        <label class="block text-sm font-semibold text-gray-700 mb-1">
                            Kategori
                        </label>
                        <input type="text" name="kategori"
                            class="w-full rounded-lg border-gray-200 focus:border-green-500 focus:ring focus:ring-green-100 p-3"
                            placeholder="Contoh: Sayuran, Buah, Padi">
                    </div>

                    <!-- HARGA + STOK -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                        <div class="bg-white p-4 rounded-xl border border-gray-100 shadow-sm">
                            <label class="block text-sm font-semibold text-gray-700 mb-1">
                                Harga
                            </label>
                            <input type="number" name="harga"
                                class="w-full rounded-lg border-gray-200 focus:border-green-500 focus:ring focus:ring-green-100 p-3"
                                placeholder="Harga per satuan">
                        </div>

                        <div class="bg-white p-4 rounded-xl border border-gray-100 shadow-sm">
                            <label class="block text-sm font-semibold text-gray-700 mb-1">
                                Stok
                            </label>
                            <input type="number" name="stok"
                                class="w-full rounded-lg border-gray-200 focus:border-green-500 focus:ring focus:ring-green-100 p-3"
                                placeholder="Jumlah stok tersedia">
                        </div>

                    </div>

                    <!-- SATUAN -->
                    <div class="bg-white p-4 rounded-xl border border-gray-100 shadow-sm">
                        <label class="block text-sm font-semibold text-gray-700 mb-1">
                            Satuan
                        </label>
                        <input type="text" name="satuan"
                            class="w-full rounded-lg border-gray-200 focus:border-green-500 focus:ring focus:ring-green-100 p-3"
                            placeholder="Contoh: kg, ton, pcs">
                    </div>

                    <!-- FOTO -->
                    <div class="bg-white p-4 rounded-xl border border-gray-100 shadow-sm">
                        <label class="block text-sm font-semibold text-gray-700 mb-1">
                            Foto Produk
                        </label>

                        <input type="file" name="foto_produk"
                            class="w-full border border-gray-200 rounded-lg p-3 bg-white file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:bg-green-50 file:text-green-700">
                    </div>

                    <!-- DESKRIPSI -->
                    <div class="bg-white p-4 rounded-xl border border-gray-100 shadow-sm">
                        <label class="block text-sm font-semibold text-gray-700 mb-1">
                            Deskripsi
                        </label>

                        <textarea name="deskripsi" rows="4"
                            class="w-full rounded-lg border-gray-200 focus:border-green-500 focus:ring focus:ring-green-100 p-3 resize-none"
                            placeholder="Jelaskan kualitas, keunggulan, dan detail produk"></textarea>
                    </div>

                    <!-- BUTTON -->
                    <div class="pt-2">
                        <button type="submit"
                            class="bg-green-600 hover:bg-green-700 text-white px-6 py-3 rounded-xl font-semibold transition w-full md:w-auto">
                            Simpan Produk
                        </button>
                    </div>

                </form>

            </div>
        </div>

    </div>
@endsection
