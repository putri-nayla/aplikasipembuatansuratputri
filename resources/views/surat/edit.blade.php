@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Surat</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                   <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('surat.update', $surat->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nomor_surat" class="form-label">Nomor Surat</label>
            <input type="text" class="form-control" id="nomor_surat" name="nomor_surat" value="{{ old('nomor_surat', $surat->nomor_surat) }}" required>
        </div>

        <div class="mb-3">
            <label for="tanggal_surat" class="form-label">Tanggal Surat</label>
            <input type="date" class="form-control" id="tanggal_surat" name="tanggal_surat" value="{{ old('tanggal_surat', $surat->tanggal_surat) }}" required>
        </div>

        <div class="mb-3">
            <label for="pengirim" class="form-label">Pengirim</label>
            <input type="text" class="form-control" id="pengirim" name="pengirim" value="{{ old('pengirim', $surat->pengirim) }}" required>
        </div>

        <div class="mb-3">
            <label for="penerima" class="form-label">Penerima</label>
            <input type="text" class="form-control" id="penerima" name="penerima" value="{{ old('penerima', $surat->penerima) }}" required>
        </div>

        <div class="mb-3">
            <label for="perihal" class="form-label">Perihal</label>
            <input type="text" class="form-control" id="perihal" name="perihal" value="{{ old('perihal', $surat->perihal) }}" required>
        </div>

        <div class="mb-3">
            <label for="isi_surat" class="form-label">Isi Surat</label>
            <textarea class="form-control" id="isi_surat" name="isi_surat" rows="4" required>{{ old('isi_surat', $surat->isi_surat) }}</textarea>
        </div>

        <div class="mb-3">
            <label for="file_surat" class="form-label">Ganti File Surat (opsional)</label>
            <input type="file" class="form-control" id="file_surat" name="file_surat" accept=".pdf,.doc,.docx,.jpg,.png">
            @if ($surat->file_surat)
                <p class="mt-2">File saat ini: <a href="{{ asset('storage/surat/' . $surat->file_surat) }}" target="_blank">{{ $surat->file_surat }}</a></p>
            @endif
        </div>

        <button type="submit" class="btn btn-primary">Update Surat</button>
        <a href="{{ route('surat.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
