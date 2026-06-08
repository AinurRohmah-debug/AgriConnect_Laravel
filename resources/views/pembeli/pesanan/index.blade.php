@extends('pembeli.layouts.app')

@section('content')

    <div class="max-w-6xl mx-auto">

        <!-- HEADER -->
        <div class="mb-6">
            <h3 class="text-2xl font-semibold tracking-tight text-gray-800 mb-1">
                Pesanan Saya
            </h3>

            <p class="text-sm text-gray-500">
                Lihat dan pantau seluruh pesanan yang telah Anda lakukan
            </p>
        </div>

        <!-- EMPTY -->
        @if ($pesanan->isEmpty())
            <div class="px-4 py-4 rounded-lg bg-blue-50 text-blue-700 border border-blue-100 text-sm">
                Belum ada pesanan.
            </div>
        @else
            <div class="space-y-4">

                @foreach ($pesanan as $item)
                    <div class="bg-white border border-gray-100 rounded-xl shadow-sm p-6 hover:shadow-md transition">

                        <div class="flex flex-col md:flex-row md:justify-between md:items-center gap-4">

                            <div>

                                <h5 class="text-lg font-semibold text-gray-800 mb-3">
                                    Pesanan #{{ $item->id }}
                                </h5>

                                <p class="text-sm text-gray-600 mb-2">
                                    Total:
                                    <span class="font-semibold text-green-600">
                                        Rp {{ number_format($item->total_harga, 0, ',', '.') }}
                                    </span>
                                </p>

                                @php
                                    $statusClass = match ($item->status_pesanan) {
                                        'pending' => 'bg-yellow-50 text-yellow-700',
                                        'diproses' => 'bg-blue-50 text-blue-700',
                                        'dikirim' => 'bg-purple-50 text-purple-700',
                                        'selesai' => 'bg-green-50 text-green-700',
                                        'dibatalkan' => 'bg-red-50 text-red-700',
                                        default => 'bg-gray-50 text-gray-700',
                                    };
                                @endphp

                                <span class="inline-flex px-3 py-1 rounded-full text-xs font-medium {{ $statusClass }}">
                                    {{ ucfirst($item->status_pesanan) }}
                                </span>

                            </div>

                            <div>

                                <a href="/pembeli/pesanan/{{ $item->id }}"
                                    class="inline-flex items-center px-4 py-2 rounded-lg bg-gray-800 text-white text-sm font-medium hover:bg-black transition">
                                    Detail
                                </a>

                            </div>

                        </div>

                    </div>
                @endforeach

            </div>
        @endif

    </div>

@endsection
