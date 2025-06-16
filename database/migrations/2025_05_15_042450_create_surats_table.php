<!DOCTYPE html>
<html>
<head>
    <title>Daftar Surat Penerima</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 2rem;
        }
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .btn {
            padding: 0.5rem 1rem;
            text-decoration: none;
            border: none;
            border-radius: 4px;
            background-color: #007bff;
            color: white;
            font-size: 14px;
        }
        .btn:hover {
            background-color: #0056b3;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 1rem;
        }
        th, td {
            border: 1px solid #ccc;
            padding: 0.75rem;
            text-align: left;
        }
        th {
            background-color: #f5f5f5;
        }
        .action-buttons a {
            margin-right: 8px;
            text-decoration: none;
            color: #007bff;
        }
        .action-buttons a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Daftar Surat Penerima</h1>
        <a href="{{ route('penerima.create') }}" class="btn">+ Tambah Surat</a>
    </div>

    @if($surats->isEmpty())
        <p>Tidak ada data surat.</p>
    @else
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Penerima</th>
                    <th>Judul Surat</th>
                    <th>Tanggal Diterima</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($surats as $index => $surat)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $surat->nama ?? '-' }}</td>
                        <td>{{ $surat->judul ?? '-' }}</td>
                        <td>{{ \Carbon\Carbon::parse($surat->tanggal_diterima)->format('d M Y') }}</td>
                        <td class="action-buttons">
                            <a href="{{ route('penerima.show', $surat->id) }}">Detail</a>
                            <a href="{{ route('penerima.edit', $surat->id) }}">Edit</a>
                            <form action="{{ route('penerima.destroy', $surat->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn" style="background-color:#dc3545;" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif

</body>
</html>
