@extends('pembeli.layouts.app')

@section('content')

    <div class="max-w-7xl mx-auto">

        <!-- HEADER -->
        <div class="mb-6">
            <h3 class="text-2xl font-semibold tracking-tight text-gray-800 mb-1">
                Pengajuan Minat Lahan
            </h3>

            <p class="text-sm text-gray-500">
                Pantau status pengajuan minat lahan yang telah Anda kirim
            </p>
        </div>

        <!-- CARD -->
        <div class="bg-white border border-gray-100 rounded-xl shadow-sm overflow-hidden">

            <!-- HEADER CARD -->
            <div class="px-6 py-4 border-b border-gray-100">
                <h5 class="text-sm font-semibold text-gray-700">
                    Daftar Pengajuan
                </h5>
            </div>

            <!-- BODY -->
            <div class="p-6">

                @if ($minat->isEmpty())
                    <div class="text-center py-14">

                        <h6 class="text-base font-semibold text-gray-700 mb-2">
                            Belum Ada Pengajuan
                        </h6>

                        <p class="text-sm text-gray-500">
                            Anda belum mengajukan minat terhadap lahan mana pun
                        </p>

                    </div>
                @else
                    <div class="overflow-x-auto">

                        <table class="w-full text-sm">

                            <thead class="bg-gray-50 text-gray-600 text-xs uppercase tracking-wider">
                                <tr>
                                    <th class="px-6 py-3 text-left font-medium">Komoditas</th>
                                    <th class="px-6 py-3 text-left font-medium">Pesan</th>
                                    <th class="px-6 py-3 text-center font-medium">Status</th>
                                    <th class="px-6 py-3 text-center font-medium">Aksi</th>
                                </tr>
                            </thead>

                            <tbody class="divide-y divide-gray-100">

                                @foreach ($minat as $item)
                                    <tr class="hover:bg-gray-50 transition">

                                        <td class="px-6 py-4 font-medium text-gray-800">
                                            {{ $item->lahan->komoditas }}
                                        </td>

                                        <td class="px-6 py-4 text-gray-600">
                                            {{ $item->pesan }}
                                        </td>

                                        <td class="px-6 py-4 text-center">

                                            @if ($item->status == 'menunggu')
                                                <span
                                                    class="inline-flex px-3 py-1 rounded-full text-xs font-medium bg-yellow-50 text-yellow-700">
                                                    Menunggu
                                                </span>
                                            @elseif ($item->status == 'diterima')
                                                <span
                                                    class="inline-flex px-3 py-1 rounded-full text-xs font-medium bg-green-50 text-green-700">
                                                    Diterima
                                                </span>
                                            @else
                                                <span
                                                    class="inline-flex px-3 py-1 rounded-full text-xs font-medium bg-red-50 text-red-700">
                                                    Ditolak
                                                </span>
                                            @endif

                                        </td>

                                        <td class="px-6 py-4 text-center">

                                            @if ($item->status == 'menunggu')
                                                <span class="text-xs text-gray-500">
                                                    Menunggu persetujuan
                                                </span>
                                            @elseif ($item->status == 'diterima')
                                                @php
                                                    $room = \App\Models\ChatRoom::where([
                                                        'lahan_id' => $item->lahan_id,
                                                        'pembeli_id' => $item->pembeli_id,
                                                    ])->first();
                                                @endphp

                                                @if ($room)
                                                    <a href="{{ url('/chat/' . $room->id) }}"
                                                        class="inline-flex items-center px-4 py-2 rounded-lg bg-blue-600 text-white text-xs font-medium hover:bg-blue-700 transition">
                                                        Buka Chat
                                                    </a>
                                                @else
                                                    <span class="text-xs text-gray-500">
                                                        Chat belum tersedia
                                                    </span>
                                                @endif
                                            @else
                                                <span class="text-xs text-red-600 font-medium">
                                                    Pengajuan ditolak
                                                </span>
                                            @endif

                                        </td>

                                    </tr>
                                @endforeach

                            </tbody>

                        </table>

                    </div>
                @endif

            </div>

        </div>

    </div>

@endsection
