@extends('layouts.appadmin')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Edit Kategori</h3>
    </div>
    <div class="card-body">
        <form action="{{ route('kategori.update', $kategori->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="row">
                <!-- Kolom Kiri -->
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="namaakategori">Nama Kategori</label>
                        <input type="text" name="namaakategori" id="namaakategori" class="form-control" value="{{ $kategori->namaakategori }}" required>
                    </div>

                    <div class="form-group">
                        <label for="status">Status</label>
                        <select name="status" id="status" class="form-control">
                            <option value="pending" {{ $kategori->status == 'pending' ? 'selected' : '' }}>Pending</option>
                            <option value="setujui" {{ $kategori->status == 'setujui' ? 'selected' : '' }}>Disetujui</option>
                            <option value="tolak" {{ $kategori->status == 'tolak' ? 'selected' : '' }}>Ditolak</option>
                        </select>
                    </div>

                    <!-- Optional: Tampilkan created_at dan updated_at sebagai info -->
                    <div class="form-group">
                        <label>Created At</label>
                        <input type="text" class="form-control" value="{{ $kategori->created_at }}" readonly>
                    </div>

                    <div class="form-group">
                        <label>Updated At</label>
                        <input type="text" class="form-control" value="{{ $kategori->updated_at }}" readonly>
                    </div>
                </div>

                <!-- Kolom Kanan: Upload dan Preview Foto -->
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="foto">Foto</label>
                        <input type="file" name="foto" id="foto" class="form-control-file">

                        @if ($kategori->foto)
                            <div class="mt-3">
                                <img src="{{ asset('storage/' . $kategori->foto) }}" alt="Foto kategori" class="img-thumbnail" width="150">
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Tombol Submit -->
            <div class="form-group mt-4 text-right">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> Update
                </button>
                <a href="{{ route('kategori.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Kembali
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
