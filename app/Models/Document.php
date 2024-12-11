<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;

    // Kolom yang dapat diisi (mass assignable)
    protected $fillable = [
        'no_urut',
        'tanggal',
        'lampiran',
        'dari',
        'kepada',
        'tanggal_surat',
        'indeks',
        'kode',
        'no_surat',
        'pengolahan',
        'isi_ringkas',
        'catatan',
        'link_surat',
    ];

    // Override method boot untuk mengatur event model
    protected static function boot()
    {
        parent::boot(); // Pastikan parent boot dipanggil terlebih dahulu

        // Event sebelum data dibuat
        static::creating(function ($document) {
            $year = now()->year;

            // Generate no_urut untuk tahun berjalan
            $lastUrut = self::whereYear('created_at', $year)->max('no_urut') ?? 0;
            $document->no_urut = $lastUrut + 1;

            // Generate no_surat untuk tahun berjalan
            $lastSurat = self::whereYear('created_at', $year)->max('no_surat') ?? 0;
            $document->no_surat = str_pad($lastSurat + 1, 3, '0', STR_PAD_LEFT);
        });
 
   }
}