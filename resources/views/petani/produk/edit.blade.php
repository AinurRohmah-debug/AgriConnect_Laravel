@extends('petani.layout')

@section('content')
    <div class="max-w-3xl mx-auto">

        <!-- HEADER -->
        <div class="mb-6">
            <h1 class="text-3xl font-bold text-gray-800 mb-2">
                Edit Produk
            </h1>

            <p class="text-gray-500">
                Perbarui informasi produk Anda untuk menjaga data tetap akurat dan relevan.
            </p>
        </div>

        <!-- FORM WRAPPER (beda dari background utama) -->
        <div class="bg-gray-50 border border-gray-200 rounded-2xl shadow-md p-6">

            <!-- FORM CARD -->
            <div class="bg-white border border-gray-100 rounded-2xl shadow-sm p-6">

                <form method="POST" action="/petani/produk/{{ $produk->id }}" enctype="multipart/form-data"
                    class="space-y-5">
                    @csrf
                    @method('PUT')

                    <!-- NAMA PRODUK -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1">
                            Nama Produk
                        </label>
                        <input type="text" name="nama_produk" value="{{ $produk->nama_produk }}"
                            class="w-full rounded-xl border-gray-200 focus:border-blue-500 focus:ring focus:ring-blue-100 p-3">
                    </div>

                    <!-- KATEGORI -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1">
                            Kategori
                        </label>
                        <input type="text" name="kategori" value="{{ $produk->kategori }}"
                            class="w-full rounded-xl border-gray-200 focus:border-blue-500 focus:ring focus:ring-blue-100 p-3">
                    </div>

                    <!-- HARGA + STOK -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-1">
                                Harga
                            </label>
                            <input type="number" name="harga" value="{{ $produk->harga }}"
                                class="w-full rounded-xl border-gray-200 focus:border-blue-500 focus:ring focus:ring-blue-100 p-3">
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-1">
                                Stok
                            </label>
                            <input type="number" name="stok" value="{{ $produk->stok }}"
                                class="w-full rounded-xl border-gray-200 focus:border-blue-500 focus:ring focus:ring-blue-100 p-3">
                        </div>

                    </div>

                    <!-- SATUAN -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1">
                            Satuan
                        </label>
                        <input type="text" name="satuan" value="{{ $produk->satuan }}"
                            class="w-full rounded-xl border-gray-200 focus:border-blue-500 focus:ring focus:ring-blue-100 p-3">
                    </div>

                    <!-- FOTO LAMA -->
                    @if ($produk->foto_produk)
                        <div class="bg-gray-100 border border-gray-200 rounded-xl p-4">
                            <p class="text-sm font-semibold text-gray-700 mb-2">
                                Foto Produk Saat Ini
                            </p>

                            <img src="{{ asset('storage/' . $produk->foto_produk) }}"
                                class="w-28 h-28 object-cover rounded-lg border">
                        </div>
                    @endif

                    <!-- FOTO BARU -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1">
                            Ganti Foto Produk
                        </label>

                        <input type="file" name="foto_produk"
                            class="w-full border border-gray-200 rounded-xl p-3 bg-white file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:bg-blue-50 file:text-blue-700">
                    </div>

                    <!-- DESKRIPSI -->
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1">
                            Deskripsi
                        </label>

                        <textarea name="deskripsi" rows="4"
                            class="w-full rounded-xl border-gray-200 focus:border-blue-500 focus:ring focus:ring-blue-100 p-3 resize-none">{{ $produk->deskripsi }}</textarea>
                    </div>

                    <!-- BUTTON -->
                    <div class="pt-2">
                        <button type="submit"
                            class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-xl font-semibold transition w-full md:w-auto">
                            Update Produk
                        </button>
                    </div>

                </form>

            </div>
        </div>

    </div>
@endsection
