<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('nomor_penting', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->enum('kategori', ['medis','darurat','pemerintah','utility'])->default('darurat');
            $table->string('nomor_telepon');
            $table->string('warna')->default('blue');
            $table->string('ikon')->default('fas fa-phone');
            $table->timestamps();
        });
    }
    public function down(): void { Schema::dropIfExists('nomor_penting'); }
};