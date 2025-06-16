@extends('layouts.appadmin')

@section('title', 'Manajemen Kategori')

@section('content')
<div class="card">
    <div class="card-header" style="background-color:rgb(207, 233, 38); color: white; font-weight: bold;">
        <h3 class="card-title">Manajemen Kategori</h3>
        <div class="card-tools">
            <a href="{{ route('kategori.create') }}" class="btn btn-primary btn-sm">
                <i class="fas fa-plus"></i> Tambah Kategori
            </a>
        </div>
    </div>
    <div class="card-body">
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Kategori</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($kategoris as $index => $kategori)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $kategori->kategori }}</td> {{-- Ganti ke nama kolom sesuai database --}}
                    <td>
                        <a href="{{ route('kategori.show', $kategori->id) }}" class="btn btn-info btn-sm">
                            <i class="fas fa-eye"></i>
                        </a>
                        <a href="{{ route('kategori.edit', $kategori->id) }}" class="btn btn-warning btn-sm">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form id="delete-form-{{ $kategori->id }}" action="{{ route('kategori.destroy', $kategori->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="button" class="btn btn-danger btn-sm delete-btn" data-id="{{ $kategori->id }}">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

@section('js')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        document.querySelectorAll('.delete-btn').forEach(function (btn) {
            btn.addEventListener('click', function () {
                let id = this.getAttribute('data-id');
                if (confirm("Yakin ingin menghapus kategori ini?")) {
                    document.getElementById('delete-form-' + id).submit();
                }
            });
        });
    });
</script>
@endsection
