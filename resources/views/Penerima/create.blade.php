@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1>Tambah Surat Penerima</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops! Ada masalah dengan input:</strong>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('penerima.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input 
                type="text" 
                name="nama" 
                class="form-control @error('nama') is-invalid @enderror" 
                value="{{ old('nama') }}" 
                required
            >
            @error('nama')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Kalau kolom judul sudah ada di database, aktifkan ini --}}
        {{-- 
        <div class="mb-3">
            <label for="judul" class="form-label">Judul</label>
            <input 
                type="text" 
                name="judul" 
                class="form-control @error('judul') is-invalid @enderror" 
                value="{{ old('judul') }}" 
                required
            >
            @error('judul')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        --}}

        <div class="mb-3">
            <label for="tanggal_diterima" class="form-label">Tanggal Diterima</label>
            <input 
                type="date" 
                name="tanggal_diterima" 
                class="form-control @error('tanggal_diterima') is-invalid @enderror" 
                value="{{ old('tanggal_diterima') }}" 
                required
            >
            @error('tanggal_diterima')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('penerima.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
