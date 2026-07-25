@extends('layouts.form')

@php
    $title = 'Kelola Data Stok Masuk';
    $singular = 'Stok Masuk';
    $hideImportButton = true;
@endphp

@section('table-headers')
    <th>No</th>
    <th>Kode</th>
    <th>Supplier</th>
    <th>Grade</th>
    <th>Tanggal</th>
    <th>Keping</th>
    <th>Berat</th>
    <th>PIC</th>
@stop

@section('table-body')
    @foreach($inStocks as $index => $inStock)
        <tr data-id="{{ $inStock->id }}">
            <td>{{ $index + 1 }}</td>
            <td>{{ $inStock->kode }}</td>
            <td>{{ $inStock->supplier->supplier }}</td>
            <td>{{ $inStock->product->grade }}</td>
            <td>{{ $inStock->tanggal }}</td>
            <td>{{ $inStock->kuantitas }}</td>
            <td>{{ $inStock->berat }}</td>
            <td>{{ optional($inStock->pic)->nama ?? '-' }}</td>
            <td>
                <button class="btn btn-sm btn-warning btnEdit">Edit</button>
                <button class="btn btn-sm btn-danger btnDelete">Hapus</button>
            </td>
        </tr>
    @endforeach
@stop

@section('form-fields')
    <div class="mb-3">
        <label>Supplier</label>
        <select id="supplier_id" class="form-control">
            <option value="">Pilih Supplier</option>
            @foreach($suppliers as $supplier)
                <option value="{{ $supplier->id }}">{{ $supplier->supplier }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label>Grade</label>
        <select id="product_id" class="form-control">
            <option value="">Pilih Grade</option>
            @foreach($products as $product)
                <option value="{{ $product->id }}">{{ $product->grade }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label>Tanggal</label>
        <input type="date" id="tanggal" class="form-control">
    </div>

    <div class="mb-3">
        <label>Keping (pcs)</label>
        <input type="number" id="kuantitas" min="0" step="1" class="form-control">
    </div>

    <div class="mb-3">
        <label>Berat (gram)</label>
        <input type="number" id="berat" min="0" step="0.01" class="form-control">
    </div>

    <div class="mb-3">
        <label>PIC</label>
        <select id="pic_id" class="form-control">
            <option value="">Pilih PIC</option>
            @foreach($pics as $pic)
                <option value="{{ $pic->id }}">{{ $pic->nama }}</option>
            @endforeach
        </select>
    </div>
@stop

@section('form-submit-script')
    const id = $('#item_id').val();
    const url = id ? `/incoming-stock/${id}` : '/incoming-stock';
    const method = id ? 'PUT' : 'POST';

    const data = {
        _token: '{{ csrf_token() }}',
        kode: $('#kode').val(),
        supplier_id: $('#supplier_id').val(),
        product_id: $('#product_id').val(),
        tanggal: $('#tanggal').val(),
        kuantitas: $('#kuantitas').val(),
        berat: $('#berat').val(),
        pic_id: $('#pic_id').val(),
    };

    fetch(url, {
        method: method,
        headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
        body: JSON.stringify(data)
    })
    .then(r => r.json())
    .then(res => {
        if (res.status === 'success') {
            Swal.fire('Sukses', res.message, 'success').then(() => location.reload());
        } else {
            Swal.fire('Gagal', res.message || 'Terjadi kesalahan', 'error');
        }
    })
    .catch(() => Swal.fire('Error', 'Gagal menambahkan data. Pastikan kode tidak duplikat', 'error'));
@stop

@section('custom-js')
    $(document).on('click', '.btnEdit', function() {
        const id = $(this).closest('tr').data('id');
        fetch(`/incoming-stock/${id}`)
            .then(r => r.json())
            .then(inStock => {
                $('#item_id').val(inStock.id);
                $('#kode').val(inStock.kode);
                $('#supplier_id').val(inStock.supplier_id);
                $('#product_id').val(inStock.product_id);
                $('#tanggal').val(inStock.tanggal);
                $('#kuantitas').val(inStock.kuantitas);
                $('#berat').val(inStock.berat);
                $('#pic_id').val(inStock.pic_id);
                $('#modalTitle').text('Edit Stok Masuk');
                new bootstrap.Modal('#crudModal').show();
            });
    });

    $(document).on('click', '.btnDelete', function() {
        const id = $(this).closest('tr').data('id');
        Swal.fire({
            title: 'Anda Yakin?',
            text: 'Data tidak dapat dikembalikan',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Ya',
            cancelButtonText: 'Batal'
        }).then(result => {
            if (result.isConfirmed) {
                fetch(`/incoming-stock/${id}`, {
                    method: 'DELETE',
                    headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' }
                })
                .then(r => r.json())
                .then(res => {
                    if (res.status === 'success') {
                        Swal.fire('Terhapus!', res.message, 'success').then(() => location.reload());
                    } else {
                        Swal.fire('Gagal', res.message || 'Tidak bisa menghapus data', 'error');
                    }
                })
                .catch(() => Swal.fire('Error', 'Gagal menghapus data. Pastikan data tidak terintegrasi dengan data lainnya.', 'error'));
            }
        });
    });
@stop