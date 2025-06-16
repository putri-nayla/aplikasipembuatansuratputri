@extends('layouts.appadmin')

@section('title', 'Tambah Admin')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Tambah Admin</h3>
    </div>
    <div class="card-body">
        @if ($errors->has('username'))
        <div class="alert alert-danger">
            <strong>Error!</strong> Username sudah terdaftar.
        </div>
        @endif

        <form action="{{ route('admin.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="row">
                <div class="col-md-6">
                    <!-- Nama Admin -->
                    <div class="form-group">
                        <label for="namaadmin">Nama</label>
                        <input type="text" name="namaadmin" id="namaadmin" class="form-control" required>
                    </div>

                    <!-- Username -->
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" name="username" id="username" class="form-control" required>
                    </div>

                    <!-- Password -->
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="password_confirmation">Konfirmasi Password</label>
                        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required>
                    </div>
                </div>

                <div class="col-md-6">
                    <!-- Foto -->
                    <div class="form-group">
                        <label for="foto">Foto</label>
                        <input type="file" name="foto" id="foto" class="form-control-file">
                    </div>

                    <!-- Status -->
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select name="status" id="status" class="form-control">
                            <option value="pending" selected>Pending</option>
                            <option value="setujui">Disetujui</option>
                            <option value="tolak">Ditolak</option>
                        </select>
                    </div>

                    <!-- Role -->
                    <div class="form-group">
                        <label for="role">Role</label>
                        <select name="role" id="role" class="form-control">
                            <option value="admin">Admin</option>
                            <option value="petugas" selected>Petugas</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="form-group mt-3 text-right">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> Simpan
                </button>
                <a href="{{ route('admin.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Kembali
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
