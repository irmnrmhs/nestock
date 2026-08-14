@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')

<p>Selamat datang, <strong>{{ auth()->user()->name }}</strong>!</p>

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
                <h3>{{ number_format($totalIncomingWeight,2) }}</h3>
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
                <h3>{{ number_format($totalOutgoingWeight,2) }}</h3>
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

    <div class="card-header d-flex justify-content-between align-items-center">

        <h3 class="card-title">
            Berat Masuk & Keluar per Bulan
        </h3>

        <form method="GET" action="{{ route('dashboard') }}">

            <select name="tahun"
                    class="form-control"
                    onchange="this.form.submit()">

                @foreach($years as $year)
                    <option value="{{ $year }}"
                        {{ $tahun == $year ? 'selected' : '' }}>
                        {{ $year }}
                    </option>
                @endforeach

            </select>

        </form>

    </div>

    <div class="card-body">
        <canvas id="monthlyChart"></canvas>
    </div>

</div>


<div class="row">

    {{-- Supplier Masuk --}}
    <div class="col-md-6">

        <div class="card">

            <div class="card-header">
                <h3 class="card-title">
                    Berat Masuk berdasarkan Supplier
                </h3>
            </div>

            <div class="card-body">
                <canvas id="supplierIncomingChart"></canvas>
            </div>

        </div>

    </div>

    {{-- Supplier Keluar --}}
    <div class="col-md-6">

        <div class="card">

            <div class="card-header">
                <h3 class="card-title">
                    Berat Keluar berdasarkan Supplier
                </h3>
            </div>

            <div class="card-body">
                <canvas id="supplierOutgoingChart"></canvas>
            </div>

        </div>

    </div>

</div>


<div class="row">

    {{-- Grade Masuk --}}
    <div class="col-md-6">

        <div class="card">

            <div class="card-header">
                <h3 class="card-title">
                    Berat Masuk berdasarkan Grade
                </h3>
            </div>

            <div class="card-body">
                <canvas id="gradeIncomingChart"></canvas>
            </div>

        </div>

    </div>

    {{-- Grade Keluar --}}
    <div class="col-md-6">

        <div class="card">

            <div class="card-header">
                <h3 class="card-title">
                    Berat Keluar berdasarkan Grade
                </h3>
            </div>

            <div class="card-body">
                <canvas id="gradeOutgoingChart"></canvas>
            </div>

        </div>

    </div>

</div>

@stop


@section('js')

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>

const monthNames=[
'Jan','Feb','Mar','Apr','Mei','Jun',
'Jul','Agu','Sep','Okt','Nov','Des'
];

// Line Chart

new Chart(document.getElementById('monthlyChart'),{

    type:'line',

    data:{

        labels: monthNames,

        datasets:[
        {
            label:'Berat Masuk',
            data:@json($incomingPerMonth->pluck('total')),
            borderWidth:2,
            fill:false
        },
        {
            label:'Berat Keluar',
            data:@json($outgoingPerMonth->pluck('total')),
            borderWidth:2,
            fill:false
        }]
    }

});


// Supplier Masuk

new Chart(document.getElementById('supplierIncomingChart'),{

    type:'bar',

    data:{

        labels:@json($incomingBySupplier->pluck('supplier')),

        datasets:[{

            label:'Kg',

            data:@json($incomingBySupplier->pluck('berat'))

        }]
    }

});


// Supplier Keluar

new Chart(document.getElementById('supplierOutgoingChart'),{

    type:'bar',

    data:{

        labels:@json($outgoingBySupplier->pluck('supplier')),

        datasets:[{

            label:'Kg',

            data:@json($outgoingBySupplier->pluck('berat'))

        }]
    }

});


// Grade Masuk

new Chart(document.getElementById('gradeIncomingChart'),{

    type:'bar',

    data:{

        labels:@json($incomingByGrade->pluck('grade')),

        datasets:[{

            label:'Kg',

            data:@json($incomingByGrade->pluck('berat'))

        }]
    }

});


// Grade Keluar

new Chart(document.getElementById('gradeOutgoingChart'),{

    type:'bar',

    data:{

        labels:@json($outgoingByGrade->pluck('grade')),

        datasets:[{

            label:'Kg',

            data:@json($outgoingByGrade->pluck('berat'))

        }]
    }

});

</script>

@stop