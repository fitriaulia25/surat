<?php

namespace App\Http\Controllers;

use App\Models\Document;
use Illuminate\Http\Request;

class DocumentController extends Controller
{
    public function index()
    {
        // Ambil semua data dari tabel documents, urutkan berdasarkan data terbaru
        $documents = Document::latest()->get();

        // Kirim data ke view
        return view('documents.index', compact('documents'));
    }
    public function store(Request $request)
    {
        // Validasi data input
        $validated = $request->validate([
            'indeks' => 'required|string|max:255',
            'kode' => 'nullable|string|max:255',
            'tanggal' => 'required|date',
           'no_urut' => 'required|integer|unique:documents,no_urut',
            'isi_ringkas' => 'required|string',
            'lampiran' => 'nullable|string|max:255',
            'dari' => 'required|string|max:255',
            'kepada' => 'required|string|max:255',
            'tanggal_surat' => 'nullable|date',
            'no_surat' => 'nullable|string|max:255',
            'pengolahan' => 'nullable|string|max:255',
            'catatan' => 'nullable|string',
            'link_surat' => 'nullable|url',
        ]);
    
        // Simpan data ke database
        Document::create($validated);
    
        // Redirect ke halaman tabel hasil input
        return redirect()->route('documents.index')->with('success', 'Data berhasil disimpan!');
    }

    public function create()
{
    return view('documents.form', ['document' => null]);
}

public function edit($id)
{
    $document = Document::findOrFail($id);
    return view('documents.form', compact('document'));
}

public function destroy($id)
{
    $document = Document::findOrFail($id);
    $document->delete();

    return redirect()->route('documents.index')->with('success', 'Data berhasil dihapus!');
}

public function update(Request $request, $id)
{
    // Validasi data input
    $request->validate([
        'indeks' => 'required|string|max:255',
        'kode' => 'nullable|string|max:255',
        'tanggal' => 'required|date',
        'no_urut' => 'required|integer|unique:documents,no_urut,' . $document->id,  
         'isi_ringkas' => 'required|string',
        'lampiran' => 'nullable|string|max:255',
        'dari' => 'required|string|max:255',
        'kepada' => 'required|string|max:255',
        'tanggal_surat' => 'nullable|date',
        'no_surat' => 'nullable|string|max:255',
        'pengolahan' => 'nullable|string|max:255',
        'catatan' => 'nullable|string',
        'link_surat' => 'nullable|url',
    ]);

    // Ambil data berdasarkan ID
    $document = Document::findOrFail($id);

    // Update data
    $document->update($request->all());

    // Redirect ke halaman daftar surat
    return redirect()->route('documents.index')->with('success', 'Data surat berhasil diperbarui!');
}


}
