@extends('adminlte::page')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <p>Selamat datang, {{ auth()->user()->name }}!</p>
@stop