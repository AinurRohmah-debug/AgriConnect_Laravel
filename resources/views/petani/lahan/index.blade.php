@extends('petani.layout')

@section('content')

    <div class="container mx-auto">

        <!-- HEADER -->
        <div class="mb-6">
            <h1 class="text-3xl font-bold text-gray-800 mb-2">
                Lahan Saya
            </h1>

            <p class="text-gray-500">
                Kelola seluruh data lahan pertanian yang Anda miliki.
            </p>
        </div>

        <!-- ALERT SUCCESS -->
        @if (session('success'))
            <div class="mb-5 rounded-xl border border-green-200 bg-green-50 px-4 py-3">
                <div class="font-semibold text-green-700">
                    Berhasil
                </div>
                <div class="text-green-600 text-sm mt-1">
                    {{ session('success') }}
                </div>
            </div>
        @endif

        <!-- ALERT ERROR -->
        @if (session('error'))
            <div class="mb-5 rounded-xl border border-red-200 bg-red-50 px-4 py-3">
                <div class="font-semibold text-red-700">
                    Tidak Dapat Menghapus Lahan
                </div>
                <div class="text-red-600 text-sm mt-1">
                    {{ session('error') }}
                </div>
            </div>
        @endif

        <!-- ACTION BAR -->
        <div class="flex items-center justify-between mb-5">

            <div class="text-sm text-gray-500">
                Total Lahan :
                <span class="font-semibold text-gray-800">
                    {{ $lahan->count() }}
                </span>
            </div>

            <a href="/petani/lahan/create"
                class="bg-green-600 hover:bg-green-700 text-white px-5 py-2 rounded-xl font-semibold transition">
                Tambah Lahan
            </a>

        </div>

        <!-- EMPTY STATE -->
        @if ($lahan->isEmpty())
            <div class="bg-white border border-gray-100 rounded-2xl shadow-sm p-10 text-center">

                <h3 class="text-lg font-semibold text-gray-700 mb-2">
                    Belum Ada Data Lahan
                </h3>

                <p class="text-gray-500 mb-5">
                    Tambahkan lahan pertama Anda agar dapat dilihat oleh calon pembeli.
                </p>

                <a href="/petani/lahan/create"
                    class="bg-green-600 hover:bg-green-700 text-white px-5 py-2 rounded-xl font-semibold transition">
                    Tambah Lahan
                </a>

            </div>
        @else
            <div class="bg-white border border-gray-100 rounded-2xl shadow-sm overflow-hidden">

                <!-- HEADER TABLE -->
                <div class="px-5 py-4 border-b border-gray-100 bg-gradient-to-r from-green-50 to-emerald-50">

                    <h2 class="font-semibold text-gray-800">
                        Daftar Lahan
                    </h2>

                    <p class="text-sm text-gray-500 mt-1">
                        Informasi seluruh lahan yang telah Anda daftarkan.
                    </p>

                </div>

                <div class="overflow-x-auto">

                    <table class="w-full text-sm">

                        <thead class="bg-gray-50 border-b border-gray-100">
                            <tr class="text-left text-gray-600">

                                <th class="px-5 py-4">
                                    Komoditas
                                </th>

                                <th class="px-5 py-4">
                                    Luas
                                </th>

                                <th class="px-5 py-4">
                                    Harga Minimum
                                </th>

                                <th class="px-5 py-4">
                                    Harga Maksimum
                                </th>

                                <th class="px-5 py-4">
                                    Status
                                </th>

                                <th class="px-5 py-4 text-center">
                                    Aksi
                                </th>

                            </tr>
                        </thead>

                        <tbody class="divide-y divide-gray-100">

                            @foreach ($lahan as $l)
                                @php
                                    $statusClass = match ($l->status) {
                                        'menunggu' => 'bg-yellow-100 text-yellow-700',
                                        'diterima' => 'bg-green-100 text-green-700',
                                        'ditolak' => 'bg-red-100 text-red-700',
                                        default => 'bg-gray-100 text-gray-700',
                                    };
                                @endphp

                                <tr class="hover:bg-gray-50 transition">

                                    <td class="px-5 py-4 font-medium text-gray-800">
                                        {{ $l->komoditas }}
                                    </td>

                                    <td class="px-5 py-4 text-gray-600">
                                        {{ $l->luas_lahan }} Ha
                                    </td>

                                    <td class="px-5 py-4 font-medium text-gray-700">
                                        Rp {{ number_format($l->harga_min, 0, ',', '.') }}
                                    </td>

                                    <td class="px-5 py-4 font-medium text-gray-700">
                                        Rp {{ number_format($l->harga_max, 0, ',', '.') }}
                                    </td>

                                    <td class="px-5 py-4">

                                        <span class="px-3 py-1 rounded-full text-xs font-semibold {{ $statusClass }}">
                                            {{ ucfirst($l->status) }}
                                        </span>

                                    </td>

                                    <td class="px-5 py-4">

                                        <div class="flex justify-center gap-2">

                                            <a href="/petani/lahan/{{ $l->id }}/edit"
                                                class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded-lg text-xs font-medium transition">
                                                Edit
                                            </a>

                                            <form action="/petani/lahan/{{ $l->id }}" method="POST"
                                                onsubmit="return confirm('Yakin ingin menghapus lahan ini?')">

                                                @csrf
                                                @method('DELETE')

                                                <button type="submit"
                                                    class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded-lg text-xs font-medium transition">
                                                    Hapus
                                                </button>

                                            </form>

                                        </div>

                                    </td>

                                </tr>
                            @endforeach

                        </tbody>

                    </table>

                </div>

            </div>
        @endif

    </div>

@endsection
