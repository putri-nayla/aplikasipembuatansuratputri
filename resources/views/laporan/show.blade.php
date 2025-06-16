@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detail Laporan</h1>
    <div class="mb-3">
        <strong>Judul:</strong> {{ $laporan->judul }}
    </div>
    <div class="mb-3">
        <strong>Tanggal:</strong> {{ $laporan->tanggal }}
    </div>
    <div class="mb-3">
        <strong>Isi:</strong>
        <p>{{ $laporan->isi }}</p>
    </div>
    <a href="{{ route('laporan.index') }}" class="btn btn-secondary">Kembali</a>
</div>
@endsection
