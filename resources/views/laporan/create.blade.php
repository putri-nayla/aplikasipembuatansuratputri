<form action="{{ route('laporan.store') }}" method="POST">
    @csrf

    <div>
        <label>Judul</label>
        <input type="text" name="judul" class="form-control" required>
    </div>

    <div>
        <label>Isi</label>
        <textarea name="isi" class="form-control" required></textarea>
    </div>

    <div>
        <label>Tanggal</label>
        <input type="date" name="tanggal_diterima" class="form-control" required>
    </div>

    <button type="submit" class="btn btn-primary">Simpan</button>
    <a href="{{ route('laporan.index') }}" class="btn btn-secondary">Kembali</a>
</form>
