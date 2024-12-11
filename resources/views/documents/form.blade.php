<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Dokumen</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 80%;
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }
        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin: 10px 0 5px;
            font-weight: bold;
            color: #555;
        }
        input[type="text"],
        input[type="date"],
        input[type="url"],
        textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 14px;
        }
        textarea {
            resize: vertical;
            height: 100px;
        }
        button {
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
        }
        button:hover {
            background-color: #45a049;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group:last-child {
            margin-bottom: 0;
        }
        a {
            display: block;
            text-align: center;
            margin-top: 20px;
            color: #007bff;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>{{ isset($document) ? 'Edit Dokumen' : 'Tambah Dokumen' }}</h1>
        <form action="{{ isset($document) ? route('documents.update', $document->id) : route('documents.store') }}" method="POST">
            @csrf
            @if(isset($document))
                @method('PUT')
            @endif
            
            <div class="form-group">
                <label>No. Urut:</label>
                <input type="text" name="no_urut" value="{{ old('no_urut', $nextUrut ?? '') }}" readonly>
            </div>
            <div class="form-group">
                <label>Tanggal:</label>
                <input type="date" name="tanggal" value="{{ old('tanggal', $document->tanggal ?? '') }}">
            </div>
            <div class="form-group">
                <label>Lampiran:</label>
                <input type="text" name="lampiran" value="{{ old('lampiran', $document->lampiran ?? '') }}">
            </div>
            <div class="form-group">
                <label>Dari:</label>
                <input type="text" name="dari" value="{{ old('dari', $document->dari ?? '') }}">
            </div>
            <div class="form-group">
                <label>Kepada:</label>
                <input type="text" name="kepada" value="{{ old('kepada', $document->kepada ?? '') }}">
            </div>
            <div class="form-group">
                <label>Tanggal Surat:</label>
                <input type="date" name="tanggal_surat" value="{{ old('tanggal_surat', $document->tanggal_surat ?? '') }}">
            </div>
            <div class="form-group">
                <label>Indeks:</label>
                <input type="text" name="indeks" value="{{ old('indeks', $document->indeks ?? '') }}">
            </div>
            <div class="form-group">
                <label>Kode:</label>
                <input type="text" name="kode" value="{{ old('kode', $document->kode ?? '') }}">
            </div>
            <div class="form-group">
                <label>No. Surat:</label>
                <input type="text" name="no_surat" value="{{ old('no_surat', $nextSurat ?? '') }}" readonly>
            </div>
            <div class="form-group">
                <label>Pengolahan:</label>
                <input type="text" name="pengolahan" value="{{ old('pengolahan', $document->pengolahan ?? '') }}">
            </div>
            <div class="form-group">
                <label>Isi Ringkasan:</label>
                <textarea name="isi_ringkas">{{ old('isi_ringkas', $document->isi_ringkas ?? '') }}</textarea>
            </div>
            <div class="form-group">
                <label>Catatan:</label>
                <textarea name="catatan">{{ old('catatan', $document->catatan ?? '') }}</textarea>
            </div>
            <div class="form-group">
                <label>Link Surat:</label>
                <input type="url" name="link_surat" id="link_surat" value="{{ old('link_surat', $document->link_surat ?? '') }}">            </div>
            <button type="submit">{{ isset($document) ? 'Update' : 'Simpan' }}</button>
        </form>
        <a href="{{ route('documents.index') }}">Kembali ke Daftar Dokumen</a>
    </div>
</body>
</html>
