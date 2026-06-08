@extends('pembeli.layouts.app')

@section('content')

    <div class="max-w-7xl mx-auto">

        <!-- HEADER -->
        <div class="mb-6">
            <h2 class="text-2xl font-semibold tracking-tight text-gray-800">
                Keranjang Belanja
            </h2>
            <p class="text-sm text-gray-500 mt-1">
                Kelola produk sebelum melakukan checkout
            </p>
        </div>

        <!-- ALERT -->
        @if (session('success'))
            <div class="bg-green-50 text-green-700 border border-green-100 px-4 py-3 rounded-lg mb-4 text-sm">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="bg-red-50 text-red-700 border border-red-100 px-4 py-3 rounded-lg mb-4 text-sm">
                {{ session('error') }}
            </div>
        @endif

        @if ($keranjang->isEmpty())
            <div class="bg-blue-50 text-blue-700 border border-blue-100 px-4 py-4 rounded-lg text-sm">
                Keranjang masih kosong.
            </div>
        @else
            @php
                $total = 0;
            @endphp

            <form action="/pembeli/checkout" method="POST">
                @csrf

                <!-- TABLE CARD -->
                <div class="bg-white border border-gray-100 rounded-xl shadow-sm overflow-hidden">

                    <div class="p-5 border-b border-gray-100">
                        <h3 class="text-sm font-semibold text-gray-700">Daftar Produk Keranjang</h3>
                    </div>

                    <div class="overflow-x-auto">

                        <table class="w-full text-sm">

                            <thead class="bg-gray-50 text-gray-600 text-xs uppercase tracking-wider">
                                <tr>
                                    <th class="p-4 text-left font-medium">Pilih</th>
                                    <th class="p-4 text-left font-medium">Produk</th>
                                    <th class="p-4 text-left font-medium">Harga</th>
                                    <th class="p-4 text-left font-medium">Jumlah</th>
                                    <th class="p-4 text-left font-medium">Subtotal</th>
                                    <th class="p-4 text-right font-medium">Aksi</th>
                                </tr>
                            </thead>

                            <tbody class="divide-y divide-gray-100">

                                @foreach ($keranjang as $item)
                                    @php
                                        $subtotal = $item->produk->harga * $item->jumlah;
                                        $total += $subtotal;
                                    @endphp

                                    <tr class="hover:bg-gray-50 transition">

                                        <td class="p-4">
                                            <input type="checkbox" name="keranjang[]" value="{{ $item->id }}"
                                                class="w-4 h-4 rounded border-gray-300">
                                        </td>

                                        <td class="p-4">
                                            <div class="flex items-center gap-4">

                                                @if ($item->produk->foto_produk)
                                                    <img src="{{ asset('storage/' . $item->produk->foto_produk) }}"
                                                        class="w-14 h-14 object-cover rounded-lg border border-gray-100">
                                                @endif

                                                <div>
                                                    <div class="font-medium text-gray-800">
                                                        {{ $item->produk->nama_produk }}
                                                    </div>

                                                    <div class="text-xs text-gray-500 mt-1">
                                                        {{ $item->produk->petani->nama_lengkap ?? '-' }}
                                                    </div>
                                                </div>

                                            </div>
                                        </td>

                                        <td class="p-4 text-gray-700">
                                            Rp {{ number_format($item->produk->harga, 0, ',', '.') }}
                                        </td>

                                        <td class="p-4">

                                            <div
                                                class="inline-flex items-center border border-gray-200 rounded-lg overflow-hidden">

                                                <form action="/pembeli/keranjang/{{ $item->id }}/kurang" method="POST">
                                                    @csrf
                                                    <button type="submit"
                                                        class="px-3 py-1 text-gray-600 hover:bg-gray-100">
                                                        -
                                                    </button>
                                                </form>

                                                <span class="px-3 font-semibold text-gray-800">
                                                    {{ $item->jumlah }}
                                                </span>

                                                <form action="/pembeli/keranjang/{{ $item->id }}/tambah" method="POST">
                                                    @csrf
                                                    <button type="submit"
                                                        class="px-3 py-1 text-gray-600 hover:bg-gray-100">
                                                        +
                                                    </button>
                                                </form>

                                            </div>

                                        </td>

                                        <td class="p-4 text-gray-700">
                                            Rp {{ number_format($subtotal, 0, ',', '.') }}
                                        </td>

                                        <td class="p-4 text-right">

                                            <form action="/pembeli/keranjang/{{ $item->id }}" method="POST">
                                                @csrf
                                                @method('DELETE')

                                                <button type="submit"
                                                    onclick="return confirm('Hapus produk dari keranjang?')"
                                                    class="px-3 py-1.5 text-xs font-medium rounded-lg bg-red-600 text-white hover:bg-red-700 transition">
                                                    Hapus
                                                </button>

                                            </form>

                                        </td>

                                    </tr>
                                @endforeach

                            </tbody>

                        </table>

                    </div>

                </div>

                <!-- SUMMARY -->
                <div class="bg-white border border-gray-100 rounded-xl shadow-sm mt-6">

                    <div class="p-6 flex flex-col md:flex-row md:items-center md:justify-between gap-4">

                        <h4 class="text-lg font-semibold text-gray-800">
                            Total:
                            <span class="text-green-600">
                                Rp {{ number_format($total, 0, ',', '.') }}
                            </span>
                        </h4>

                        <button type="submit"
                            class="px-5 py-3 rounded-lg bg-green-600 text-white text-sm font-medium hover:bg-green-700 transition">
                            Checkout Produk Terpilih
                        </button>

                    </div>

                </div>

            </form>
        @endif

    </div>

@endsection
