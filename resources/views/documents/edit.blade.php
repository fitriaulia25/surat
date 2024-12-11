<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Surat</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 20px;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #333;
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        label {
            font-weight: bold;
        }

        input[type="text"], input[type="date"], input[type="number"], textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        button {
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-align: center;
        }

        button:hover {
            background-color: #0056b3;
        }

        .btn-cancel {
            background-color: #dc3545;
            text-decoration: none;
            padding: 10px 20px;
            color: #fff;
            border-radius: 4px;
            text-align: center;
            display: inline-block;
        }

        .btn-cancel:hover {
            background-color: #a71d2a;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Edit Surat</h1>

        <!-- Form Edit Surat -->
        <form action="{{ isset($document) ? route('documents.update', $document->id) : route('documents.store') }}" method="POST">
            @csrf
            @if(isset($document))
                @method('PUT')
            @endif

            <div class="form-group">
                <label>No. Urut:</label>
                <input type="text" name="no_urut" value="{{ old('no_urut', $document->no_urut ?? '') }}" required>
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
                <input type="text" name="dari" value="{{ old('dari', $document->dari ?? '') }}" required>
            </div>

            <div class="form-group">
                <label>Kepada:</label>
                <input type="text" name="kepada" value="{{ old('kepada', $document->kepada ?? '') }}" required>
            </div>

            <div class="form-group">
                <label>Tanggal Surat:</label>
                <input type="date" name="tanggal_surat" value="{{ old('tanggal_surat', $document->tanggal_surat ?? '') }}">
            </div>

            <div class="form-group">
                <label>Indeks:</label>
                <input type="text" name="indeks" value="{{ old('indeks', $document->indeks ?? '') }}" required>
            </div>

            <div class="form-group">
                <label>Kode:</label>
                <input type="text" name="kode" value="{{ old('kode', $document->kode ?? '') }}">
            </div>

            <div class="form-group">
                <label>No. Surat:</label>
                <input type="text" name="no_surat" value="{{ old('no_surat', $document->no_surat ?? '') }}">
            </div>

            <div class="form-group">
                <label>Pengolahan:</label>
                <input type="text" name="pengolahan" value="{{ old('pengolahan', $document->pengolahan ?? '') }}">
            </div>

            <div class="form-group">
                <label>Isi Ringkas:</label>
                <textarea name="isi_ringkas">{{ old('isi_ringkas', $document->isi_ringkas ?? '') }}</textarea>
            </div>

            <div class="form-group">
                <label>Catatan:</label>
                <textarea name="catatan">{{ old('catatan', $document->catatan ?? '') }}</textarea>
            </div>

            <div class="form-group">
                <label>Link Surat:</label>
                <input type="url" name="link_surat" id="link_surat" value="{{ old('link_surat', $document->link_surat ?? '') }}">
            </div>

            <div class="form-group">
                <button type="submit">{{ isset($document) ? 'Update Dokumen' : 'Simpan Dokumen' }}</button>
            </div>
        </form>
    </div>
</body>
</html>
