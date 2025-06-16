@extends('layouts.appkategori')

@section('title', 'Tambah Kategori')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Tambah Kategori</h3>
    </div>
    <div class="card-body">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="{{ route('kategori.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="row">
                <div class="col-md-6">
                    <!-- Nama Kategori -->
                    <div class="form-group">
                        <label for="kategori">Kategori</label>
                        <input type="text" name="kategori" id="kategori" class="form-control" required value="{{ old('kategori') }}">
                    </div>

                    <!-- Created At (opsional) -->
                    <div class="form-group">
                        <label for="created_at">Created At</label>
                        <input type="datetime-local" name="created_at" id="created_at" class="form-control" value="{{ old('created_at') }}">
                    </div>

                    <!-- Status -->
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select name="status" id="status" class="form-control">
                            <option value="pending" {{ old('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                            <option value="setujui" {{ old('status') == 'setujui' ? 'selected' : '' }}>Disetujui</option>
                            <option value="tolak" {{ old('status') == 'tolak' ? 'selected' : '' }}>Ditolak</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="form-group mt-3 text-right">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> Simpan
                </button>
                <a href="{{ route('kategori.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Kembali
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
