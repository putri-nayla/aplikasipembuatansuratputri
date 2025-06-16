@extends('layouts.appkategori')

@section('title', 'Detail kategori')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">Detail kategori</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <!-- Kolom Kiri (Foto Profil) -->
                        <div class="col-md-4 text-center">
                            <img src="{{ $kategori->foto ? asset('storage/' . $kategori->foto) : asset('img/default-profile.png') }}" 
                                 class="img-thumbnail rounded-circle shadow" width="150" alt="Foto kategori">
                        </div>

                        <!-- Kolom Kanan (Detail Admin) -->
                        <div class="col-md-8">
                            <table class="table table-borderless">
                                <tr>
                                    <th>Namaakategori</th>
                                    <td>: {{ $kategori->namaakategori }}</td>
                                </tr>
                                <tr>
                                    <th>Username</th>
                                    <td>: {{ $kategori->username }}</td>
                                </tr>
                                <tr>
                                    <th>Role</th>
                                    <td>: {{ ucfirst($kategori->role) }}</td>
                                </tr>
                                <tr>
                                    <th>Status</th>
                                    <td>: 
                                        @if($kategori->status == 'setujui')
                                            <span class="badge bg-success">Disetujui</span>
                                        @elseif($kategori->status == 'pending')
                                            <span class="badge bg-warning">Pending</span>
                                        @else
                                            <span class="badge bg-danger">Ditolak</span>
                                        @endif
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="card-footer text-end">
                    <a href="{{ route('kategori.index') }}" class="btn btn-secondary">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
