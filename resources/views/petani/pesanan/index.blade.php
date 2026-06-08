@extends('petani.layout')

@section('content')

    <div class="max-w-6xl mx-auto">
        {{-- HEADER --}}
        <div class="mb-6">

            <h1 class="text-3xl font-bold text-gray-800 mb-2">
                Pesanan Masuk
            </h1>

            <p class="text-gray-500">
                Kelola dan pantau pesanan dari pembeli secara real-time.
            </p>

        </div>

        {{-- EMPTY STATE --}}
        @if ($pesanan->isEmpty())
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8 text-center">

                <h3 class="text-lg font-semibold text-gray-700 mb-2">
                    Belum Ada Pesanan
                </h3>

                <p class="text-gray-500">
                    Pesanan dari pembeli akan muncul pada halaman ini.
                </p>

            </div>
        @else
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">

                {{-- HEADER TABLE --}}
                <div class="px-6 py-5 border-b border-gray-100 bg-gradient-to-r from-green-50 to-blue-50">

                    <h2 class="text-xl font-semibold text-gray-800">
                        Daftar Pesanan
                    </h2>

                    <p class="text-sm text-gray-500 mt-1">
                        Kelola status pesanan yang masuk dari pembeli.
                    </p>

                </div>

                {{-- SCROLL HANYA DI TABEL --}}
                <div class="overflow-x-auto">

                    <table class="w-full min-w-[1050px] text-sm">

                        <thead class="bg-gray-50 border-b border-gray-100">

                            <tr class="text-left text-gray-600">

                                <th class="px-5 py-4 w-[90px]">
                                    ID
                                </th>

                                <th class="px-5 py-4 w-[200px]">
                                    Pembeli
                                </th>

                                <th class="px-5 py-4 w-[220px]">
                                    Produk
                                </th>

                                <th class="px-5 py-4 w-[120px] text-center">
                                    Jumlah
                                </th>

                                <th class="px-5 py-4 w-[180px]">
                                    Harga
                                </th>

                                <th class="px-5 py-4 w-[140px]">
                                    Status
                                </th>

                                <th class="px-5 py-4 w-[300px]">
                                    Aksi
                                </th>

                            </tr>

                        </thead>

                        <tbody class="divide-y divide-gray-100">

                            @foreach ($pesanan as $item)
                                @php
                                    $status = $item->pesanan->status_pesanan;
                                @endphp

                                <tr class="hover:bg-gray-50 transition duration-150">

                                    {{-- ID --}}
                                    <td class="px-5 py-4 text-gray-500 whitespace-nowrap">
                                        #{{ $item->pesanan->id }}
                                    </td>

                                    {{-- PEMBELI --}}
                                    <td class="px-5 py-4 font-medium text-gray-800 whitespace-nowrap">
                                        {{ $item->pesanan->pembeli->nama_lengkap }}
                                    </td>

                                    {{-- PRODUK --}}
                                    <td class="px-5 py-4 text-gray-700 whitespace-nowrap">
                                        {{ $item->nama_produk_saat_beli }}
                                    </td>

                                    {{-- JUMLAH --}}
                                    <td class="px-5 py-4 text-center">

                                        <span
                                            class="inline-flex items-center justify-center min-w-[40px] px-3 py-1 rounded-full bg-gray-100 text-gray-700 text-xs font-medium">
                                            {{ $item->jumlah }}
                                        </span>

                                    </td>

                                    {{-- HARGA --}}
                                    <td class="px-5 py-4 font-semibold text-green-600 whitespace-nowrap">
                                        Rp {{ number_format($item->harga_saat_beli, 0, ',', '.') }}
                                    </td>

                                    {{-- STATUS --}}
                                    <td class="px-5 py-4 whitespace-nowrap">

                                        @if ($status == 'menunggu_diproses')
                                            <span
                                                class="inline-flex px-3 py-1 rounded-full text-xs font-semibold bg-yellow-100 text-yellow-700">
                                                Menunggu
                                            </span>
                                        @elseif($status == 'dikemas')
                                            <span
                                                class="inline-flex px-3 py-1 rounded-full text-xs font-semibold bg-blue-100 text-blue-700">
                                                Dikemas
                                            </span>
                                        @elseif($status == 'dikirim')
                                            <span
                                                class="inline-flex px-3 py-1 rounded-full text-xs font-semibold bg-indigo-100 text-indigo-700">
                                                Dikirim
                                            </span>
                                        @else
                                            <span
                                                class="inline-flex px-3 py-1 rounded-full text-xs font-semibold bg-green-100 text-green-700">
                                                Selesai
                                            </span>
                                        @endif

                                    </td>

                                    {{-- AKSI --}}
                                    <td class="px-5 py-4">

                                        <form action="/petani/pesanan/{{ $item->pesanan->id }}/status" method="POST"
                                            class="flex items-center gap-2">

                                            @csrf

                                            <select name="status_pesanan"
                                                class="min-w-[160px] rounded-lg border border-gray-200 bg-white px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-green-100 focus:border-green-500">

                                                <option value="menunggu_diproses"
                                                    {{ $status == 'menunggu_diproses' ? 'selected' : '' }}>
                                                    Menunggu
                                                </option>

                                                <option value="dikemas" {{ $status == 'dikemas' ? 'selected' : '' }}>
                                                    Dikemas
                                                </option>

                                                <option value="dikirim" {{ $status == 'dikirim' ? 'selected' : '' }}>
                                                    Dikirim
                                                </option>

                                                <option value="selesai" {{ $status == 'selesai' ? 'selected' : '' }}>
                                                    Selesai
                                                </option>

                                            </select>

                                            <button type="submit"
                                                class="bg-green-600 hover:bg-green-700 text-white text-sm font-semibold px-4 py-2 rounded-lg transition whitespace-nowrap shadow-sm">
                                                Update Status
                                            </button>

                                        </form>

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
