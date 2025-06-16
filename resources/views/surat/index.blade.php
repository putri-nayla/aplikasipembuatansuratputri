@extends('layouts.appadmin')

@section('title', 'Manajemen Surat')

@section('content')
<div class="card">
    <div class="card-header" style="background-color:rgb(134, 123, 135); color: white; font-weight: bold;">
        <h3 class="card-title">Manajemen Surat</h3>
        <div class="card-tools">
            <a href="{{ route('surat.create') }}" class="btn btn-primary btn-sm">
                <i class="fas fa-plus"></i> Tambah Surat
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
                    <th>Judul Surat</th>
                    <th>Tanggal</th>
                    <th>File</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($surats as $surat)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $surat->judul }}</td>
                        <td>{{ \Carbon\Carbon::parse($surat->tanggal)->format('d-m-Y') }}</td>
                    
                        <td>
                            <a href="{{ asset('storage/' . $surat->file) }}" target="_blank" class="btn btn-sm btn-info">
                                Lihat
                            </a>
                        </td>
                        <td>
                            <a href="{{ route('surat.edit', $surat->id) }}" class="btn btn-sm btn-warning">Edit</a>

                            <form action="{{ route('surat.destroy', $surat->id) }}" method="POST" style="display: inline;" id="delete-form-{{ $surat->id }}">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="btn btn-sm btn-danger delete-btn" data-id="{{ $surat->id }}">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center">Tidak ada data surat.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection

@section('js')
<script>
    $(document).ready(function () {
        $('.delete-btn').click(function () {
            let id = $(this).data('id');
            if (confirm("Yakin ingin menghapus surat ini?")) {
                document.getElementById('delete-form-' + id).submit();
            }
        });
    });
</script>
@endsection
