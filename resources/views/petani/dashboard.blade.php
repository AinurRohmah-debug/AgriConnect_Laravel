@extends('petani.layout')

@section('content')
    <div class="max-w-6xl mx-auto">

        <!-- HEADER -->
        <div class="mb-6">
            <h1 class="text-3xl font-bold text-gray-800 mb-1">
                Dashboard Petani
            </h1>
            <p class="text-gray-500">
                Ringkasan aktivitas dan performa usaha pertanian Anda.
            </p>
        </div>

        <!-- STATS -->
        <div class="grid md:grid-cols-2 gap-4 mb-6">

            <div class="bg-white p-5 border border-gray-100 rounded-2xl shadow-sm">
                <p class="text-sm text-gray-500">Total Produk</p>
                <h2 class="text-3xl font-bold text-green-600 mt-1">{{ $totalProduk }}</h2>
            </div>

            <div class="bg-white p-5 border border-gray-100 rounded-2xl shadow-sm">
                <p class="text-sm text-gray-500">Total Lahan</p>
                <h2 class="text-3xl font-bold text-blue-600 mt-1">{{ $totalLahan }}</h2>
            </div>

        </div>

        <!-- TABLE -->
        <div class="bg-white border border-gray-100 rounded-2xl shadow-sm overflow-hidden">

            <div class="px-5 py-4 border-b border-gray-100">
                <h2 class="font-semibold text-gray-800">
                    Produk Terbaru
                </h2>
                <p class="text-sm text-gray-500">
                    Data 5 produk terakhir yang Anda tambahkan
                </p>
            </div>

            <div class="overflow-x-auto">

                <table class="w-full text-sm">

                    <thead class="bg-gray-50 text-left">
                        <tr>
                            <th class="p-4 font-semibold text-gray-600">Nama</th>
                            <th class="p-4 font-semibold text-gray-600">Kategori</th>
                            <th class="p-4 font-semibold text-gray-600">Harga</th>
                            <th class="p-4 font-semibold text-gray-600">Stok</th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-gray-100">

                        @foreach ($produkTerbaru as $p)
                            <tr class="hover:bg-gray-50 transition">

                                <td class="p-4 font-medium text-gray-800">
                                    {{ $p->nama_produk }}
                                </td>

                                <td class="p-4 text-gray-600">
                                    {{ $p->kategori }}
                                </td>

                                <td class="p-4 text-green-600 font-semibold">
                                    Rp {{ number_format($p->harga, 0, ',', '.') }}
                                </td>

                                <td class="p-4 text-gray-700">
                                    {{ $p->stok }}
                                </td>

                            </tr>
                        @endforeach

                    </tbody>

                </table>

            </div>

        </div>

    </div>
@endsection
