<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('potensis', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->enum('kategori', ['wisata','kuliner','kerajinan','pertanian','budaya'])->default('wisata');
            $table->text('deskripsi');
            $table->string('gambar')->nullable();
            $table->decimal('rating', 2, 1)->default(4.5);
            $table->string('lokasi')->nullable();
            $table->string('tags')->nullable();
            $table->boolean('is_aktif')->default(true);
            $table->timestamps();
        });
    }
    public function down(): void { Schema::dropIfExists('potensis'); }
};