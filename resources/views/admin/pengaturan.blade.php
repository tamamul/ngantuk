@extends('layouts.master')

@section('title', 'Pengaturan Absensi')

@section('content')
<div class="page-inner">
    <div class="page-header">
        <h4 class="page-title">Pengaturan Absensi</h4>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Lokasi Kantor & Radius</h4>
        </div>
        <div class="card-body">
            <form action="{{ url('/pengaturan') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="lat_kantor">Latitude Kantor</label>
                    <input type="text" name="lat_kantor" class="form-control" 
                           value="{{ old('lat_kantor', $pengaturan->lat_kantor ?? '') }}" required>
                </div>
                <div class="form-group">
                    <label for="lng_kantor">Longitude Kantor</label>
                    <input type="text" name="lng_kantor" class="form-control" 
                           value="{{ old('lng_kantor', $pengaturan->lng_kantor ?? '') }}" required>
                </div>
                <div class="form-group">
                    <label for="radius">Radius (meter)</label>
                    <input type="number" name="radius" class="form-control" 
                           value="{{ old('radius', $pengaturan->radius ?? 100) }}" min="10" required>
                </div>

                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
</div>
@endsection