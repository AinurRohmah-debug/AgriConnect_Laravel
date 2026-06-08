@extends('admin.layout')

@section('content')
    <!-- HEADER -->
    <div class="mb-8">
        <h1 class="text-2xl font-semibold tracking-tight">Dashboard</h1>
        <p class="text-sm text-gray-500 mt-1">Overview sistem dan aktivitas data</p>
    </div>

    <!-- ⭐ EXPORT (PINDAH KE ATAS) -->
    <div class="bg-white border border-gray-100 p-5 rounded-xl shadow-sm mb-8">

        <div class="flex items-center justify-between mb-4">
            <h2 class="text-sm font-semibold text-gray-700">Export Data</h2>
            <p class="text-xs text-gray-400">Download laporan sistem</p>
        </div>

        <div class="flex flex-wrap gap-3">

            <a href="/admin/export/users"
                class="px-4 py-2 rounded-lg text-sm font-medium bg-blue-600 text-white hover:bg-blue-700 transition">
                Export User
            </a>

            <a href="/admin/export/produk"
                class="px-4 py-2 rounded-lg text-sm font-medium bg-green-600 text-white hover:bg-green-700 transition">
                Export Produk
            </a>

            <a href="/admin/export/lahan"
                class="px-4 py-2 rounded-lg text-sm font-medium bg-yellow-500 text-white hover:bg-yellow-600 transition">
                Export Lahan
            </a>

        </div>

    </div>

    <!-- STAT CARDS -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-5 mb-8">

        <div class="bg-white border border-gray-100 p-5 rounded-xl shadow-sm">
            <p class="text-sm text-gray-500">Petani</p>
            <p class="text-2xl font-semibold mt-2">{{ $totalPetani }}</p>
        </div>

        <div class="bg-white border border-gray-100 p-5 rounded-xl shadow-sm">
            <p class="text-sm text-gray-500">Pembeli</p>
            <p class="text-2xl font-semibold mt-2">{{ $totalPembeli }}</p>
        </div>

        <div class="bg-white border border-gray-100 p-5 rounded-xl shadow-sm">
            <p class="text-sm text-gray-500">Produk</p>
            <p class="text-2xl font-semibold mt-2">{{ $totalProduk }}</p>
        </div>

        <div class="bg-white border border-gray-100 p-5 rounded-xl shadow-sm">
            <p class="text-sm text-gray-500">Lahan</p>
            <p class="text-2xl font-semibold mt-2">{{ $totalLahan }}</p>
        </div>

    </div>

    <!-- CHART SECTION -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">

        <!-- USER DISTRIBUTION -->
        <div class="bg-white border border-gray-100 p-6 rounded-xl shadow-sm">
            <h2 class="text-sm font-semibold text-gray-700 mb-4">User Distribution</h2>
            <div class="h-80">
                <canvas id="userChart"></canvas>
            </div>
        </div>

        <!-- KATEGORI -->
        <div class="bg-white border border-gray-100 p-6 rounded-xl shadow-sm">
            <h2 class="text-sm font-semibold text-gray-700 mb-4">Produk per Kategori</h2>
            <div class="h-80">
                <canvas id="kategoriChart"></canvas>
            </div>
        </div>

        <!-- LAHAN STATUS -->
        <div class="bg-white border border-gray-100 p-6 rounded-xl shadow-sm lg:col-span-2">
            <h2 class="text-sm font-semibold text-gray-700 mb-4">Distribusi Status Lahan</h2>
            <div class="h-96">
                <canvas id="lahanStatusChart"></canvas>
            </div>
        </div>

    </div>

    <!-- CHART JS -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        const baseOptions = {
            responsive: true,
            maintainAspectRatio: false
        };

        new Chart(document.getElementById('userChart'), {
            type: 'pie',
            data: {
                labels: {!! json_encode($userDistribution->keys()) !!},
                datasets: [{
                    data: {!! json_encode($userDistribution->values()) !!}
                }]
            },
            options: baseOptions
        });

        new Chart(document.getElementById('kategoriChart'), {
            type: 'bar',
            data: {
                labels: {!! json_encode($produkKategori->keys()) !!},
                datasets: [{
                    label: 'Jumlah Produk',
                    data: {!! json_encode($produkKategori->values()) !!}
                }]
            },
            options: baseOptions
        });

        new Chart(document.getElementById('lahanStatusChart'), {
            type: 'bar',
            data: {
                labels: {!! json_encode($lahanStatus->keys()) !!},
                datasets: [{
                    label: 'Jumlah Lahan',
                    data: {!! json_encode($lahanStatus->values()) !!}
                }]
            },
            options: baseOptions
        });
    </script>
@endsection
