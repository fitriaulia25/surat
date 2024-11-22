<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Dokumen</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f9f9f9;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h1 {
            font-size: 24px;
            text-align: center;
            margin-bottom: 20px;
        }

        .success-message {
            color: green;
            font-size: 16px;
            margin-bottom: 20px;
            text-align: center;
        }

        ul {
            list-style-type: none;
            padding: 0;
        }

        ul li {
            margin-bottom: 10px;
            font-size: 16px;
        }

        ul li strong {
            display: inline-block;
            width: 150px;
        }

        a {
            display: inline-block;
            margin-top: 20px;
            font-size: 16px;
            color: #007BFF;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        @if(session('success'))
            <div class="success-message">
                {{ session('success') }}
            </div>
        @endif

        <h1>Detail Dokumen</h1>
        <ul>
            <li><strong>Indeks:</strong> {{ $document->indeks }}</li>
            <li><strong>Kode:</strong> {{ $document->kode }}</li>
            <li><strong>Tanggal:</strong> {{ $document->tanggal }}</li>
            <li><strong>No. Urut:</strong> {{ $document->no_urut }}</li>
            <li><strong>Isi Ringkas:</strong> {{ $document->isi_ringkas }}</li>
            <li><strong>Lampiran:</strong> {{ $document->lampiran }}</li>
            <li><strong>Dari:</strong> {{ $document->dari }}</li>
            <li><strong>Kepada:</strong> {{ $document->kepada }}</li>
            <li><strong>Tanggal Surat:</strong> {{ $document->tanggal_surat }}</li>
            <li><strong>No. Surat:</strong> {{ $document->no_surat }}</li>
            <li><strong>Pengolahan:</strong> {{ $document->pengolahan }}</li>
            <li><strong>Catatan:</strong> {{ $document->catatan }}</li>
            <li><strong>Link Surat:</strong> 
                <a href="{{ $document->link_surat }}" target="_blank">{{ $document->link_surat }}</a>
            </li>
        </ul>
        <a href="{{ route('documents.index') }}">Kembali ke Daftar Dokumen</a>
    </div>
</body>
</html>
