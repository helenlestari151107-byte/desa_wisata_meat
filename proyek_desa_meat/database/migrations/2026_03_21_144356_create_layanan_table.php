<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('layanans', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('ikon')->default('fas fa-cog');
            $table->text('deskripsi')->nullable();
            $table->string('warna_ikon')->default('green');
            $table->integer('urutan')->default(0);
            $table->boolean('is_aktif')->default(true);
            $table->timestamps();
        });
    }
    public function down(): void { Schema::dropIfExists('layanans'); }
};