<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Nota Pesanan</title>
    <style>
        @page {
            size: 58mm auto;
            margin: 0;
        }

        body {
            font-family: 'DejaVu Sans Mono', 'Courier New', Courier, monospace;
            font-size: 8px;
            /* Ukuran font diperkecil agar pas di 58mm */
            color: #000000;
            background-color: #ffffff;
            margin: 0 auto;
            padding: 6mm 3mm;
            width: 52mm;
            /* Area cetak aman untuk kertas 58mm */
            line-height: 1.3;
        }

        /* HEADER PART */
        .header {
            text-align: center;
            margin-bottom: 8px;
        }

        .company-name {
            font-size: 12px;
            font-weight: bold;
            text-transform: uppercase;
        }

        .company-tagline {
            font-size: 7px;
            margin-top: 1px;
        }

        .invoice-title {
            font-size: 9px;
            font-weight: bold;
            text-transform: uppercase;
            margin-top: 6px;
        }

        .divider {
            border-top: 1px dashed #000000;
            margin: 6px 0;
        }

        /* METADATA INFO PART */
        .info-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 6px;
        }

        .info-table td {
            padding: 1px 0;
            vertical-align: top;
            font-size: 8px;
        }

        .status-text {
            text-transform: uppercase;
            font-weight: bold;
            border: 1px solid #000000;
            padding: 0 2px;
            font-size: 7px;
        }

        /* PRODUCT TABLE PART (STACKED LAYOUT FOR 58MM) */
        .produk-table {
            width: 100%;
            border-collapse: collapse;
        }

        .produk-table td {
            padding: 2px 0;
            vertical-align: top;
            font-size: 8px;
        }

        .item-name {
            font-weight: bold;
            display: block;
        }

        .item-details {
            color: #000000;
            padding-left: 2px;
        }

        .text-right {
            text-align: right;
        }

        /* SUMMARY PART */
        .summary-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 2px;
        }

        .summary-table td {
            padding: 4px 0;
            font-size: 9px;
            font-weight: bold;
        }

        /* FOOTER PART */
        .footer {
            margin-top: 12px;
            text-align: center;
            font-size: 7px;
            line-height: 1.3;
        }
    </style>
</head>

<body>
    @php
        $logo = public_path('images/agriconnect-logo2.png');
    @endphp

    <div class="header">
        @if (file_exists($logo))
            <img src="{{ $logo }}" style="height: 25px; filter: grayscale(100%); margin-bottom: 3px;">
        @endif
        <div class="company-name">AgriConnect</div>
        <div class="company-tagline">Platform Distribusi Pertanian</div>
        <div class="invoice-title">- NOTA BELANJA -</div>
    </div>

    <div class="divider"></div>

    <table class="info-table">
        <tr>
            <td width="30%">Nota</td>
            <td>: {{ $pesanan->id }}</td>
        </tr>
        <tr>
            <td>Waktu</td>
            <td>: {{ $pesanan->created_at->format('d/m/y H:i') }}</td>
        </tr>
        <tr>
            <td>Pelanggan</td>
            <td>: {{ $pesanan->pembeli->nama_lengkap }}</td>
        </tr>
        <tr>
            <td>Alamat</td>
            <td>: {{ $pesanan->alamat_tujuan }}</td>
        </tr>
        <tr>
            <td>Status</td>
            <td>: <span class="status-text">{{ strtoupper(str_replace('_', ' ', $pesanan->status_pesanan)) }}</span>
            </td>
        </tr>
    </table>

    <div class="divider"></div>

    <table class="produk-table">
        <tbody>
            @foreach ($pesanan->detail as $item)
                <tr>
                    <td colspan="2">
                        <span class="item-name">{{ $item->nama_produk_saat_beli }}</span>
                    </td>
                </tr>
                <tr>
                    <td class="item-details">
                        {{ $item->jumlah }} x {{ number_format($item->harga_saat_beli, 0, ',', '.') }}
                    </td>
                    <td class="text-right" style="font-weight: bold;">
                        {{ number_format($item->jumlah * $item->harga_saat_beli, 0, ',', '.') }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="divider"></div>

    <table class="summary-table">
        <tr>
            <td>TOTAL</td>
            <td class="text-right">Rp {{ number_format($pesanan->total_harga, 0, ',', '.') }}</td>
        </tr>
    </table>

    <div class="divider"></div>

    <div class="footer">
        Terima Kasih Atas Pembelian Anda<br>
        Dokumen sah otomatis sistem AgriConnect
    </div>

</body>

</html>
