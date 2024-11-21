<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;

   protected $fillable = [
    'indeks', 'kode', 'tanggal', 'no_urut', 'isi_ringkas', 
    'lampiran', 'dari', 'kepada', 'tanggal_surat', 'no_surat', 
    'pengolahan', 'catatan', 'link_surat', // Menambahkan kolom link_surat
];

}
