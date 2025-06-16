@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Daftar Laporan</h1>

    {{-- Form Filter --}}
    <form method="GET" action="{{ route('laporan.index') }}" class="row g-3 mb-4">
        <div class="col-md-4">
            <label>Dari Tanggal</label>
            <input type="date" name="dari" class="form-control" value="{{ request('dari') }}">
        </div>
        <div class="col-md-4">
            <label>Sampai Tanggal</label>
            <input type="date" name="sampai" class="form-control" value="{{ request('sampai') }}">
        </div>
        <div class="col-md-4 d-flex align-items-end">
            <button type="submit" class="btn btn-secondary me-2">Filter</button>
            <a href="{{ route('laporan.index') }}" class="btn btn-outline-dark me-2">Reset</a>
            <a href="{{ url('/laporan/cetak') }}?dari={{ request('dari') }}&sampai={{ request('sampai') }}" class="btn btn-outline-success">Cetak PDF</a>
        </div>
    </form>

    {{-- Tombol Tambah --}}
    <div class="mb-3">
        <a href="{{ route('laporan.create') }}" class="btn btn-primary">Tambah Laporan</a>
    </div>

    {{-- Pesan Sukses --}}
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    {{-- Tabel Data --}}
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Judul</th>
                <th>Tanggal</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($laporans as $laporan)
            <tr>
                <td>{{ $laporan->judul }}</td>
                <td>{{ $laporan->tanggal }}</td>
                <td>
                    <a href="{{ route('laporan.show', $laporan->id) }}" class="btn btn-info btn-sm">Lihat</a>
                    <a href="{{ route('laporan.edit', $laporan->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('laporan.destroy', $laporan->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus laporan ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
