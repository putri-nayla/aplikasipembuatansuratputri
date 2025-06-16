<!DOCTYPE html>
<html>
<head>
    <title>Detail Surat</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 2rem;
        }
        .container {
            max-width: 600px;
        }
        h1 {
            margin-bottom: 1rem;
        }
        .field {
            margin-bottom: 1rem;
        }
        .label {
            font-weight: bold;
        }
        a.btn {
            display: inline-block;
            padding: 0.5rem 1rem;
            background-color: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 4px;
        }
        a.btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Detail Surat</h1>

        <div class="field">
            <div class="label">Nama Penerima:</div>
            <div>{{ $surat->nama }}</div>
        </div>

        <div class="field">
            <div class="label">Judul Surat:</div>
            <div>{{ $surat->judul }}</div>
        </div>

        <div class="field">
            <div class="label">Tanggal Diterima:</div>
            <div>{{ \Carbon\Carbon::parse($surat->tanggal_diterima)->format('d M Y') }}</div>
        </div>

        <a href="{{ route('penerima.index') }}" class="btn">← Kembali ke Daftar</a>
    </div>
</body>
</html>
