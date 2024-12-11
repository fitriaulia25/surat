<?php

namespace App\Http\Controllers;

use App\Models\Document;
use Illuminate\Http\Request;

class DocumentController extends Controller
{
    // Menampilkan semua dokumen
    public function index()
    {
        $documents = Document::latest()->get(); // Ambil data terbaru
        return view('documents.index', compact('documents'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'tanggal' => 'required|date',
            'lampiran' => 'nullable|string',
            'dari' => 'nullable|string',
            'kepada' => 'nullable|string',
            'tanggal_surat' => 'required|date',
            'indeks' => 'nullable|string',
            'kode' => 'nullable|string',
            'pengolahan' => 'nullable|string',
            'isi_ringkas' => 'nullable|string',
            'catatan' => 'nullable|string',
            'link_surat' => 'nullable|url',
        ]);
    
        Document::create($validated);
    
        return redirect()->route('documents.index')->with('success', 'Dokumen berhasil disimpan.');
    }
        
    public function update(Request $request, $id)
    {
        // Validasi input form
        $validatedData = $request->validate([
            'no_urut' => 'required|string|max:255',
            'tanggal' => 'nullable|date',
            'lampiran' => 'nullable|string|max:255',
            'dari' => 'required|string|max:255',
            'kepada' => 'required|string|max:255',
            'tanggal_surat' => 'nullable|date',
            'indeks' => 'required|string|max:255',
            'kode' => 'nullable|string|max:255',
            'no_surat' => 'nullable|string|max:255',
            'pengolahan' => 'nullable|string|max:255',
            'isi_ringkas' => 'nullable|string',
            'catatan' => 'nullable|string',
            'link_surat' => 'nullable|url',
        ]);

        // Cari dokumen berdasarkan ID
        $document = Document::findOrFail($id);

        // Update data dokumen
        $document->update($validatedData);

        // Redirect ke halaman lain (misalnya halaman dokumen)
        return redirect()->route('documents.index')->with('success', 'Dokumen berhasil diupdate.');
    }


    // Form tambah dokumen baru
    public function create()
    {
        $year = now()->year;

        // Hitung no_urut otomatis
        $lastUrut = Document::whereYear('created_at', $year)->max('no_urut') ?? 0;
        $nextUrut = $lastUrut + 1;

        // Hitung no_surat otomatis
        $lastSurat = Document::whereYear('created_at', $year)->max('no_surat') ?? 0;
        $nextSurat = str_pad($lastSurat + 1, 3, '0', STR_PAD_LEFT);

        // Kirim ke view
        return view('documents.create', compact('nextUrut', 'nextSurat'));
    }
    
    // Menampilkan detail dokumen
   public function show($id)
   {
    $document = Document::findOrFail($id);

    return view('documents.show', compact('document'));
     }

    // Form edit dokumen
    public function edit($id)
    {
        $document = Document::findOrFail($id); // Cari dokumen
        return view('documents.form', compact('document')); // Arahkan ke form edit
    }
    
    // Hapus dokumen
    public function destroy($id)
    {
        $document = Document::findOrFail($id);
        $document->delete();

        return redirect()->route('documents.index')->with('success', 'Dokumen berhasil dihapus.');
    }
}
