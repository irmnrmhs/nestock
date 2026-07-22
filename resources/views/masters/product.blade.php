@extends('layouts.form')

@php
    $title = 'Kelola Data Barang Jadi';
    $singular = 'Barang Jadi';
    $hideImportButton = true;
@endphp

@section('table-headers')
    <th>No</th>
    <th>Grade</th>
    <th>Kode</th>
    <th>Keterangan</th>
@stop

@section('table-body')
    @foreach($products as $index => $product)
        <tr data-id="{{ $product->id }}">
            <td>{{ $index + 1 }}</td>
            <td>{{ $product->grade }}</td>
            <td>{{ $product->kode }}</td>
            <td>{{ empty($product->ket) ? '-' : $product->ket }}</td>
            <td>
                <button class="btn btn-sm btn-warning btnEdit">Edit</button>
                <button class="btn btn-sm btn-danger btnDelete">Hapus</button>
            </td>
        </tr>
    @endforeach
@stop

@section('form-fields')
    <div class="mb-3">
        <label>Grade</label>
        <input type="text" id="grade" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Kode</label>
        <input type="text" id="kode" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Keterangan</label>
        <input type="text" id="ket" class="form-control">
    </div>
@stop

@section('form-submit-script')
    const id = $('#item_id').val();
    const url = id ? `/product/${id}` : '/product';
    const method = id ? 'PUT' : 'POST';

    const data = {
        _token: '{{ csrf_token() }}',
        grade: $('#grade').val(),
        kode: $('#kode').val(),
        ket: $('#ket').val(),
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
        fetch(`/product/${id}`)
            .then(r => r.json())
            .then(product => {
                $('#item_id').val(product.id);
                $('#grade').val(product.grade);
                $('#kode').val(product.kode);
                $('#ket').val(product.ket);
                $('#modalTitle').text('Edit Product');
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
                fetch(`/product/${id}`, {
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