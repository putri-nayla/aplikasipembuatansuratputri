@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Surat</h1>

    <form action="{{ route('penerima.update', $surat->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Nama</label>
            <input type="text" name="nama" class="form-control" value="{{ old('nama', $surat->nama) }}" required>
        </div>

        <div class="mb-3">
            <label>Judul</label>
            <input type="text" name="judul" class="form-control" value="{{ old('judul', $surat->judul) }}" required>
        </div>

        <div class="mb-3">
            <label>Tanggal Diterima</label>
            <input type="date" name="tanggal_diterima" class="form-control" value="{{ old('tanggal_diterima', $surat->tanggal_diterima) }}" required>
        </div>

        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ route('penerima.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
