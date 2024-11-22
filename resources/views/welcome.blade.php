<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Surat</title>
    <style>
        /* Styling CSS tetap sama */
        body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    background-color: #f9f9f9;
}

.form-container {
    width: 700px;
    padding: 20px;
    background-color: #fff;
    border: 1px solid #ddd;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.form-header {
    text-align: center;
    margin-bottom: 20px;
}

.form-header h1 {
    font-size: 18px;
    font-weight: bold;
    margin: 0;
    text-transform: uppercase;
    color: #333;
}

.form-header p {
    font-size: 14px;
    color: #666;
    margin: 5px 0 15px;
    line-height: 1.5;
}

hr {
    border: none;
    border-top: 1px solid #ddd;
    margin-bottom: 20px;
}

.form-group {
    display: flex;
    margin-bottom: 15px;
    align-items: center;
}

.form-group label {
    width: 180px;
    font-size: 14px;
    color: #333;
    margin-right: 10px;
}

.form-group input,
.form-group textarea {
    flex: 1;
    padding: 8px;
    font-size: 14px;
    border: 1px solid #ccc;
    border-radius: 4px;
    background-color: #f9f9f9;
}

.form-group input:focus,
.form-group textarea:focus {
    border-color: #007BFF;
    outline: none;
    background-color: #fff;
}

.form-group textarea {
    height: 70px;
    resize: vertical;
}

.form-group:last-child {
    justify-content: flex-end;
}

.form-group button {
    padding: 10px 20px;
    font-size: 14px;
    color: #fff;
    background-color: #007BFF;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.form-group button:hover {
    background-color: #0056b3;
}

.form-footer {
    margin-top: 20px;
    text-align: right;
}

.form-footer a {
    font-size: 14px;
    color: #007BFF;
    text-decoration: none;
    transition: color 0.3s ease;
}

.form-footer a:hover {
    color: #0056b3;
    text-decoration: underline;
}

.error-message {
    font-size: 12px;
    color: red;
    margin-top: 5px;
}

    </style>
</head>
<body>
    <div class="form-container">
    <div class="form-header">
    <h1><strong>Kementerian Hukum dan HAM RI</strong></h1>
    <p>
        <strong>Kantor Wilayah Jawa Barat</strong><br>
        <strong>Lembaga Pemasyarakatan Kelas II B Garut</strong><br>
        Jalan K.H Hasan Arief Tel. (0262) 540651-Garut
    </p>
</div>
        <hr>
        <form action="{{ isset($document) ? route('documents.update', $document->id) : route('documents.store') }}" method="POST">
            @csrf
            @if(isset($document))
                @method('PUT')
            @endif

            <div class="form-group">
                <label>Indeks:</label>
                <input type="text" name="indeks" value="{{ old('indeks', $document->indeks ?? '') }}" required>
                @error('indeks')
                    <div style="color: red;">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label>Kode:</label>
                <input type="text" name="kode" value="{{ old('kode', $document->kode ?? '') }}">
                @error('kode')
                    <div style="color: red;">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label>Tanggal:</label>
                <input type="date" name="tanggal" value="{{ old('tanggal', $document->tanggal ?? '') }}">
                @error('tanggal')
                    <div style="color: red;">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label>No. Urut:</label>
                <input type="text" name="no_urut" value="{{ old('no_urut', $document->no_urut ?? '') }}">
                @error('no_urut')
                    <div style="color: red;">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label>Isi Ringkas:</label>
                <textarea name="isi_ringkas" required>{{ old('isi_ringkas', $document->isi_ringkas ?? '') }}</textarea>
                @error('isi_ringkas')
                    <div style="color: red;">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
    <label>Lampiran:</label>
    <input type="text" name="lampiran" value="{{ old('lampiran', $document->lampiran ?? '') }}">
    @error('lampiran')
        <div style="color: red;">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <label>Dari:</label>
    <input type="text" name="dari" value="{{ old('dari', $document->dari ?? '') }}" required>
    @error('dari')
        <div style="color: red;">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <label>Kepada:</label>
    <input type="text" name="kepada" value="{{ old('kepada', $document->kepada ?? '') }}" required>
    @error('kepada')
        <div style="color: red;">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <label>Tanggal Surat:</label>
    <input type="date" name="tanggal_surat" value="{{ old('tanggal_surat', $document->tanggal_surat ?? '') }}">
    @error('tanggal_surat')
        <div style="color: red;">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <label>No. Surat:</label>
    <input type="text" name="no_surat" value="{{ old('no_surat', $document->no_surat ?? '') }}">
    @error('no_surat')
        <div style="color: red;">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <label>Pengolahan:</label>
    <input type="text" name="pengolahan" value="{{ old('pengolahan', $document->pengolahan ?? '') }}">
    @error('pengolahan')
        <div style="color: red;">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <label>Catatan:</label>
    <textarea name="catatan">{{ old('catatan', $document->catatan ?? '') }}</textarea>
    @error('catatan')
        <div style="color: red;">{{ $message }}</div>
    @enderror
</div>
<div class="form-group">
    <label>Link Surat:</label>
    <input type="url" name="link_surat" placeholder="Masukkan URL surat" value="{{ old('link_surat', $document->link_surat ?? '') }}">
    @error('link_surat')
        <div style="color: red;">{{ $message }}</div>
    @enderror
</div>
            <div class="form-group">
                <button type="submit">{{ isset($document) ? 'Update Dokumen' : 'Simpan Dokumen' }}</button>
            </div>
        </form>
    </div>
</body>
</html>
