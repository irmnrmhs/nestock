@extends('layouts.form')

@php
    $title = 'Data Ringkasan Stok';
    $singular = 'Ringkasan Stok';
    $hideImportButton = true;
    $hideAddButton = true;
    $hideActions = true;
    // $exportUrl = route('summary.export');
@endphp

@section('content')

<div class="d-flex justify-content-end mb-3">
    <button type="button" class="btn btn-success" id="btnExport">
        <i class="fas fa-file-export"></i> Ekspor
    </button>
</div>

@parent

@endsection

@section('table-headers')
    {{-- <th>No</th> --}}
    <th>Kode Barang Jadi</th>
    <th>Supplier</th>
    <th>Grade</th>
    <th>Keping Masuk</th>
    <th>Keping Keluar</th>
    <th>Sisa Keping</th>
    <th>Berat Masuk</th>
    <th>Berat Keluar</th>
    <th>Sisa Berat</th>
@stop

@section('table-body')
    @foreach($stocks as $stock)

    @php
        $keluarQty = $stock->outStocks->sum('kuantitas');
        $keluarBerat = $stock->outStocks->sum('berat');
    @endphp

    <tr>
        <td>{{ $stock->kode }}</td>
        <td>{{ $stock->supplier->supplier }}</td>
        <td>{{ $stock->product->grade }}</td>

        <td>{{ $stock->kuantitas }}</td>
        <td>{{ $keluarQty }}</td>
        <td>{{ $stock->kuantitas - $keluarQty }}</td>

        <td>{{ $stock->berat }}</td>
        <td>{{ $keluarBerat }}</td>
        <td>{{ $stock->berat - $keluarBerat }}</td>
    </tr>

    @endforeach
@stop

@section('export')

<div class="mb-3">
    <label>Aksi</label>
    <select name="format" class="form-control" required>
        <option value="preview">Preview</option>
        <option value="pdf">Download PDF</option>
        <option value="excel">Download Excel</option>
    </select>
</div>

<div class="mb-3">
    <label>Supplier</label>
    <select name="supplier_id" class="form-control">
        <option value="">Pilih Semua Supplier</option>
        @foreach($suppliers as $supplier)
            <option value="{{ $supplier->id }}">
                {{ $supplier->supplier }}
            </option>
        @endforeach
    </select>
</div>

<div class="mb-3">
    <label>Grade</label>
    <select name="product_id" class="form-control">
        <option value="">Pilih Semua Grade</option>
        @foreach($products as $product)
            <option value="{{ $product->id }}">
                {{ $product->grade }}
            </option>
        @endforeach
    </select>
</div>

<div class="mb-3">
    <label>Bulan</label>
    <input type="month" name="bulan" class="form-control">
    <small class="text-muted">
        Kosongkan untuk semua bulan.
    </small>
</div>

@endsection