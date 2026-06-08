@extends('pembeli.layouts.app')

@section('content')
    <div class="max-w-7xl mx-auto">

        <!-- HERO -->
        <div class="bg-gradient-to-r from-green-600 to-green-700 text-white rounded-2xl p-8 mb-8 shadow-sm">

            <h1 class="text-3xl font-semibold tracking-tight mb-2">
                Marketplace Lahan Pertanian
            </h1>

            <p class="text-sm text-green-100">
                Temukan lahan pertanian potensial dari berbagai petani dan bangun kemitraan agribisnis
            </p>

        </div>

        <!-- FLASH -->
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

        <!-- SECTION TITLE -->
        <div class="mb-6">
            <h2 class="text-2xl font-semibold text-gray-800">
                Lahan Tersedia
            </h2>

            <p class="text-sm text-gray-500 mt-1">
                Jelajahi berbagai pilihan lahan yang siap dikelola dan dikembangkan
            </p>
        </div>

        <!-- SEARCH -->
        <div class="mb-8">
            <form method="GET" action="{{ url('/pembeli/lahan') }}">
                <div class="flex gap-3">

                    <input type="text" name="search" value="{{ request('search') }}"
                        placeholder="Cari komoditas atau lokasi lahan..."
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

            @foreach ($lahan as $item)
                @php
                    $already = \App\Models\PengajuanMinat::where('lahan_id', $item->id)
                        ->where('pembeli_id', session('user.id'))
                        ->exists();
                @endphp

                <div
                    class="bg-white border border-gray-100 rounded-xl shadow-sm overflow-hidden hover:shadow-md transition">

                    <!-- IMAGE -->
                    @if ($item->foto_lahan)
                        <img src="{{ asset('storage/' . $item->foto_lahan) }}" class="w-full h-52 object-cover">
                    @else
                        <div class="w-full h-52 bg-gray-100 flex items-center justify-center text-sm text-gray-400">
                            Tidak ada gambar
                        </div>
                    @endif

                    <div class="p-6">

                        <!-- BADGE -->
                        <span
                            class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-green-50 text-green-700 mb-3">
                            {{ $item->komoditas }}
                        </span>

                        <h3 class="text-lg font-semibold text-gray-800 mb-4">
                            {{ $item->komoditas }}
                        </h3>

                        <!-- DETAIL -->
                        <div class="space-y-3 text-sm">

                            <div class="flex justify-between gap-3">
                                <span class="text-gray-500">Lokasi</span>
                                <span class="text-gray-800 font-medium text-right">
                                    {{ $item->alamat_lahan }}
                                </span>
                            </div>

                            <div class="flex justify-between gap-3">
                                <span class="text-gray-500">Luas</span>
                                <span class="text-gray-800 font-medium">
                                    {{ $item->luas_lahan }} Ha
                                </span>
                            </div>

                        </div>

                        <!-- PRICE (DIPERKECIL) -->
                        <div class="mt-5 mb-5 p-4 bg-gray-50 rounded-xl">

                            <div class="text-xs text-gray-500 mb-1">
                                Kisaran Harga
                            </div>

                            <div class="text-sm font-medium text-green-600">
                                Rp {{ number_format($item->harga_min) }}
                                -
                                Rp {{ number_format($item->harga_max) }}
                            </div>

                        </div>

                        <!-- FORM -->
                        <form action="{{ url('/pembeli/lahan/' . $item->id . '/minat') }}" method="POST">

                            @csrf

                            <textarea name="pesan" rows="3" placeholder="Tuliskan pesan atau ketertarikan Anda..."
                                class="w-full border border-gray-200 rounded-lg p-3 text-sm focus:outline-none focus:ring-2 focus:ring-green-500 mb-4 resize-none"
                                required @if ($already) disabled @endif></textarea>

                            <button type="submit"
                                class="w-full py-2.5 rounded-lg text-sm font-medium text-white transition
                                {{ $already ? 'bg-gray-400 cursor-not-allowed' : 'bg-green-600 hover:bg-green-700' }}"
                                @if ($already) disabled @endif>

                                {{ $already ? 'Sudah Mengajukan Minat' : 'Kirim Minat' }}

                            </button>

                        </form>

                    </div>

                </div>
            @endforeach

        </div>

    </div>
@endsection
