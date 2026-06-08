@extends('pembeli.layouts.app')

@section('content')
    <div class="max-w-6xl mx-auto space-y-10">

        <div
            class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 bg-white border border-gray-100 rounded-2xl p-6 shadow-sm">
            <div>
                <h1 class="text-2xl font-bold tracking-tight text-gray-800">
                    Selamat Datang, {{ session('user.nama') ?? 'Pembeli' }}
                </h1>
                <p class="text-sm text-gray-500 mt-1">
                    Berikut adalah ringkasan aktivitas dan rekomendasi komoditas untuk Anda hari ini.
                </p>
            </div>
            <div class="flex gap-3">
                <a href="/pembeli/produk"
                    class="px-4 py-2.5 bg-green-600 hover:bg-green-700 text-white text-xs font-semibold rounded-xl transition shadow-sm text-center">
                    Belanja Produk
                </a>
                <a href="/pembeli/lahan"
                    class="px-4 py-2.5 bg-white border border-gray-200 text-gray-700 hover:bg-gray-50 text-xs font-semibold rounded-xl transition text-center">
                    Cari Lahan
                </a>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

            <a href="/pembeli/keranjang"
                class="group bg-white border border-gray-100 rounded-2xl shadow-sm p-6 hover:shadow-md hover:border-green-100 transition block">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-400 group-hover:text-gray-500 transition">Total Keranjang
                        </p>
                        <h2 class="text-4xl font-bold mt-2 text-green-600">
                            {{ $totalKeranjang }}
                        </h2>
                        <span class="text-xs text-green-600 font-medium inline-flex items-center gap-1 mt-2">
                            Lihat item keranjang
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                stroke="currentColor" class="w-3 h-3 group-hover:translate-x-1 transition-transform">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                            </svg>
                        </span>
                    </div>

                    <div
                        class="w-14 h-14 rounded-2xl bg-green-50 group-hover:bg-green-100 flex items-center justify-center transition">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7 text-green-600" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-1.5 6h11L17 13M9 21h.01M17 21h.01" />
                        </svg>
                    </div>
                </div>
            </a>

            <a href="/pembeli/pesanan"
                class="group bg-white border border-gray-100 rounded-2xl shadow-sm p-6 hover:shadow-md hover:border-blue-100 transition block">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-400 group-hover:text-gray-500 transition">Total Riwayat
                            Pesanan</p>
                        <h2 class="text-4xl font-bold mt-2 text-blue-600">
                            {{ $totalPesanan }}
                        </h2>
                        <span class="text-xs text-blue-600 font-medium inline-flex items-center gap-1 mt-2">
                            Cek status pesanan
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                stroke="currentColor" class="w-3 h-3 group-hover:translate-x-1 transition-transform">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                            </svg>
                        </span>
                    </div>

                    <div
                        class="w-14 h-14 rounded-2xl bg-blue-50 group-hover:bg-blue-100 flex items-center justify-center transition">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7 text-blue-600" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M9 12h6m2 8H7a2 2 0 01-2-2V7a2 2 0 012-2h5l2 2h5a2 2 0 012 2v11a2 2 0 01-2 2z" />
                        </svg>
                    </div>
                </div>
            </a>

        </div>

        <div class="space-y-4">
            <div class="flex items-center justify-between">
                <div>
                    <h3 class="text-lg font-bold text-gray-800">Produk Pertanian Terbaru</h3>
                    <p class="text-xs text-gray-500">Komoditas segar tersedia langsung dari petani bimbingan</p>
                </div>
                <a href="/pembeli/produk" class="text-xs font-semibold text-green-600 hover:text-green-700 hover:underline">
                    Lihat Semua
                </a>
            </div>

            @if ($produkTerbaru->isEmpty())
                <div
                    class="bg-gray-50 border border-dashed border-gray-200 rounded-2xl p-8 text-center text-sm text-gray-400">
                    Belum ada produk pertanian yang tersedia saat ini.
                </div>
            @else
                <div class="grid grid-cols-2 sm:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6">
                    @foreach ($produkTerbaru as $produk)
                        <div
                            class="bg-white border border-gray-100 rounded-xl shadow-sm overflow-hidden hover:shadow-md transition flex flex-col justify-between">
                            <div>
                                <div
                                    class="w-full h-36 sm:h-48 bg-gray-50 flex items-center justify-center overflow-hidden">
                                    @if ($produk->foto_produk)
                                        <img src="{{ asset('uploads/produk/' . $produk->foto_produk) }}"
                                            alt="{{ $produk->nama_produk }}" class="w-full h-full object-cover">
                                    @else
                                        <div
                                            class="w-full h-full bg-gray-100 flex items-center justify-center text-xs text-gray-400">
                                            Tidak ada gambar
                                        </div>
                                    @endif
                                </div>

                                <div class="p-4 sm:p-5 space-y-2 sm:space-y-3">
                                    <div class="flex flex-col sm:flex-row sm:items-start justify-between gap-1 sm:gap-2">
                                        <h5 class="text-sm sm:text-base font-semibold text-gray-800 line-clamp-1"
                                            title="{{ $produk->nama_produk }}">
                                            {{ $produk->nama_produk }}
                                        </h5>
                                        <span
                                            class="w-max text-[9px] sm:text-[10px] px-2 py-0.5 font-medium rounded-full bg-gray-100 text-gray-600 whitespace-nowrap">
                                            {{ $produk->kategori }}
                                        </span>
                                    </div>

                                    <div class="flex justify-between items-center pt-1">
                                        <span class="text-[10px] sm:text-xs text-gray-400">Harga</span>
                                        <span class="text-xs sm:text-sm font-bold text-green-600">
                                            Rp {{ number_format($produk->harga, 0, ',', '.') }}
                                        </span>
                                    </div>

                                    <div
                                        class="flex justify-between items-center text-[10px] sm:text-xs text-gray-500 pt-1 border-t border-gray-50">
                                        <span>Stok Tersedia</span>
                                        <span class="font-medium text-gray-700">
                                            {{ $produk->stok }} {{ $produk->satuan }}
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <div class="p-4 sm:p-5 pt-0">
                                <form action="/pembeli/keranjang/tambah/{{ $produk->id }}" method="POST">
                                    @csrf
                                    <button type="submit"
                                        class="w-full px-3 py-2 rounded-lg bg-green-600 text-white text-[11px] sm:text-xs font-semibold hover:bg-green-700 transition shadow-sm">
                                        Tambah ke Keranjang
                                    </button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>

        <div class="space-y-4">
            <div class="flex items-center justify-between">
                <div>
                    <h3 class="text-lg font-bold text-gray-800">Eksplorasi Lahan Pertanian</h3>
                    <p class="text-xs text-gray-500">Mulai kerja sama pengelolaan lahan strategis</p>
                </div>
                <a href="/pembeli/lahan" class="text-xs font-semibold text-green-600 hover:text-green-700 hover:underline">
                    Lihat Semua
                </a>
            </div>

            @if ($lahanTerbaru->isEmpty())
                <div
                    class="bg-gray-50 border border-dashed border-gray-200 rounded-2xl p-8 text-center text-sm text-gray-400">
                    Belum ada lahan terverifikasi yang siap disewa saat ini.
                </div>
            @else
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach ($lahanTerbaru as $lahan)
                        @php
                            $alreadyExp = \App\Models\PengajuanMinat::where('lahan_id', $lahan->id)
                                ->where('pembeli_id', session('user.id'))
                                ->exists();
                        @endphp

                        <div
                            class="bg-white border border-gray-100 rounded-xl shadow-sm overflow-hidden hover:shadow-md transition flex flex-col justify-between">
                            <div>
                                <div class="w-full h-48 bg-gray-50 flex items-center justify-center overflow-hidden">
                                    @if ($lahan->foto_lahan)
                                        <img src="{{ asset('uploads/lahan/' . $lahan->foto_lahan) }}"
                                            alt="{{ $lahan->komoditas }}" class="w-full h-full object-cover">
                                    @else
                                        <div
                                            class="w-full h-full bg-gray-100 flex items-center justify-center text-xs text-gray-400">
                                            Tidak ada gambar
                                        </div>
                                    @endif
                                </div>

                                <div class="p-5 space-y-3">
                                    <div class="flex items-start justify-between gap-2">
                                        <h4 class="font-bold text-base text-gray-800 line-clamp-1"
                                            title="{{ $lahan->komoditas }}">
                                            {{ $lahan->komoditas }}
                                        </h4>
                                        <span
                                            class="px-2 py-0.5 bg-green-50 text-[10px] font-semibold text-green-700 rounded-md whitespace-nowrap">
                                            {{ $lahan->luas_lahan }} Ha
                                        </span>
                                    </div>

                                    <div class="space-y-1.5 text-xs pt-1">
                                        <div class="flex justify-between">
                                            <span class="text-gray-400">Lokasi</span>
                                            <span class="text-gray-700 font-medium truncate max-w-[180px]"
                                                title="{{ $lahan->alamat_lahan }}">
                                                {{ $lahan->alamat_lahan }}
                                            </span>
                                        </div>
                                        <div class="flex justify-between">
                                            <span class="text-gray-400">Kisaran Harga</span>
                                            <span class="text-green-600 font-bold text-right">
                                                Rp {{ number_format($lahan->harga_min, 0, ',', '.') }} -
                                                {{ number_format($lahan->harga_max, 0, ',', '.') }}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="p-5 pt-0">
                                @if ($alreadyExp)
                                    <button disabled
                                        class="w-full py-2 bg-gray-300 text-gray-500 text-xs font-semibold rounded-lg cursor-not-allowed text-center">
                                        Sudah Mengajukan Minat
                                    </button>
                                @else
                                    <a href="/pembeli/lahan?search={{ urlencode($lahan->komoditas) }}"
                                        class="block w-full py-2 bg-gray-800 hover:bg-green-600 text-white text-xs font-semibold rounded-lg transition shadow-sm text-center">
                                        Lihat Detail Lahan
                                    </a>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>

    </div>
@endsection
