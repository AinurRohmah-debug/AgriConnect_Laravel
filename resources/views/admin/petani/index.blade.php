@extends('admin.layout')

@section('content')
    <!-- HEADER -->
    <div class="mb-6">
        <h1 class="text-2xl font-semibold tracking-tight">Verifikasi Petani</h1>
        <p class="text-sm text-gray-500 mt-1">
            Validasi akun petani yang mendaftar ke sistem </p>
    </div>

    <!-- TABLE CARD -->
    <div class="bg-white border border-gray-100 rounded-xl shadow-sm overflow-hidden">

        <div class="p-5 border-b border-gray-100">
            <h2 class="text-sm font-semibold text-gray-700">
                Daftar Petani Pending
            </h2>
        </div>

        <div class="overflow-x-auto">

            <table class="w-full text-sm">

                <thead class="bg-gray-50 text-gray-600 text-xs uppercase tracking-wider">
                    <tr>
                        <th class="text-left p-4 font-medium">Foto</th>
                        <th class="text-left p-4 font-medium">Nama</th>
                        <th class="text-left p-4 font-medium">Email</th>
                        <th class="text-left p-4 font-medium">Alamat</th>
                        <th class="text-left p-4 font-medium">Status</th>
                        <th class="text-right p-4 font-medium">Aksi</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-gray-100">

                    @foreach ($petaniPending as $p)
                        <tr class="hover:bg-gray-50 transition">

                            <!-- FOTO -->
                            <td class="p-4">
                                @if ($p->foto_profil)
                                    <img src="{{ asset('uploads/profil/' . $p->foto_profil) }}"
                                        class="w-10 h-10 rounded-full object-cover">
                                @else
                                    <div class="w-10 h-10 rounded-full bg-gray-200"></div>
                                @endif
                            </td>

                            <!-- NAMA -->
                            <td class="p-4 font-medium text-gray-800">
                                {{ $p->nama_lengkap }}
                            </td>

                            <!-- EMAIL -->
                            <td class="p-4 text-gray-600">
                                {{ $p->email }}
                            </td>

                            <!-- ALAMAT -->
                            <td class="p-4 text-gray-600 max-w-xs truncate">
                                {{ $p->alamat_pengiriman ?? '-' }}
                            </td>

                            <!-- STATUS -->
                            <td class="p-4">
                                <span class="px-2 py-1 text-xs rounded-full bg-yellow-50 text-yellow-700 font-medium">
                                    {{ $p->status_verifikasi }}
                                </span>
                            </td>

                            <!-- ACTION -->
                            <td class="p-4 text-right space-x-2">

                                <a href="/admin/petani/{{ $p->id }}/approve"
                                    class="inline-flex items-center px-3 py-1.5 text-xs font-medium rounded-lg bg-green-600 text-white hover:bg-green-700 transition">
                                    Approve
                                </a>

                                <a href="/admin/petani/{{ $p->id }}/reject"
                                    class="inline-flex items-center px-3 py-1.5 text-xs font-medium rounded-lg bg-red-600 text-white hover:bg-red-700 transition">
                                    Reject
                                </a>

                            </td>

                        </tr>
                    @endforeach

                </tbody>

            </table>

        </div>

    </div>
@endsection
