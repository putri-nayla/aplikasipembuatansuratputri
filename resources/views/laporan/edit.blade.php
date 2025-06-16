@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Laporan</h1>
    <form action="{{ route('laporan.update', $laporan->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label>Judul</label>
            <input type="text" name="judul" class="form-control" value="{{ $laporan->judul }}" required>
        </div>
        <div class="mb-3">
            <label>Isi</label>
            <textarea name="isi" class="form-control" required>{{ $laporan->isi }}</textarea>
        </div>
        <div class="mb-3">
            <label>Tanggal</label>
            <input type="date" name="tanggal" class="form-control" value="{{ $laporan->tanggal }}" required>
        </div>
        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ route('laporan.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
