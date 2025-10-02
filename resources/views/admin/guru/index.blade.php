@extends('layouts.master')

@section('title', 'Data Guru')

@section('content')
<div class="container">
    <h2>Data Guru</h2>

    <!-- Alert sukses -->
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <!-- Tombol tambah -->
    <a href="{{ route('admin.guru.create') }}" class="btn btn-primary mb-3">+ Tambah Guru</a>

    <!-- Tabel data guru -->
    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Email</th>
                <th>NIP</th>
                <th>Mata Pelajaran</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($gurus as $index => $guru)
                <tr>
                    <td>{{ $index+1 }}</td>
                    <td>{{ $guru->nama }}</td>
                    <td>{{ $guru->email }}</td>
                    <td>{{ $guru->nip }}</td>
                    <td>{{ $guru->mapel }}</td>
                    <td>
                        <a href="{{ route('admin.guru.edit', $guru->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('admin.guru.destroy', $guru->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin hapus data ini?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center">Belum ada data guru.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection