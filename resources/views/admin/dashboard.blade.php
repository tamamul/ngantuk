@extends('layouts.master')

@section('title', 'Dashboard Admin')

@section('content')
<div class="container mt-4">
    <h2>Dashboard Admin</h2>
    <p>Tanggal: {{ $tanggal }}</p>

    <div class="row">
        <div class="col-md-3">
            <div class="card text-bg-primary mb-3">
                <div class="card-body">
                    <h5 class="card-title">Total Guru</h5>
                    <p class="card-text fs-3">{{ $totalGuru }}</p>
                </div>
            </div>
        </div>
        
        <div class="col-md-3">
            <div class="card text-bg-success mb-3">
                <div class="card-body">
                    <h5 class="card-title">Hadir</h5>
                    <p class="card-text fs-3">{{ $hadir }}</p>
                </div>
            </div>
        </div>
        
        <div class="col-md-3">
            <div class="card text-bg-warning mb-3">
                <div class="card-body">
                    <h5 class="card-title">Izin</h5>
                    <p class="card-text fs-3">{{ $izin }}</p>
                </div>
            </div>
        </div>
        
        <div class="col-md-3">
            <div class="card text-bg-danger mb-3">
                <div class="card-body">
                    <h5 class="card-title">Alpha</h5>
                    <p class="card-text fs-3">{{ $alpha }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection