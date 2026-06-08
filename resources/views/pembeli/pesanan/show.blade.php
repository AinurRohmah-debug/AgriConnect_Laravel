@extends('pembeli.layouts.app')

@section('content')
    <div class="max-w-6xl mx-auto">
        <!-- HEADER -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 mb-6">

            <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4">

                <div>
                    <p class="text-sm text-gray-500 uppercase tracking-wider">
                        Pesanan
                    </p>

                    <h1 class="text-3xl font-bold text-gray-800 mt-1">
                        Detail Pesanan #{{ $pesanan->id }}
                    </h1>

                    <p class="text-gray-500 mt-2">
                        Informasi lengkap mengenai transaksi dan status pengiriman pesanan Anda.
                    </p>
                </div>

                <div class="flex flex-wrap gap-3">

                    <a href="{{ route('pembeli.pesanan.nota', $pesanan->id) }}"
                        class="inline-flex items-center px-5 py-2.5 bg-green-600 hover:bg-green-700 text-white rounded-lg shadow-sm transition font-medium">

                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-2" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 16v-8m0 8l-3-3m3 3l3-3M5 20h14" />
                        </svg>

                        Unduh Nota
                    </a>

                    <a href="{{ url('/pembeli/pesanan') }}"
                        class="inline-flex items-center px-5 py-2.5 bg-gray-100 hover:bg-gray-200 text-gray-700 rounded-lg transition font-medium">
                        Kembali
                    </a>

                </div>

            </div>

        </div>

        <!-- INFORMASI PESANAN -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 mb-6">

            <div class="grid md:grid-cols-3 gap-8">

                <div>
                    <p class="text-sm font-medium text-gray-500 uppercase tracking-wide mb-3">
                        Status Pesanan
                    </p>

                    @php
                        $statusClass = match ($pesanan->status_pesanan) {
                            'menunggu_diproses' => 'bg-yellow-100 text-yellow-800',
                            'dikemas' => 'bg-blue-100 text-blue-800',
                            'dikirim' => 'bg-purple-100 text-purple-800',
                            'selesai' => 'bg-green-100 text-green-800',
                            default => 'bg-gray-100 text-gray-800',
                        };
                    @endphp

                    <span class="inline-flex items-center px-4 py-2 rounded-full text-sm font-semibold {{ $statusClass }}">
                        {{ ucfirst(str_replace('_', ' ', $pesanan->status_pesanan)) }}
                    </span>
                </div>

                <div>
                    <p class="text-sm font-medium text-gray-500 uppercase tracking-wide mb-3">
                        Total Pembayaran
                    </p>

                    <p class="text-3xl font-bold text-green-600">
                        Rp {{ number_format($pesanan->total_harga, 0, ',', '.') }}
                    </p>
                </div>

                <div>
                    <p class="text-sm font-medium text-gray-500 uppercase tracking-wide mb-3">
                        Alamat Pengiriman
                    </p>

                    <p class="text-gray-700 leading-relaxed">
                        {{ $pesanan->alamat_tujuan }}
                    </p>
                </div>

            </div>

        </div>

        <!-- TRACKING PESANAN -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 mb-6">

            <h2 class="text-xl font-semibold text-gray-800 mb-6">
                Status Pengiriman
            </h2>

            <div class="space-y-4">

                <div
                    class="flex items-center gap-4 p-4 rounded-lg border
                {{ in_array($pesanan->status_pesanan, ['menunggu_diproses', 'dikemas', 'dikirim', 'selesai']) ? 'bg-yellow-50 border-yellow-200' : 'bg-gray-50 border-gray-200' }}">
                    <div class="w-3 h-3 rounded-full bg-yellow-500"></div>
                    <span class="font-medium text-gray-700">
                        Menunggu Diproses
                    </span>
                </div>

                <div
                    class="flex items-center gap-4 p-4 rounded-lg border
                {{ in_array($pesanan->status_pesanan, ['dikemas', 'dikirim', 'selesai']) ? 'bg-blue-50 border-blue-200' : 'bg-gray-50 border-gray-200' }}">
                    <div class="w-3 h-3 rounded-full bg-blue-500"></div>
                    <span class="font-medium text-gray-700">
                        Dikemas
                    </span>
                </div>

                <div
                    class="flex items-center gap-4 p-4 rounded-lg border
                {{ in_array($pesanan->status_pesanan, ['dikirim', 'selesai']) ? 'bg-purple-50 border-purple-200' : 'bg-gray-50 border-gray-200' }}">
                    <div class="w-3 h-3 rounded-full bg-purple-500"></div>
                    <span class="font-medium text-gray-700">
                        Dikirim
                    </span>
                </div>

                <div
                    class="flex items-center gap-4 p-4 rounded-lg border
                {{ $pesanan->status_pesanan == 'selesai' ? 'bg-green-50 border-green-200' : 'bg-gray-50 border-gray-200' }}">
                    <div class="w-3 h-3 rounded-full bg-green-500"></div>
                    <span class="font-medium text-gray-700">
                        Selesai
                    </span>
                </div>

            </div>

        </div>

        <!-- DAFTAR PRODUK -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden mb-6">

            <div class="px-6 py-5 border-b border-gray-100 bg-gray-50">
                <h2 class="text-xl font-semibold text-gray-800">
                    Daftar Produk
                </h2>
            </div>

            <div class="divide-y divide-gray-100">

                @foreach ($pesanan->detail as $item)
                    <div class="p-6">

                        <div class="flex flex-col md:flex-row md:justify-between md:items-center gap-4">

                            <div>
                                <h3 class="text-lg font-semibold text-gray-800">
                                    {{ $item->nama_produk_saat_beli }}
                                </h3>

                                <div class="mt-3 space-y-1 text-sm text-gray-600">

                                    <p>
                                        Jumlah:
                                        <span class="font-medium text-gray-800">
                                            {{ $item->jumlah }}
                                        </span>
                                    </p>

                                    <p>
                                        Harga Satuan:
                                        <span class="font-medium text-green-600">
                                            Rp {{ number_format($item->harga_saat_beli, 0, ',', '.') }}
                                        </span>
                                    </p>

                                </div>
                            </div>

                            <div class="text-right">

                                <p class="text-sm text-gray-500 mb-1">
                                    Subtotal
                                </p>

                                <p class="text-xl font-bold text-green-600">
                                    Rp {{ number_format($item->jumlah * $item->harga_saat_beli, 0, ',', '.') }}
                                </p>

                            </div>

                        </div>

                    </div>
                @endforeach

            </div>

        </div>

        <!-- TOTAL PEMBAYARAN -->
        <div class="bg-white rounded-xl shadow-sm border border-green-200 p-6">

            <div class="flex justify-between items-center">

                <div>
                    <p class="text-sm uppercase tracking-wide text-gray-500">
                        Ringkasan Pembayaran
                    </p>

                    <h3 class="text-lg font-semibold text-gray-800 mt-1">
                        Total Tagihan
                    </h3>
                </div>

                <div class="text-right">

                    <p class="text-sm text-gray-500">
                        Total
                    </p>

                    <p class="text-3xl font-bold text-green-700">
                        Rp {{ number_format($pesanan->total_harga, 0, ',', '.') }}
                    </p>

                </div>

            </div>

        </div>

    </div>
@endsection
