<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">

    <title>Data Ringkasan Stok</title>

    <link rel="stylesheet" href="{{ public_path('css/style.css') }}">
</head>

<body>

<table class="header-table">

    <tr>

        <td class="logo">
            <img src="{{ public_path('img/Logo.png') }}" width="110">
        </td>

        <td class="title">
            <h1>DATA RINGKASAN STOK</h1>
            <h2>PT ANUGRAH ALAM NESTINDO</h2>
        </td>

    </tr>

</table>

<table class="filter-table">

    @if(!empty($supplier))
    <tr>
        <td class="label">Supplier</td>
        <td class="colon">:</td>
        <td>{{ $supplier->supplier }}</td>
    </tr>
    @endif

    @if(!empty($product))
    <tr>
        <td class="label">Grade</td>
        <td class="colon">:</td>
        <td>{{ $product->grade }}</td>
    </tr>
    @endif

    @if(!empty($bulan))
    <tr>
        <td class="label">Bulan</td>
        <td class="colon">:</td>
        <td>{{ \Carbon\Carbon::parse($bulan.'-01')->translatedFormat('F Y') }}</td>
    </tr>
    @endif

</table>

<table class="report-table">

    <thead>

    <tr>

        <th rowspan="3" width="45">
            No
            <br>
            <span>(No)</span>
        </th>

        <th rowspan="3" width="120">
            Tanggal Kedatangan
            <br>
            <span>(Arrival Date)</span>
        </th>

        <th colspan="2">
            Jumlah Barang Masuk
            <br>
            <span>(Quantity of Incoming)</span>
        </th>

        <th rowspan="3" width="120">
            Tanggal Keluar Terakhir
            <br>
            <span>(Last Outgoing Date)</span>
        </th>

        <th colspan="2">
            Jumlah Barang Keluar
            <br>
            <span>(Quantity of Outgoing)</span>
        </th>

        <th colspan="2">
            Sisa Stok
            <br>
            <span>(Stock)</span>
        </th>

    </tr>

    <tr>

        <th>Bag</th>
        <th>Gram</th>

        <th>Bag</th>
        <th>Gram</th>

        <th>Bag</th>
        <th>Gram</th>

    </tr>

    <tr>

        <th><span>(Bags)</span></th>
        <th><span>(Gram)</span></th>

        <th><span>(Bags)</span></th>
        <th><span>(Gram)</span></th>

        <th><span>(Bags)</span></th>
        <th><span>(Gram)</span></th>

    </tr>

    </thead>

    <tbody>

        @forelse($stocks as $index => $stock)

            <tr>

                <td class="center">{{ $index + 1 }}</td>

                <td>{{ $stock['Tanggal Masuk'] ?? '-' }}</td>

                <td class="right">
                    {{ number_format($stock['Keping Masuk']) }}
                </td>

                <td class="right">
                    {{ number_format($stock['Berat Masuk'], 0, ',', '.') }}
                </td>

                <td>
                    {{ $stock['Tanggal Keluar'] ?? '-' }}
                </td>

                <td class="right">
                    {{ number_format($stock['Keping Keluar']) }}
                </td>

                <td class="right">
                    {{ number_format($stock['Berat Keluar'], 0, ',', '.') }}
                </td>

                <td class="right">
                    {{ number_format($stock['Sisa Keping']) }}
                </td>

                <td class="right">
                    {{ number_format($stock['Sisa Berat'], 0, ',', '.') }}
                </td>

            </tr>

        @empty

            <tr>
                <td colspan="9" class="center">
                    <strong>Data masih kosong</strong>
                </td>
            </tr>

        @endforelse

    </tbody>

</table>

</body>

</html>