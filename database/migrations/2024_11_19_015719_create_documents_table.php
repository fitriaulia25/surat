<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('documents', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('no_urut'); // Kolom untuk no urut
            $table->string('no_surat', 3); // Kolom untuk no surat
            $table->date('tanggal')->nullable();
            $table->string('lampiran')->nullable();
            $table->string('dari')->nullable();
            $table->string('kepada')->nullable();
            $table->date('tanggal_surat')->nullable();
            $table->string('indeks')->nullable();
            $table->string('kode')->nullable();
            $table->string('pengolahan')->nullable();
            $table->text('isi_ringkas')->nullable();
            $table->text('catatan')->nullable();
            $table->string('link_surat')->nullable();
            $table->timestamps();
        });
        
                   
    }
    
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('documents');
    }
};
