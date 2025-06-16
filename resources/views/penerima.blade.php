<!DOCTYPE html>
<html>
<head>
    <title>Daftar Surat Penerima</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 2rem;
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
    </style>
</head>
<body>
    <h1>Daftar Surat Penerima</h1>

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
                </tr>
            </thead>
            <tbody>
                @foreach ($surats as $index => $surat)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $surat->nama ?? '-' }}</td>
                        <td>{{ $surat->judul ?? '-' }}</td>
                        <td>{{ $surat->tanggal_diterima ?? '-' }}</td>
                    </tr>
                    {{ \Carbon\Carbon::parse($surat->tanggal_diterima)->format('d M Y') }}

                @endforeach
            </tbody>
        </table>
    @endif

</body>
</html>
