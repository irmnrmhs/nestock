@extends('layouts.form')

@php
    $title = 'Kelola Data Stok Keluar';
    $singular = 'Stok Keluar';
    $hideImportButton = true;
@endphp

@section('table-headers')
    <th>No</th>
    <th>Kode Barang Jadi</th>
    <th>Tanggal</th>
    <th>Keping</th>
    <th>Berat</th>
    <th>PIC</th>
@stop

@section('table-body')
    @foreach($outStocks as $index => $outStock)
        <tr data-id="{{ $outStock->id }}">
            <td>{{ $index + 1 }}</td>
            <td>{{ $outStock->inStock->kode }}</td>
            <td>{{ $outStock->tanggal }}</td>
            <td>{{ $outStock->kuantitas }}</td>
            <td>{{ $outStock->berat }}</td>
            <td>{{ optional($outStock->pic)->nama ?? '-' }}</td>
            <td>
                <button class="btn btn-sm btn-warning btnEdit">Edit</button>
                <button class="btn btn-sm btn-danger btnDelete">Hapus</button>
            </td>
        </tr>
    @endforeach
@stop

@section('form-fields')
    <div class="mb-3">
        <label>Kode Barang Jadi</label>
        <select id="incoming_stock_id" class="form-control">
            <option value="">Pilih Barang Jadi</option>
            @foreach($inStocks as $inStock)
                <option value="{{ $inStock->id }}">{{ $inStock->kode }}</option>
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
const url = id ? `/outgoing-stock/${id}` : '/outgoing-stock';
const method = id ? 'PUT' : 'POST';

const data = {
    _token: '{{ csrf_token() }}',
        incoming_stock_id: $('#incoming_stock_id').val(),
        tanggal: $('#tanggal').val(),
        kuantitas: $('#kuantitas').val(),
        berat: $('#berat').val(),
        pic_id: $('#pic_id').val(),
    };

    fetch(url, {
        method: method,
        headers: {
            'Content-Type': 'application/json',
            'Accept': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        body: JSON.stringify(data)
    })
    .then(async response => {
        const res = await response.json();

        if (!response.ok) {
            throw new Error(res.message || 'Terjadi kesalahan');
        }

        return res;
    })
    .then(res => {
        if (res.status === 'success') {
            Swal.fire('Sukses', res.message, 'success')
                .then(() => location.reload());
        } else {
            Swal.fire('Gagal', res.message || 'Terjadi kesalahan', 'error');
        }
    })
    .catch(error => {
        Swal.fire('Gagal', error.message || 'Terjadi kesalahan', 'error');
    });
@stop

@section('custom-js')
    $(document).on('click', '.btnEdit', function() {
        const id = $(this).closest('tr').data('id');
        fetch(`/outgoing-stock/${id}`)
            .then(r => r.json())
            .then(outStock => {
                $('#item_id').val(outStock.id);
                $('#incoming_stock_id').val(outStock.incoming_stock_id);
                $('#tanggal').val(outStock.tanggal);
                $('#kuantitas').val(outStock.kuantitas);
                $('#berat').val(outStock.berat);
                $('#pic_id').val(outStock.pic_id);
                $('#modalTitle').text('Edit Stok Keluar');
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
                fetch(`/outgoing-stock/${id}`, {
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