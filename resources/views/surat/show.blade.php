@extends('layouts.appadmin')

@section('title', 'Detail surat')

@section('content_header')
<h1>Detail surat</h1>
@endsection

@section('content')
<div class="card shadow-lg border-0">
    <div class="card-header bg-primary text-white d-flex align-items-center">
        <i class="fas fa-user-circle me-2"></i>
        <h3 class="card-title mb-0">Informasi surat</h3>
    </div>
    <div class="card-body">
        <div class="row">
            <!-- Kolom Foto di sebelah kiri -->
            <div class="col-md-5 text-center">
                <strong>Foto:</strong><br>
                <img src="{{ $surat->foto ? asset('storage/' . $surat->foto) : asset('img/default-profile.png') }}"
                    class="img-thumbnail rounded-circle shadow" width="300" height="300" alt="Foto surat">
                <h5 class="mt-3">{{ $surat->surat }}</h5>

            <div class="col-md-3">
                <h2>Aksi</h2>
            </div>

        </div>
    </div>

    <div class="card-footer text-center">
        <a href="{{ route('surat.index') }}" class="btn btn-danger">
            <i class="fas fa-arrow-left"></i> Kembali ke Daftar Admin
        </a>
    </div>
</div>
@endsection