@extends('petani.layout')

@section('content')
    <div class="max-w-3xl mx-auto">

        <!-- HEADER -->
        <div class="mb-6">
            <h1 class="text-3xl font-bold text-gray-800 mb-2">
                Edit Lahan
            </h1>

            <p class="text-gray-500">
                Perbarui informasi lahan Anda agar tetap akurat dan menarik bagi calon pembeli.
            </p>
        </div>

        <!-- FORM CARD -->
        <div class="bg-white border border-gray-100 shadow-sm rounded-2xl p-6">

            <form method="POST" action="/petani/lahan/{{ $lahan->id }}" enctype="multipart/form-data" class="space-y-6">

                @csrf
                @method('PUT')

                <!-- KOMODITAS -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">
                        Komoditas
                    </label>

                    <input type="text" name="komoditas" value="{{ $lahan->komoditas }}"
                        class="w-full rounded-xl border-gray-200 focus:border-green-500 focus:ring focus:ring-green-100 p-3">

                    <p class="text-xs text-gray-500 mt-1">
                        Jenis tanaman utama yang ditanam pada lahan ini.
                    </p>
                </div>

                <!-- LUAS -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">
                        Luas Lahan
                    </label>

                    <input type="text" name="luas_lahan" value="{{ $lahan->luas_lahan }}"
                        class="w-full rounded-xl border-gray-200 focus:border-green-500 focus:ring focus:ring-green-100 p-3">

                    <p class="text-xs text-amber-600 mt-1">
                        Gunakan angka saja (contoh: 2.5 untuk 2.5 hektar).
                    </p>
                </div>

                <!-- ALAMAT -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">
                        Alamat Lahan
                    </label>

                    <input type="text" name="alamat_lahan" value="{{ $lahan->alamat_lahan }}"
                        class="w-full rounded-xl border-gray-200 focus:border-green-500 focus:ring focus:ring-green-100 p-3">

                    <p class="text-xs text-gray-500 mt-1">
                        Pastikan alamat jelas agar mudah ditemukan.
                    </p>
                </div>

                <!-- HARGA -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1">
                            Harga Minimum
                        </label>

                        <input type="number" name="harga_min" value="{{ $lahan->harga_min }}"
                            class="w-full rounded-xl border-gray-200 focus:border-green-500 focus:ring focus:ring-green-100 p-3">

                        <p class="text-xs text-gray-500 mt-1">
                            Harga terendah yang Anda terima.
                        </p>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1">
                            Harga Maksimum
                        </label>

                        <input type="number" name="harga_max" value="{{ $lahan->harga_max }}"
                            class="w-full rounded-xl border-gray-200 focus:border-green-500 focus:ring focus:ring-green-100 p-3">

                        <p class="text-xs text-gray-500 mt-1">
                            Harga tertinggi yang Anda tawarkan.
                        </p>
                    </div>

                </div>

                <!-- ESTIMASI PANEN -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">
                        Estimasi Panen
                    </label>

                    <input type="date" name="estimasi_panen" value="{{ $lahan->estimasi_panen }}"
                        class="w-full rounded-xl border-gray-200 focus:border-green-500 focus:ring focus:ring-green-100 p-3">

                    <p class="text-xs text-gray-500 mt-1">
                        Perkiraan waktu panen berdasarkan kondisi tanaman.
                    </p>
                </div>

                <!-- DESKRIPSI -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">
                        Deskripsi Lahan
                    </label>

                    <textarea name="deskripsi" rows="4"
                        class="w-full rounded-xl border-gray-200 focus:border-green-500 focus:ring focus:ring-green-100 p-3 resize-none">{{ $lahan->deskripsi }}</textarea>

                    <p class="text-xs text-gray-500 mt-1">
                        Jelaskan kondisi tanah, akses air, dan keunggulan lahan.
                    </p>
                </div>

                <!-- FOTO -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        Foto Lahan
                    </label>

                    @if ($lahan->foto_lahan)
                        <div class="bg-gray-50 border border-gray-100 rounded-xl p-3 mb-3">
                            <p class="text-xs text-gray-500 mb-2">Foto saat ini</p>
                            <img src="{{ asset('storage/' . $lahan->foto_lahan) }}"
                                class="w-32 h-32 object-cover rounded-lg border">
                        </div>
                    @endif

                    <input type="file" name="foto_lahan"
                        class="w-full border border-gray-200 rounded-xl p-3 bg-white file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:bg-green-50 file:text-green-700">

                    <p class="text-xs text-gray-500 mt-1">
                        Upload foto baru jika ingin mengganti gambar lama.
                    </p>
                </div>

                <!-- CHECKBOX -->
                <label class="flex items-center gap-2 text-sm text-gray-700">
                    <input type="checkbox" name="bisa_nego" value="1"
                        class="w-4 h-4 text-green-600 border-gray-300 rounded focus:ring-green-500"
                        {{ $lahan->bisa_nego ? 'checked' : '' }}>

                    Bisa Nego Harga
                </label>

                <!-- BUTTON -->
                <div class="pt-2">
                    <button type="submit"
                        class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-xl font-semibold transition w-full md:w-auto">
                        Update Lahan
                    </button>
                </div>

            </form>

        </div>

    </div>
@endsection
