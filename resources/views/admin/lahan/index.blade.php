@extends('admin.layout')

@section('content')
    <!-- HEADER -->
    <div class="mb-6">
        <h1 class="text-2xl font-semibold tracking-tight">Verifikasi Lahan</h1>
        <p class="text-sm text-gray-500 mt-1">
            Kelola dan validasi data lahan yang diajukan oleh petani </p>
    </div>

    <!-- TABLE CARD -->
    <div class="bg-white border border-gray-100 rounded-xl shadow-sm overflow-hidden">

        <div class="p-5 border-b border-gray-100">
            <h2 class="text-sm font-semibold text-gray-700">
                Daftar Lahan Pending
            </h2>
        </div>

        <div class="overflow-x-auto">

            <table class="w-full text-sm">

                <thead class="bg-gray-50 text-gray-600 text-xs uppercase tracking-wider">
                    <tr>
                        <th class="text-left p-4 font-medium">Foto</th>
                        <th class="text-left p-4 font-medium">Petani</th>
                        <th class="text-left p-4 font-medium">Komoditas</th>
                        <th class="text-left p-4 font-medium">Luas</th>
                        <th class="text-left p-4 font-medium">Harga</th>
                        <th class="text-left p-4 font-medium">Alamat</th>
                        <th class="text-left p-4 font-medium">Status</th>
                        <th class="text-right p-4 font-medium">Aksi</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-gray-100">

                    @forelse ($lahanPending as $l)
                        <tr class="hover:bg-gray-50 transition">

                            <!-- FOTO LAHAN -->
                            <td class="p-4">
                                @if ($l->foto_lahan)
                                    <img src="{{ asset('storage/' . $l->foto_lahan) }}"
                                        class="w-12 h-12 rounded-lg object-cover">
                                @else
                                    <div class="w-12 h-12 rounded-lg bg-gray-200"></div>
                                @endif
                            </td>

                            <!-- PETANI -->
                            <td class="p-4 text-gray-800 font-medium">
                                {{ $l->petani->nama_lengkap ?? '-' }}
                            </td>

                            <!-- KOMODITAS -->
                            <td class="p-4 text-gray-700">
                                {{ $l->komoditas }}
                            </td>

                            <!-- LUAS -->
                            <td class="p-4 text-gray-600">
                                {{ $l->luas_lahan }} m²
                            </td>

                            <!-- HARGA -->
                            <td class="p-4 text-gray-600">
                                Rp {{ number_format($l->harga_min, 0, ',', '.') }}
                                -
                                Rp {{ number_format($l->harga_max, 0, ',', '.') }}
                            </td>

                            <!-- ALAMAT -->
                            <td class="p-4 text-gray-600 max-w-xs truncate">
                                {{ $l->alamat_lahan ?? '-' }}
                            </td>

                            <!-- STATUS -->
                            <td class="p-4">
                                <span class="px-2 py-1 text-xs rounded-full bg-yellow-50 text-yellow-700 font-medium">
                                    {{ $l->status }}
                                </span>
                            </td>

                            <!-- ACTION -->
                            <td class="p-4 text-right space-x-2">

                                <a href="/admin/lahan/{{ $l->id }}/approve"
                                    class="inline-flex items-center px-3 py-1.5 text-xs font-medium rounded-lg bg-green-600 text-white hover:bg-green-700 transition">
                                    Approve
                                </a>

                                <a href="/admin/lahan/{{ $l->id }}/reject"
                                    class="inline-flex items-center px-3 py-1.5 text-xs font-medium rounded-lg bg-red-600 text-white hover:bg-red-700 transition">
                                    Reject
                                </a>

                            </td>

                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="p-6 text-center text-gray-500">
                                Tidak ada lahan yang perlu diverifikasi
                            </td>
                        </tr>
                    @endforelse

                </tbody>

            </table>

        </div>

    </div>
@endsection
