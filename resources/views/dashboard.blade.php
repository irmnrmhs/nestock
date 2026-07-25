@extends('adminlte::page')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <p>Selamat datang, {{ auth()->user()->name }}!</p>
    <div class="row">

        <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{ $supplier }}</h3>
                    <p>Supplier</p>
                </div>
                <div class="icon">
                    <i class="fas fa-truck"></i>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{ $product }}</h3>
                    <p>Grade</p>
                </div>
                <div class="icon">
                    <i class="fas fa-box"></i>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>{{ $incoming }}</h3>
                    <p>Keping Masuk</p>
                </div>
                <div class="icon">
                    <i class="fas fa-arrow-down"></i>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>{{ $outgoing }}</h3>
                    <p>Keping Keluar</p>
                </div>
                <div class="icon">
                    <i class="fas fa-arrow-up"></i>
                </div>
            </div>
        </div>

    </div>

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Stok Masuk per Bulan</h3>
        </div>

        <div class="card-body">
            <canvas id="incomingChart"></canvas>
        </div>
    </div>

@stop

@section('js')

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>

new Chart(document.getElementById('incomingChart'),{

    type:'line',

    data:{
        labels:['Jan','Feb','Mar','Apr','Mei','Jun'],

        datasets:[{
            label:'Keping Masuk',
            data:[120,95,180,160,210,190],
            borderWidth:2,
            fill:false
        }]
    }

});

</script>

@stop