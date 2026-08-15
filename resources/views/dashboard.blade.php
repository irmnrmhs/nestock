@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')

<p>Selamat datang, <strong>{{ auth()->user()->name }}</strong>!</p>


{{-- Filter Tahun --}}
<div class="d-flex justify-content-center mb-4">
    <form method="GET" action="{{ route('dashboard') }}">
        <div class="text-center">
            <label for="tahun" class="mb-1">
                Filter Tahun
            </label>
            <select name="tahun"
                    id="tahun"
                    class="form-control"
                    style="width: 200px;"
                    onchange="this.form.submit()">

                @foreach($years as $year)
                    <option value="{{ $year }}"
                        {{ $tahun == $year ? 'selected' : '' }}>
                        {{ $year }}
                    </option>
                @endforeach
            </select>
        </div>
    </form>
</div>


{{-- Card Statistik --}}
<div class="row">
    <div class="col-lg-3 col-md-6">
        <div class="small-box bg-info">
            <div class="inner">
                <h3>{{ $supplier }}</h3>
                <p>Jumlah Supplier</p>
            </div>
            <div class="icon">
                <i class="fas fa-link"></i>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-6">
        <div class="small-box bg-success">
            <div class="inner">
                <h3>
                    {{ number_format($totalIncomingWeight, 2) }}
                </h3>
                <p>Total Berat Masuk (kg)</p>
            </div>

            <div class="icon">
                <i class="fas fa-arrow-down"></i>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-6">
        <div class="small-box bg-warning">
            <div class="inner">
                <h3>
                    {{ number_format($totalOutgoingWeight, 2) }}
                </h3>
                <p>Total Berat Keluar (kg)</p>
            </div>

            <div class="icon">
                <i class="fas fa-arrow-up"></i>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-6">
        <div class="small-box bg-danger">
            <div class="inner">
                <h3>
                    {{ number_format($remainingWeight, 2) }}
                    <small>
                        ({{ number_format($remainingPercentage, 2) }}%)
                    </small>
                </h3>

                <p>Sisa Gudang (kg)</p>
            </div>

            <div class="icon">
                <i class="fas fa-warehouse"></i>
            </div>
        </div>
    </div>
</div>

{{-- Line Chart --}}
<div class="card">
    <div class="card-header">
        <h3 class="card-title">
            Berat Masuk & Keluar per Bulan
        </h3>
    </div>

    <div class="card-body">
        <canvas id="monthlyChart"></canvas>
    </div>
</div>

{{-- Supplier Chart --}}
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                    Berat Masuk & Keluar berdasarkan Supplier
                </h3>
            </div>

            <div class="card-body">
                <canvas id="supplierChart"></canvas>
            </div>
        </div>
    </div>
</div>

{{-- Grade Chart --}}
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                    Berat Masuk & Keluar berdasarkan Grade
                </h3>
            </div>

            <div class="card-body">
                <canvas id="gradeChart"></canvas>
            </div>
        </div>
    </div>
</div>

@stop


@section('js')

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>

const monthNames = [
    'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
    'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
];

// Line Chart
new Chart(document.getElementById('monthlyChart'), {

    type: 'line',
    data: {
        labels: monthNames,
        datasets: [
            {
                label: 'Berat Masuk',
                data: @json($incomingPerMonth->pluck('total')),
                borderWidth: 2,
                fill: false
            },

            {
                label: 'Berat Keluar',
                data: @json($outgoingPerMonth->pluck('total')),
                borderWidth: 2,
                fill: false
            }
        ]
    },

    options: {
        responsive: true,
        scales: {
            y: {
                beginAtZero: true,
                title: {
                    display: true,
                    text: 'Berat (kg)'
                }
            }
        }
    }

});

// Stok Masuk & Keluar berdasarkan Supplier
new Chart(document.getElementById('supplierChart'), {

    type: 'bar',
    data: {
        labels: @json($incomingBySupplier->pluck('supplier')),
        datasets: [
            {
                label: 'Berat Masuk',
                data: @json($incomingBySupplier->pluck('berat')),
                borderWidth: 1
            },

            {
                label: 'Berat Keluar',
                data: @json($outgoingBySupplier->pluck('berat')),
                borderWidth: 1
            }
        ]
    },

    options: {
        responsive: true,
        scales: {
            y: {
                beginAtZero: true,
                title: {
                    display: true,
                    text: 'Berat (kg)'
                }
            }
        }
    }
});


// Stok Masuk & Keluar berdasarkan Grade
new Chart(document.getElementById('gradeChart'), {

    type: 'bar',
    data: {
        labels: @json($incomingByGrade->pluck('grade')),
        datasets: [
            {
                label: 'Berat Masuk',
                data: @json($incomingByGrade->pluck('berat')),
                borderWidth: 1
            },

            {
                label: 'Berat Keluar',
                data: @json($outgoingByGrade->pluck('berat')),
                borderWidth: 1
            }
        ]
    },

    options: {
        responsive: true,
        scales: {
            y: {
                beginAtZero: true,

                title: {
                    display: true,
                    text: 'Berat (kg)'
                }
            }
        }
    }
});

</script>

@stop