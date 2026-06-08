@extends('petani.layout')

@section('content')
    <div class="max-w-6xl mx-auto">
        <!-- HEADER -->
        <div class="mb-6">
            <h1 class="text-3xl font-bold text-gray-800 mb-2">
                Produk Saya
            </h1>

            <p class="text-gray-500">
                Kelola produk pertanian Anda, mulai dari penambahan, pembaruan, hingga penghapusan data produk.
            </p>
        </div>

        <!-- ALERT SUCCESS -->
        @if (session('success'))
            <div class="mb-5 flex items-start gap-3 rounded-xl border border-green-200 bg-green-50 px-4 py-3 text-green-700">
                <div class="font-semibold">
                    Berhasil
                </div>
                <div>
                    {{ session('success') }}
                </div>
            </div>
        @endif

        <!-- ALERT ERROR -->
        @if (session('error'))
            <div class="mb-5 flex items-start gap-3 rounded-xl border border-red-200 bg-red-50 px-4 py-3 text-red-700">
                <div class="font-semibold">
                    Gagal
                </div>
                <div>
                    {{ session('error') }}
                </div>
            </div>
        @endif

        <!-- ACTION BAR -->
        <div class="flex justify-between items-center mb-5">

            <div class="text-sm text-gray-500">
                Total produk: {{ $produk->count() }}
            </div>

            <a href="/petani/produk/create"
                class="bg-green-600 hover:bg-green-700 text-white px-5 py-2 rounded-xl font-semibold transition">
                + Tambah Produk
            </a>

        </div>

        <!-- TABLE WRAPPER -->
        <div class="bg-white border border-gray-100 rounded-2xl shadow-sm overflow-hidden">

            <div class="px-5 py-4 border-b border-gray-100">
                <h2 class="font-semibold text-gray-800">
                    Daftar Produk
                </h2>

                <p class="text-sm text-gray-500">
                    Data produk yang Anda kelola saat ini
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
                            <th class="p-4 font-semibold text-gray-600">Aksi</th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-gray-100">

                        @forelse ($produk as $p)
                            <tr class="hover:bg-gray-50 transition">

                                <td class="p-4 font-medium text-gray-800">
                                    {{ $p->nama_produk }}
                                </td>

                                <td class="p-4 text-gray-600">
                                    {{ $p->kategori }}
                                </td>

                                <td class="p-4 font-semibold text-green-600">
                                    Rp {{ number_format($p->harga, 0, ',', '.') }}
                                </td>

                                <td class="p-4 text-gray-700">
                                    {{ $p->stok }}
                                </td>

                                <td class="p-4">

                                    <div class="flex gap-2">

                                        <a href="/petani/produk/{{ $p->id }}/edit"
                                            class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded-lg text-xs font-medium transition">
                                            Edit
                                        </a>

                                        <form action="/petani/produk/{{ $p->id }}" method="POST"
                                            onsubmit="return confirm('Yakin ingin menghapus produk ini?')">

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
                        @empty
                            <tr>
                                <td colspan="5" class="p-8 text-center text-gray-500">
                                    Belum ada produk yang ditambahkan.
                                </td>
                            </tr>
                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>
@endsection
