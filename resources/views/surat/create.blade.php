<!-- resources/views/surat/create.blade.php -->
<form action="{{ route('surat.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <label for="judul">Judul Surat</label>
    <input type="text" name="judul" id="judul" required>
    <label for="file">File Surat (PDF)</label>
    <input type="file" name="file" id="file" accept="application/pdf" required>
    <button type="submit">Unggah</button>
</form>
