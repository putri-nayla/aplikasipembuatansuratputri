@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Daftar Surat Penerima</h1>
    <a href="{{ route('penerima.create') }}" class="btn btn-primary mb-3">+ Tambah Surat</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($surats->isEmpty())
        <p>Tidak ada data surat.</p>
    @else
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Judul</th>
                <th>Tanggal Diterima</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($surats as $index => $surat)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $surat->nama }}</td>
                <td>{{ $surat->judul }}</td>
                <td>{{ $surat->tanggal_diterima }}</td>
                <td>
                    <a href="{{ route('penerima.edit', $surat->id) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('penerima.destroy', $surat->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus surat ini?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endif
</div>
@endsection
