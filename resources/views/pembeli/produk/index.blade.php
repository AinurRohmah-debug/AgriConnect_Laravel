@extends('pembeli.layouts.app')

@php
    use Illuminate\Support\Str;
@endphp

@section('content')
    <div class="max-w-7xl mx-auto">

        <!-- HERO -->
        <div class="bg-gradient-to-r from-green-600 to-green-700 text-white rounded-2xl p-8 mb-8 shadow-sm">

            <h1 class="text-3xl font-semibold tracking-tight mb-2">
                Marketplace Produk Pertanian
            </h1>

            <p class="text-sm text-green-100">
                Temukan Produk pertanian segar dari berbagai petani dan bangun kemitraan agribisnis
            </p>

        </div>

        <!-- FLASH ALERT -->
        @if (session('success'))
            <div class="mb-6 px-4 py-3 rounded-lg bg-green-50 text-green-700 border border-green-100 text-sm">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="mb-6 px-4 py-3 rounded-lg bg-red-50 text-red-700 border border-red-100 text-sm">
                {{ session('error') }}
            </div>
        @endif

        @if ($produk->isEmpty())
            <div class="mb-6 px-4 py-4 rounded-lg bg-blue-50 text-blue-700 border border-blue-100 text-sm">
                Belum ada produk yang tersedia saat ini.
            </div>
        @endif

        <!-- SEARCH -->
        <div class="mb-8">
            <form method="GET" action="/pembeli/produk">
                <div class="flex gap-3">

                    <input type="text" name="search" value="{{ request('search') }}"
                        placeholder="Cari produk atau kategori..."
                        class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">

                    <button type="submit"
                        class="px-5 py-2 rounded-lg bg-green-600 text-white text-sm font-medium hover:bg-green-700 transition">
                        Cari
                    </button>

                </div>
            </form>
        </div>

        <!-- GRID -->
        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">

            @foreach ($produk as $item)
                <div
                    class="bg-white border border-gray-100 rounded-xl shadow-sm overflow-hidden hover:shadow-md transition">

                    <!-- IMAGE -->
                    @if ($item->foto_produk)
                        <img src="{{ asset('uploads/produk/' . $item->foto_produk) }}" class="w-full h-52 object-cover">
                    @else
                        <div class="w-full h-52 bg-gray-100 flex items-center justify-center text-sm text-gray-400">
                            Tidak ada gambar
                        </div>
                    @endif

                    <div class="p-6">

                        <!-- BADGE -->
                        <span
                            class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-green-50 text-green-700 mb-3">
                            {{ $item->kategori }}
                        </span>

                        <h3 class="text-lg font-semibold text-gray-800 mb-4">
                            {{ $item->nama_produk }}
                        </h3>

                        <!-- DETAIL -->
                        <div class="space-y-3 text-sm">

                            <div class="flex justify-between gap-3">
                                <span class="text-gray-500">Petani</span>
                                <span class="text-gray-800 font-medium text-right">
                                    {{ $item->petani->nama_lengkap ?? '-' }}
                                </span>
                            </div>

                            <div class="flex justify-between gap-3">
                                <span class="text-gray-500">Stok Tersedia</span>
                                <span class="text-gray-800 font-medium">
                                    {{ $item->stok }} {{ $item->satuan }}
                                </span>
                            </div>

                        </div>

                        <!-- DESKRIPSI PRODUK -->
                        <p class="text-sm text-gray-600 mt-4 line-clamp-2">
                            {{ Str::limit($item->deskripsi, 100) }}
                        </p>

                        <!-- PRICE -->
                        <div class="mt-5 mb-5 p-4 bg-gray-50 rounded-xl">

                            <div class="text-xs text-gray-500 mb-1">
                                Harga Produk
                            </div>

                            <div class="text-sm font-medium text-green-600">
                                Rp {{ number_format($item->harga, 0, ',', '.') }} / {{ $item->satuan }}
                            </div>

                        </div>

                        <!-- FORM ACTION -->
                        <form action="/pembeli/keranjang/tambah/{{ $item->id }}" method="POST">
                            @csrf

                            <button type="submit"
                                class="w-full py-2.5 rounded-lg text-sm font-medium text-white bg-green-600 hover:bg-green-700 transition">
                                Tambah ke Keranjang
                            </button>

                        </form>

                    </div>

                </div>
            @endforeach

        </div>

    </div>
@endsection
