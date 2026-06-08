@extends('petani.layout')

@section('content')
    <div class="max-w-6xl mx-auto">

        {{-- HEADER --}}
        <div class="mb-6">
            <h2 class="text-3xl font-bold text-gray-800">Minat Pembeli Masuk</h2>
            <p class="text-gray-500 mt-1">
                Kelola permintaan minat dari pembeli terhadap lahan Anda.
            </p>
        </div>

        {{-- SUCCESS MESSAGE --}}
        @if (session('success'))
            <div class="bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-xl mb-4">
                {{ session('success') }}
            </div>
        @endif

        {{-- EMPTY STATE --}}
        @if ($minat->count() == 0)
            <div class="bg-white p-8 rounded-2xl shadow-sm border text-center text-gray-500">
                Belum ada pengajuan minat masuk saat ini.
            </div>
        @else
            <div class="bg-white shadow-sm border border-gray-100 rounded-2xl overflow-hidden">

                <table class="w-full text-sm">

                    {{-- TABLE HEADER --}}
                    <thead class="bg-gray-50 text-gray-700">
                        <tr>
                            <th class="text-left p-4">Pembeli</th>
                            <th class="text-left p-4">Lahan</th>
                            <th class="text-left p-4">Pesan</th>
                            <th class="text-left p-4">Status</th>
                            <th class="text-left p-4">Aksi</th>
                        </tr>
                    </thead>

                    <tbody class="divide-y">

                        @foreach ($minat as $item)
                            <tr class="hover:bg-gray-50 transition">

                                {{-- PEMBELI --}}
                                <td class="p-4 font-medium text-gray-800">
                                    {{ $item->pembeli->nama_lengkap ?? 'Unknown' }}
                                </td>

                                {{-- LAHAN --}}
                                <td class="p-4 text-gray-700">
                                    {{ $item->lahan->komoditas ?? '-' }}
                                </td>

                                {{-- PESAN --}}
                                <td class="p-4 text-gray-600">
                                    {{ $item->pesan }}
                                </td>

                                {{-- STATUS --}}
                                <td class="p-4">
                                    @if ($item->status == 'menunggu')
                                        <span
                                            class="px-3 py-1 text-xs font-semibold rounded-full bg-yellow-100 text-yellow-700">
                                            Menunggu
                                        </span>
                                    @elseif ($item->status == 'diterima')
                                        <span
                                            class="px-3 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-700">
                                            Diterima
                                        </span>
                                    @else
                                        <span class="px-3 py-1 text-xs font-semibold rounded-full bg-red-100 text-red-700">
                                            Ditolak
                                        </span>
                                    @endif
                                </td>

                                {{-- AKSI --}}
                                <td class="p-4">

                                    <div class="flex flex-wrap gap-2 items-center">

                                        {{-- MENUNGGU --}}
                                        @if ($item->status == 'menunggu')
                                            <form action="{{ url('/petani/minat/' . $item->id . '/accept') }}"
                                                method="POST">
                                                @csrf
                                                <button
                                                    class="px-3 py-1 rounded-lg bg-green-600 hover:bg-green-700 text-white text-sm">
                                                    Accept
                                                </button>
                                            </form>

                                            <form action="{{ url('/petani/minat/' . $item->id . '/reject') }}"
                                                method="POST">
                                                @csrf
                                                <button
                                                    class="px-3 py-1 rounded-lg bg-red-600 hover:bg-red-700 text-white text-sm">
                                                    Reject
                                                </button>
                                            </form>

                                            {{-- DITERIMA --}}
                                        @elseif ($item->status == 'diterima')
                                            @php
                                                $room = \App\Models\ChatRoom::where('lahan_id', $item->lahan_id)
                                                    ->where('pembeli_id', $item->pembeli_id)
                                                    ->first();
                                            @endphp

                                            @if ($room)
                                                <a href="{{ url('/chat/' . $room->id) }}"
                                                    class="px-3 py-1 rounded-lg bg-blue-600 hover:bg-blue-700 text-white text-sm">
                                                    Open Chat
                                                </a>
                                            @else
                                                <span class="text-gray-400 text-sm italic">
                                                    Chat belum tersedia
                                                </span>
                                            @endif
                                        @else
                                            <span class="text-gray-400 text-sm">
                                                Tidak ada aksi
                                            </span>
                                        @endif

                                    </div>

                                </td>

                            </tr>
                        @endforeach

                    </tbody>

                </table>

            </div>
        @endif

    </div>
@endsection
