<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Laporan PDF</title>
    <style>
        body { font-family: sans-serif; font-size: 14px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        table, th, td { border: 1px solid #000; padding: 8px; }
        th { background-color: #eee; }
    </style>
</head>
<body>

    <h2>Laporan Data</h2>

    <table>
        <thead>
            <tr>
                <th>Judul</th>
                <th>Isi</th>
                <th>Tanggal</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $laporan)
                <tr>
                    <td>{{ $laporan->judul }}</td>
                    <td>{{ $laporan->isi }}</td>
                    <td>{{ $laporan->tanggal }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>
